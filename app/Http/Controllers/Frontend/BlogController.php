<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Modules\Blog\Interfaces\BlogInterface;
use Modules\Blog\Interfaces\BlogCategoryInterface;

class BlogController extends Controller
{
    use ApiReturnFormatTrait;


    protected $blog;
    protected $blogCategory;

    public function __construct(BlogInterface $blog, BlogCategoryInterface $blogCategory)
    {

        $this->blog             = $blog;
        $this->blogCategory     = $blogCategory;
    }


    public function index(Request $request)
    {
        try {
            $data['title']      = ___(key: 'frontend.Blogs'); // title
            $data['blogs']      = $this->blog->getBlogs(!empty($request->q) ? $request->q : null, $request->category);
            $data['categories'] = $this->blogCategory->all(!empty($request->q) ? $request->q : null);
            return view('frontend.blog.index', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }

    }


    public function details(Request $request)
    {

        try {
            $data['title']              = ___('frontend.Blog Details'); // title
            $data['blog']               = $this->blog->show($request->id);
            $data['latest_blogs']       = $this->blog->latestBlog();

            return view('frontend.blog.details', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }

    }

}
