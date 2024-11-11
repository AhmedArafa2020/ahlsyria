<?php

namespace Modules\Student\Http\Controllers;

use App\Models\User;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Student\Http\Requests\StudentCreate;
use Modules\Student\Interfaces\StudentInterface;
use Modules\Student\Http\Requests\AdminStudentRequest;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Modules\Event\Entities\Newsletter;
use Modules\Forum\Interfaces\ForumCategoryInterface;
use Illuminate\Support\Facades\Notification;
use Modules\Event\Notifications\NewsletterEmail;

class StudentController extends Controller
{

    use ApiReturnFormatTrait;

    // constructor injection
    protected $student;

    protected $forumCategory;

    public function __construct(StudentInterface $StudentInterface, ForumCategoryInterface $forumCategory)
    {
        $this->student = $StudentInterface;
        $this->forumCategory = $forumCategory;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index(Request $request)
    {
        try {
            $data['students'] = $this->student->model();

            if ($request->event_id) {
                $data['students'] = $data['students']->whereHas('user', function ($uQuery) use ($request) {
                    $uQuery->whereHas('events', function ($evQuery) use ($request) {
                        $evQuery->where('event_id', $request->event_id);
                    });
                });
            }

            if ($request->search != null) {
                $data['students'] = $data['students']->whereHas('user', function ($query) use ($request) {
                    $query->where(function ($q2) use ($request) {
                        $q2->where('name', 'like', '%' . $request->search . '%')
                            ->orWhere('name_ar', 'like', '%' . $request->search . '%')
                            ->orWhere('country', 'like', '%' . $request->search . '%')
                            ->orWhere('state', 'like', '%' . $request->search . '%')
                            ->orWhere('work_field', 'like', '%' . $request->search . '%');
                    });
                });
            }
            $data['students'] = $data['students']->paginate($request->show ?? 10)->withQueryString(); // data
            $data['title'] = ___('student.Student Lists'); // title
            return view('student::student.index', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function export()
    {
        $name = "users_" . date('Y-m-d') . ".csv";
        $students = $this->student->model()->whereNotNull('user_id')->get();

        $headers = array(
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$name",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array(
            'ID',
            'Name',
            'Name_Ar',
            'Email',
            'Birth_date',
            'Gender',
            'Phone_dial',
            'Phone_number',
            'Country',
            'State',
            'Location',
            'Education',
            'Nationality',
            'Work',
            'Designation',
            'Place',
            'Join Reason',
            'Joined Date',
            'Excerience_years',
            'Freelancer',
            'Freelancer_years',
            'Disability',
            'Status'
        );
        $filename =  public_path("csv_files/" . $name);
        $handle = fopen($filename, 'w');

        fputcsv($handle, $columns);

        foreach ($students as $student) {
            $user = $student->user;
            $row['ID'] = $user->id;
            $row['Name'] = $user->name;
            $row['Name_Ar'] = $user->name_ar;
            $row['Email'] = $user->email;
            $row['Birth_date'] = $user->date_of_birth;
            $row['Gender'] = $user->gender == 1 ? 'Male' : 'Female';
            $row['Phone_dial'] = $user->phone_dial;
            $row['Phone_number'] = $user->phone;
            $row['Country'] = $user->country;
            $row['State'] = $user->state;
            $row['Location'] = $user->location;
            $row['Education'] = $user->education;
            $row['Nationality'] = $user->nationality;
            $row['Work'] = $user->work_field;
            $row['Designation'] = $student->designation ?? '';
            $row['place'] = $user->place ?? '';
            $row['Join Reason'] = $user->join_reason ?? '';
            $row['Joined Date'] = $student->created_at ?? '';
            $row['Excerience_years'] = $user->experience_years;
            $row['Freelancer'] = $user->freelancer == 1 ? 'Yes' : 'No';
            $row['Freelancer_years'] = $user->freelancer_years;
            $row['Disability'] = $user->disability == 1 ? 'Yes' : 'No';
            $row['status'] = $user->status == 1 ? 'Active' : 'Disabled';

            fputcsv($handle, array(
                $row['ID'],
                $row['Name'],
                $row['Name_Ar'],
                $row['Email'],
                $row['Birth_date'],
                $row['Gender'],
                $row['Phone_dial'],
                $row['Phone_number'],
                $row['Country'],
                $row['State'],
                $row['Location'],
                $row['Education'],
                $row['Nationality'],
                $row['Work'],
                $row['Designation'],
                $row['place'],
                $row['Join Reason'],
                $row['Joined Date'],
                $row['Excerience_years'],
                $row['Freelancer'],
                $row['Freelancer_years'],
                $row['Disability'],
                $row['status'],
            ));
        }

        fclose($handle);
        // $callback = function() use($cards, $columns) {
        //     $file = fopen('php://output', 'w');

        // };

        return FacadesResponse::download($filename, $name, $headers);
        // return response()->stream($callback, 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $data['title'] = ___('student.Create_Student'); // title
            return view('student::student.create', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StudentCreate $request)
    {
        try {
            $result = $this->student->create($request);
            if ($result->original['result']) {
                return redirect()->route('admin.student.index')->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * View the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function login($id)
    {
        try {
            $data['student'] = $this->student->model()->where('id', $id)->first(); // data
            if (!$data['student']) {
                return redirect()->back()->with('danger', ___('alert.student_not_found'));
            }
            Auth::loginUsingId($data['student']->user_id);
            return redirect()->route('student.dashboard');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, $slug)
    {
        try {
            $data['all_forums'] = $this->forumCategory->model()->get(); // data
            $data['student'] = $this->student->model()->where('id', $id)->with('user.allowedForums')->first(); // data
            if (!$data['student']) {
                return redirect()->back()->with('danger', ___('alert.student_not_found'));
            }
            $data['url'] = route('admin.student.update', [$data['student']->id, $slug]); // url']
            $data['title'] = ___('student.Update Student'); // title
            return view('student::student.edit', compact('data'));
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AdminStudentRequest $request, $id, $slug)
    {
        try {
            $instructor = $this->student->model()->where('id', $id)->first(); // data
            if (!$instructor) {
                return redirect()->back()->with('danger', ___('alert.instructor_not_found'));
            }
            $result = $this->student->update($request, $instructor, $slug);
            if ($result->original['result']) {
                return redirect()->route('admin.student.index')->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
    public function suspend($id)
    {
        try {
            $student = $this->student->model()->where('id', $id)->first(); // data
            if (!$student) {
                return redirect()->back()->with('danger', ___('alert.student_not_found'));
            }
            $result = $this->student->suspend($id);
            if ($result->original['result']) {
                return redirect()->back()->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
    public function reActivate($id)
    {
        try {
            $student = $this->student->model()->where('id', $id)->first(); // data
            if (!$student) {
                return redirect()->back()->with('danger', ___('alert.student_not_found'));
            }
            $result = $this->student->reActivate($id);
            if ($result->original['result']) {
                return redirect()->back()->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function newsletter($id = null)
    {
        $data = [];
        if ($id) {
            $newsletter = Newsletter::where('id', $id)->firstOrFail();
            $data['newsletter'] = $newsletter;
        }
        $data['title'] = "ارسال ايميل جماعي";
        return view('student::student.newsletter', compact('data')); // view
    }

    public function saveNewsletter(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $newsletter = new Newsletter();
        $newsletter->title =  $request->title;
        $newsletter->sub_title = $request->sub_title;
        $newsletter->content = $request->content;
        $newsletter->save();

        $users = User::whereHas('student')->get();
        Notification::send($users, new NewsletterEmail($newsletter));

        return redirect()->route('admin.newsletter.index', ['id' => $newsletter->id])->with('success', 'success');
    }
}
