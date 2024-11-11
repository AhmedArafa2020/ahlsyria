<div class="row row-gap-4">
    @forelse ($data['courses'] as $key => $course)
    <div class="col-md-6 col-lg-4 con-card">

                  @include('frontend.partials.course.course_widget', [
                'course' => $course,
            ])
    </div>
          @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <h4 class="text-16 font-500">لا يوجد تدريبات</h4>
            </div>
        </div>
    @endforelse
</div>
<?= $data['courses']->links('frontend.partials.pagination', ['event' => 'coursePagination']) ?>
<div id="blogs_content">
    <h1>المدونة</h1>
    <div class="row g-24">
        @forelse ($data['blogs'] as $key => $blog)
        <div class="view-wrapper col-xl-4 col-lg-6 col-md-6 col-sm-6">
            @include('frontend.partials.course.blog_widget', [
            'course' => $blog,
            ])
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <h4 class="text-16 font-500">لايوجد مدونات</h4>
            </div>

        </div>
        @endforelse
    </div>
</div>

<script>
    var blogs = document.getElementById('blogs_content');
    blogs.hidden = true;
    if(window.location.href.indexOf("search") > -1){
        blogs.hidden = false;
    }
</script>