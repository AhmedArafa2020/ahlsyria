<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Modules\Course\Interfaces\CourseInterface;
use Modules\Forum\Entities\ForumCategory;
use Modules\Forum\Entities\ForumQuestion;

class CourseDetailsController extends Controller
{
    use ApiReturnFormatTrait;

    // constructor injection
    protected $course;

    public function __construct(CourseInterface $courseInterface)
    {
        $this->course = $courseInterface;
    }

    public function index($slug)
    {
        // try {
            $data['title'] = ___('frontend.Course Details'); // title
            $data['course'] = $this->course->model()->slug($slug)->first();
            $data['profile'] = view('frontend.partials.course.instructor_profile', compact('data'))->render();
            $data['review'] = view('frontend.partials.course.reviews', compact('data'))->render();
            $data['curriculum'] = view('frontend.partials.course.curriculum', ['sections' => $data['course']->sections])->render();
            //Forum Start
            $forum_category_id = ForumCategory::where('slug',$slug)->first()->id ?? -1;
            $queryBuilder = ForumQuestion::where('status_id', 1)->where('forum_category_id',$forum_category_id);
            $data['questions'] = $queryBuilder->paginate(5); // title
            $data['categories'] = ForumCategory::where('slug',$slug)->first();
            $data['featured_questions'] = [];
            $data['html'] = view('forum::components.indexdata', compact('data'))->render();
            $data['forum'] = view('forum::frontend.index_course', compact('data'))->render();
            //Forum End
            if ($data['course']) {
                // package course
                if(module('Subscription') && setting('subscription_setup')){
                    $packageCourseRepository = new \Modules\Subscription\Repositories\PackageCourseRepository(new \Modules\Subscription\Entities\PackageCourse);
                    $package_course = $packageCourseRepository->model()->where(['course_id' => $data['course']->id, 'status_id' => 4])->first();
                    $data['package_included'] = @$package_course ? 1 : 0;
                }
                // package course end
                return view('frontend.course.course_details', compact('data'));
            } else {
                return redirect('/')->with('danger', ___('alert.Course_not_found'));
            }
        // } catch (\Throwable $th) {
        //     return redirect('/')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        // }

    }
}
