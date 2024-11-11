@extends('forum::layouts.master')
@section('title', @$data['question']->title ?? @$data['title'])

@section('css')
    <link rel="stylesheet" href="{{ asset('modules/forum/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/forum/summernote/summernote.css') }}">
@endsection

@section('content')

    <!-- Get-in Touch S t a r t-->

    <main class="container-fluid px-5 py-5">
        <div class="row">
            <div class="col-12 col-lg-9 mb-5 mb-lg-0">
                <section>
                    <article class="pb-4 border-bottom border-2 mb-2 box-page">
                        <h1 class="mb-3">{{ @$data['question']->title }}"</h1>
                        <p>
                            {!! $data['question']->question !!}
                        </p>
                        <div>
                            <div class="person d-flex align-items-center gap-2 mb-2">
                                <img class="rounded-circle"
                                    src="{{ showImage(@$data['question']->user->image->original, '/backend/uploads/default-images/default-1.jpeg') }}"
                                    alt="Doctor">
                                <div class="info">
                                    <p> {{ @$data['question']->user->name_ar }}</p>
                                    <p class="job"> {{ @$data['question']->user->role()->first()->name }}</p>
                                </div>
                            </div>
                            <p class="date">
                                {{ @$data['question']->created_at->locale('ar_SA')->translatedFormat('d F Y') }}
                            </p>

                            @if (@$data['question']->created_by == auth()->id() || @hasPermission('forum_delete'))
                                <a class="question_delete" data-id="{{ encryptFunction(@$data['qeustion']->id) }}"><i
                                        class="ri-delete-bin-6-line"></i></a>
                                <a class="text-tertiary"
                                    onclick="mainModalOpen(`{{ route('forum.edit', encryptFunction(@$data['question']->id)) }}`)"><i
                                        class="ri-edit-line"></i></a>
                            @endif
                        </div>
                    </article>


                    <div>
                        <div class="mb-4">
                            <p class="label mb-2">التعليقات</p>
                            @auth
                                <div class="comment">
                                    <form id="section2" action="{{ route('forum.answer.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quesion_id" value="{{ $data['question']->id }}">
                                        <div class="comment-input d-flex align-items-top gap-2">
                                          <img src="{{ showImage(auth()->user()->image->original ?? '/backend/uploads/default-images/default-1.jpeg') }}" alt="User Image">
                                        <textarea class="flex-grow-1 px-2" name="answer" placeholder="{{ ___('forum.Give your answer') }}" ></textarea>
                                        @error('answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    
                                        <button class="btn btn-primary-fill" type="submit" aria-label="Send">
                                          <svg width="30px" height="30pxpx" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-258.000000, -1089.000000)" fill="#29abe2">
                                                    <path d="M281,1106 L270.414,1106 L274.536,1110.12 C274.926,1110.51 274.926,1111.15 274.536,1111.54 C274.145,1111.93 273.512,1111.93 273.121,1111.54 L267.464,1105.88 C267.225,1105.64 267.15,1105.31 267.205,1105 C267.15,1104.69 267.225,1104.36 267.464,1104.12 L273.121,1098.46 C273.512,1098.07 274.145,1098.07 274.536,1098.46 C274.926,1098.86 274.926,1099.49 274.536,1099.88 L270.414,1104 L281,1104 C281.552,1104 282,1104.45 282,1105 C282,1105.55 281.552,1106 281,1106 L281,1106 Z M274,1089 C265.164,1089 258,1096.16 258,1105 C258,1113.84 265.164,1121 274,1121 C282.836,1121 290,1113.84 290,1105 C290,1096.16 282.836,1089 274,1089 L274,1089 Z" id="arrow-left-circle" sketch:type="MSShapeGroup">
                                        
                                        </path>
                                                </g>
                                            </g>
                                        </svg>
                                      </button>
                                    </div>
                                    </form>
                                  </div>
                            @endauth
                          

                            @guest
                                <div class="mb-4">

                                    <div class="comment-input d-flex gap-2">
                                      <textarea class="flex-grow-1 px-2" placeholder="قم بتسجيل الدخول أولاً لإضافة تعليق" disabled></textarea>
                                    </div>
                                </div>

                            @endguest
                        </div>




                        <!-- comment for -->
                        @forelse ($data['answers'] as $answer)
                            <div class="mb-5">
                                <!-- user comment -->

                                <div class="mb-2">
                                    <div class="account d-flex align-items-center gap-2">
                                        <img src="{{ showImage(@$answer->user->image->original, '/backend/uploads/default-images/default-1.jpeg') }}"
                                            alt="Person-2">
                                        <a href="{{ @$answer->user->getPublicURlPage() }}"></a>
                                        <div class="info1">

                                            <p>{{ @$answer->user->name_ar }}</p>

                                            <p class="job">{{ @$answer->user->role()->first()->name }}</p>
                                            <span class="date text-paragraph"> 
                                              {{ @$answer->created_at->locale("ar_SA")->translatedFormat("d F Y") }}
                                          </span>
                                        </div>
                                        </a>
                                    </div>
                                    @if ($answer->created_by == auth()->id() || @hasPermission('forum_delete'))
                                        <a class="answer_delete" data-id="{{ encryptFunction($answer->id) }}"><i
                                                class="ri-delete-bin-6-line"></i></a>
                                    @endif
                                </div>
                                <p class="comment-title mb-5">{!! $answer->answer !!}</p>

                                <div>
                                    @foreach ($answer->reply as $index => $reply)
                                        <!-- replay 1 froeach-->
                                        @if ($index < 2)
                                            {{-- reply-single-comments --}}
                                            <div class="answer pe-2 me-4 mb-3">
                                                <div class="mb-2">
                                                    <div class="person d-flex align-items-center gap-2">
                                                        <img src="{{ showImage(@$reply->user->image->original, '/backend/uploads/default-images/default-1.jpeg') }}" alt="Nurse">
                                                        <div class="info2">
                                                            <p>{{ @$reply->user->name_ar }}</p>
                                                            <p class="job">{{ @$reply->user->role()->first()->name }}
                                                            </p>
                                                            <span
                                                                class="date text-paragraph">
                                                                {{ @$reply->created_at->locale("ar_SA")->translatedFormat("d F Y") }}
                                                              </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="title">{!! @$reply->comment !!}</p>
                                                @if (@$reply->created_by == auth()->id() || @hasPermission('forum_delete'))
                                                    <a class="comment_delete"
                                                        data-id="{{ encryptFunction(@$reply->id) }}"><i
                                                            class="ri-delete-bin-6-line"></i></a>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach

                                    
                                    @auth
                              
                                        {{-- replay add & see all replays button --}}

                                        <div class="comment">
                                          <form id="section2" action="{{ route('forum.comment.store',@$answer->id) }}" method="POST">
                                              @csrf
                                              <input type="hidden" name="quesion_id" value="{{ $answer->id }}">
                                              <div class="comment-input d-flex align-items-top gap-2">
                                                <img src="{{ showImage(auth()->user()->image->original ?? '/backend/uploads/default-images/default-1.jpeg') }}" alt="User Image">
                                              <textarea class="flex-grow-1 px-2" name="comment" id="comment" rows="2"  placeholder="أضف ردك" ></textarea>
                                              @error('comment')
                                                  <small class="text-danger">{{ $message }}</small>
                                              @enderror
                                          
                                              <button class="btn btn-primary-fill" type="submit" aria-label="Send">
                                                <svg width="30px" height="30pxpx" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                      <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-258.000000, -1089.000000)" fill="#29abe2">
                                                          <path d="M281,1106 L270.414,1106 L274.536,1110.12 C274.926,1110.51 274.926,1111.15 274.536,1111.54 C274.145,1111.93 273.512,1111.93 273.121,1111.54 L267.464,1105.88 C267.225,1105.64 267.15,1105.31 267.205,1105 C267.15,1104.69 267.225,1104.36 267.464,1104.12 L273.121,1098.46 C273.512,1098.07 274.145,1098.07 274.536,1098.46 C274.926,1098.86 274.926,1099.49 274.536,1099.88 L270.414,1104 L281,1104 C281.552,1104 282,1104.45 282,1105 C282,1105.55 281.552,1106 281,1106 L281,1106 Z M274,1089 C265.164,1089 258,1096.16 258,1105 C258,1113.84 265.164,1121 274,1121 C282.836,1121 290,1113.84 290,1105 C290,1096.16 282.836,1089 274,1089 L274,1089 Z" id="arrow-left-circle" sketch:type="MSShapeGroup">
                                              
                                              </path>
                                                      </g>
                                                  </g>
                                              </svg>
                                            </button>
                                          </div>
                                          </form>
                                        </div>
                                        



                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-15">
                                            <!-- Button trigger modal -->
                                            <a type="button" class="{{-- text-primary border-0 bg-transparent --}} btn-primary-fill"
                                                onclick="mainModalOpen(`{{ route('forum.comment.create', @$answer->id) }}`)">
                                                {{-- {{ ___('forum.Add your comment') }} --}}
                                              رد
                                            </a>



                                            @if (@$answer->reply->count() <= 0)
                                                <p class="text-peragraph text-16 border-0 bg-transparent">No
                                                    Comments</p>
                                            @elseif (@$answer->reply->count() <= 2)
                                            @else
                                                <a href="javascript:void(0);" type="button"
                                                    class="text-tertiary border-0 bg-transparent"
                                                    onclick="mainModalOpen(`{{ route('forum.comment.allCommentModal', @$answer->id) }}`)">
                                                    {{ ___('forum.See all') }} {{ @$answer->reply->count() }}
                                                    {{ ___('forum.comments') }}
                                                </a>
                                            @endif
                                        </div>
                                        {{-- End-of Comments add & see all comments button --}}
                                    @endauth

                                    @guest

                                        <div class="mb-4">

                                            <div class="comment-answer pe-2 me-4 d-flex gap-2">
                                              <textarea  class="border-0 rounded-2 px-2" placeholder="سجل الدخول لكتابة رد على التعليق ورؤية المزيد من التعليقات" disabled style="height: 35px"></textarea>
                                            </div>
                                        </div>

                                    @endguest


                                @empty
                                    <div class="alert alert-secondary" role="alert">
                                        {{ ___('forum.No Answer Found!') }}
                                    </div>
                        @endforelse

                        <!-- Pagination S t a r t -->
                        <div class="row">
                            <div class="col-lg-12">
                                {!! @$data['answers']->links('frontend.partials.pagination-count') !!}
                            </div>
                        </div>
                        <!-- End-of Pagination -->




                        </aside>
                    </div>
            </div>
            </section>
        </div>




        @include('forum::components.sidebar', [
            'featured_questions' => @$data['featured_questions'],
            'featured_users' => @$data['featured_users'],
        ])

        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('modules/forum/js/app.js') }}"></script>
    <script src="{{ asset('modules/forum/summernote/summernote.js') }}"></script>
@endsection