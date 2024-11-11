@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection

@section('content')
    <div class="mentoring-content">

        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => @$data['title'],
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                route('mentorings.index') => ___('event.Mentoring'),
                '#' => @$data['title'],
            ],
            'buttons' => 0,
        ])
        {{-- breadecrumb Area E n d --}}

        <!--  category create start -->
        <div class="card ot-card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 mb-3">
                                @if(@$data['mentoring']->reviews > 0)
                                    <div class="mb-3">
                                        <span class="badge badge-success text-white">تم تاكيد الاستشارة من الطالب</span>
                                    </div>
                                @endif
                                <label for="title" class="form-label ">
                                    {{ ___('common.Title') }} 
                                    <span class="badge badge-primary text-white">{{ @$data['mentoring']->status }}</span>
                                </label>
                                <p>{{ @$data['mentoring']->title}}</p>
                            </div>
                            <div class="col-12 mb-3">
                                
                                <label for="title" class="form-label ">
                                    {{ ___('common.Phone Number') }} 
                                    <span class="badge badge-primary text-white"></span>
                                </label>
                                <p>{{ @$data['mentoring']->phone}}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label ">
                                    {{ ___('common.student') }} 
                                </label>
                                <p>{{ @$data['mentoring']->user->username}}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label ">
                                    {{ ___('common.mentor') }} 
                                </label>
                                <p>{{ @$data['mentoring']->mentor->username}}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label ">
                                    {{ ___('common.Content') }} 
                                </label>
                                <p>{{ @$data['mentoring']->content}}</p>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="title" class="form-label ">
                                    {{ ___('common.created_at') }} 
                                </label>
                                <p>{{ showDate(@$data['mentoring']->created_at) }}</p>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="title" class="form-label ">
                                    {{ ___('common.mentoring_date') }} 
                                </label>
                                <p>{{ showDate(@$data['mentoring']->mentoring_date) }}</p>
                            </div>

                            

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
