@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('content')

<div class="container-fluid">
    <div class="admin-wrapper white-bg">
        <!-- My Profile S t a r t -->
        <section class="my-profile-area public-profile">
            <div class="row">
                <!-- Section Tittle -->
                <div class="col-xl-12">
                    <div class="section-tittle-two d-flex align-items-center justify-content-between flex-wrap mb-20">
                        <h2 class="title font-600">{{ @$data['title'] }}</h2>
                        <div class="d-flex">
                            نسخ الرابط
                            <span class="action-success mx-2" id="copyButton"
                                data-url="{{ route('share.profile', ['username' => @$data['student']->user->username]) }}">
                                <i class="ri-file-copy-line"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="my-profile-wrapper">
                        <div class="my-profile-card radius-6 mb-24 ot-card">
                            <div class="d-flex align-items-center gap-20 mb-20 pb-15 ">
                                <div class="profile-image">
                                    <img src="{{ showImage(@$data['student']->user->image->original) }}" class="img-cover"
                                        alt="img">
                                </div>
                                <div class="caption flex-shrink-0">
                                    <h6 class="profile-name font-600">{{ @$data['student']->user->name ?? '-' }}</h6>
                                    <h6 class="d-flex mb-2 gap-4">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_88_1996)"> <path d="M12.6465 12.4999C13.8332 12.4999 14.9932 12.148 15.9799 11.4887C16.9666 10.8294 17.7356 9.89234 18.1898 8.79598C18.6439 7.69962 18.7627 6.49322 18.5312 5.32934C18.2997 4.16545 17.7282 3.09635 16.8891 2.25724C16.05 1.41812 14.9809 0.84668 13.817 0.615169C12.6531 0.383658 11.4467 0.502478 10.3504 0.956603C9.25403 1.41073 8.31696 2.17976 7.65767 3.16646C6.99838 4.15315 6.64648 5.31319 6.64648 6.49988C6.64807 8.09069 7.28072 9.61589 8.4056 10.7408C9.53047 11.8656 11.0557 12.4983 12.6465 12.4999ZM12.6465 2.49988C13.4376 2.49988 14.211 2.73448 14.8688 3.174C15.5266 3.61353 16.0393 4.23824 16.342 4.96915C16.6448 5.70005 16.724 6.50432 16.5696 7.28024C16.4153 8.05616 16.0343 8.7689 15.4749 9.32831C14.9155 9.88772 14.2028 10.2687 13.4268 10.423C12.6509 10.5774 11.8467 10.4981 11.1158 10.1954C10.3848 9.89265 9.76013 9.37996 9.32061 8.72216C8.88108 8.06436 8.64648 7.291 8.64648 6.49988C8.64648 5.43901 9.06791 4.4216 9.81806 3.67145C10.5682 2.92131 11.5856 2.49988 12.6465 2.49988V2.49988Z" fill="#374957"/> <path d="M12.6465 14.5006C10.2603 14.5033 7.9727 15.4523 6.28545 17.1396C4.59819 18.8268 3.64913 21.1145 3.64648 23.5006C3.64648 23.7658 3.75184 24.0202 3.93938 24.2077C4.12691 24.3953 4.38127 24.5006 4.64648 24.5006C4.9117 24.5006 5.16605 24.3953 5.35359 24.2077C5.54113 24.0202 5.64648 23.7658 5.64648 23.5006C5.64648 21.6441 6.38398 19.8636 7.69674 18.5509C9.00949 17.2381 10.79 16.5006 12.6465 16.5006C14.503 16.5006 16.2835 17.2381 17.5962 18.5509C18.909 19.8636 19.6465 21.6441 19.6465 23.5006C19.6465 23.7658 19.7518 24.0202 19.9394 24.2077C20.1269 24.3953 20.3813 24.5006 20.6465 24.5006C20.9117 24.5006 21.1661 24.3953 21.3536 24.2077C21.5411 24.0202 21.6465 23.7658 21.6465 23.5006C21.6438 21.1145 20.6948 18.8268 19.0075 17.1396C17.3203 15.4523 15.0326 14.5033 12.6465 14.5006V14.5006Z" fill="#374957"/> </g> <defs><clipPath id="clip0_88_1996"> <rect width="24" height="24" fill="white" transform="translate(0.646484 0.5)"/> </clipPath></defs> </svg>  
                                        {{ @$data['student']->gender === App\Enums\Gender::MALE ? ___('student.Male') : ___('student.Female') }} - 
                                        {{ @$data['student']->date_of_birth }} -
                                        {{ @$data['student']->user->nationality === 'syrian'  ? ___('student.Syrian') : @$data['student']->user->nationality }}
                                    </h6>
                                    <h6 class="d-flex mb-2 gap-4">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_88_2000)"> <path d="M12.6465 6.5C11.8554 6.5 11.082 6.7346 10.4242 7.17412C9.76641 7.61365 9.25372 8.23836 8.95097 8.96927C8.64822 9.70017 8.569 10.5044 8.72335 11.2804C8.87769 12.0563 9.25865 12.769 9.81806 13.3284C10.3775 13.8878 11.0902 14.2688 11.8661 14.4231C12.642 14.5775 13.4463 14.4983 14.1772 14.1955C14.9081 13.8928 15.5328 13.3801 15.9724 12.7223C16.4119 12.0645 16.6465 11.2911 16.6465 10.5C16.6465 9.43913 16.2251 8.42172 15.4749 7.67157C14.7248 6.92143 13.7074 6.5 12.6465 6.5ZM12.6465 12.5C12.2509 12.5 11.8642 12.3827 11.5353 12.1629C11.2064 11.9432 10.9501 11.6308 10.7987 11.2654C10.6474 10.8999 10.6077 10.4978 10.6849 10.1098C10.7621 9.72186 10.9526 9.36549 11.2323 9.08579C11.512 8.80608 11.8683 8.6156 12.2563 8.53843C12.6443 8.46126 13.0464 8.50087 13.4119 8.65224C13.7773 8.80362 14.0897 9.05996 14.3094 9.38886C14.5292 9.71776 14.6465 10.1044 14.6465 10.5C14.6465 11.0304 14.4358 11.5391 14.0607 11.9142C13.6856 12.2893 13.1769 12.5 12.6465 12.5Z" fill="#374957"/> <path d="M12.6468 24.5003C11.8047 24.5046 10.9739 24.3071 10.2239 23.9243C9.47382 23.5416 8.82639 22.9847 8.3358 22.3003C4.5248 17.0433 2.5918 13.0913 2.5918 10.5533C2.5918 7.88654 3.65116 5.32901 5.53684 3.44333C7.42252 1.55765 9.98005 0.498291 12.6468 0.498291C15.3135 0.498291 17.8711 1.55765 19.7568 3.44333C21.6424 5.32901 22.7018 7.88654 22.7018 10.5533C22.7018 13.0913 20.7688 17.0433 16.9578 22.3003C16.4672 22.9847 15.8198 23.5416 15.0697 23.9243C14.3197 24.3071 13.4889 24.5046 12.6468 24.5003ZM12.6468 2.68129C10.5592 2.68367 8.55781 3.51402 7.08167 4.99016C5.60552 6.46631 4.77518 8.46771 4.7728 10.5553C4.7728 12.5653 6.6658 16.2823 10.1018 21.0213C10.3935 21.4231 10.7762 21.7501 11.2185 21.9756C11.6609 22.201 12.1503 22.3186 12.6468 22.3186C13.1433 22.3186 13.6327 22.201 14.0751 21.9756C14.5174 21.7501 14.9001 21.4231 15.1918 21.0213C18.6278 16.2823 20.5208 12.5653 20.5208 10.5553C20.5184 8.46771 19.6881 6.46631 18.2119 4.99016C16.7358 3.51402 14.7344 2.68367 12.6468 2.68129Z" fill="#374957"/> </g> <defs> <clipPath id="clip0_88_2000"> <rect width="24" height="24" fill="white" transform="translate(0.646484 0.5)"/> </clipPath> </defs> </svg>
                                        {{ @$data['student']->address ?? '-' }}
                                    </h6>
                                    <h6 class="d-flex mb-2 gap-4">
                                        <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.704 4.72985L15.33 1.21685C13.7068 0.247292 11.6865 0.230089 10.047 1.17185L2.59003 4.72985C2.56205 4.74387 2.53303 4.75887 2.50603 4.77485C0.73641 5.7867 0.122066 8.04153 1.13391 9.81115C1.47689 10.4111 1.98141 10.9026 2.59003 11.2299L4.64705 12.2099V17.1099C4.64827 19.3009 6.07397 21.2367 8.16605 21.8879C9.62194 22.3091 11.1316 22.5153 12.6471 22.4999C14.1623 22.5169 15.672 22.3124 17.1281 21.8929C19.2202 21.2418 20.6459 19.306 20.6471 17.1149V12.2079L22.6471 11.2519V19.4998C22.6471 20.0521 23.0948 20.4998 23.6471 20.4998C24.1994 20.4998 24.6471 20.0521 24.6471 19.4998V7.49984C24.6537 6.32557 23.7265 5.24079 22.704 4.72985ZM18.647 17.1149C18.6475 18.4255 17.7972 19.5847 16.547 19.9779C15.2792 20.3401 13.9655 20.5159 12.647 20.4999C11.3286 20.5159 10.0148 20.3401 8.74702 19.9779C7.49682 19.5847 6.6465 18.4255 6.64702 17.1149V13.1629L9.96404 14.7429C10.7825 15.2289 11.7172 15.4843 12.6691 15.4819C13.5751 15.4883 14.4658 15.2485 15.2461 14.7879L18.647 13.1629V17.1149ZM21.847 9.42486L14.305 13.0249C13.2534 13.6372 11.95 13.6198 10.915 12.9799L3.53602 9.46985C2.7135 9.02632 2.40628 8 2.84982 7.17753C2.99982 6.89937 3.22472 6.66879 3.49903 6.51186L10.994 2.93187C12.0459 2.3209 13.3487 2.3382 14.384 2.97687L21.758 6.48987C22.3003 6.791 22.6396 7.35964 22.647 7.97989C22.648 8.56742 22.3455 9.11379 21.847 9.42486Z" fill="#374957"/>
                                        </svg>
                                        {{ @$data['student']->user->getTransEducation() ?? '-' }}
                                    </h6>
                                    <h6 class="d-flex mb-2 gap-4">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_89_1850)"> <path d="M19.6465 1.00012H5.64648C4.32089 1.00171 3.05004 1.529 2.1127 2.46634C1.17537 3.40368 0.648072 4.67453 0.646484 6.00012L0.646484 18.0001C0.648072 19.3257 1.17537 20.5966 2.1127 21.5339C3.05004 22.4712 4.32089 22.9985 5.64648 23.0001H19.6465C20.9721 22.9985 22.2429 22.4712 23.1803 21.5339C24.1176 20.5966 24.6449 19.3257 24.6465 18.0001V6.00012C24.6449 4.67453 24.1176 3.40368 23.1803 2.46634C22.2429 1.529 20.9721 1.00171 19.6465 1.00012ZM5.64648 3.00012H19.6465C20.4421 3.00012 21.2052 3.31619 21.7678 3.8788C22.3304 4.44141 22.6465 5.20447 22.6465 6.00012V7.00012H2.64648V6.00012C2.64648 5.20447 2.96255 4.44141 3.52516 3.8788C4.08777 3.31619 4.85083 3.00012 5.64648 3.00012ZM19.6465 21.0001H5.64648C4.85083 21.0001 4.08777 20.6841 3.52516 20.1214C2.96255 19.5588 2.64648 18.7958 2.64648 18.0001V9.00012H22.6465V18.0001C22.6465 18.7958 22.3304 19.5588 21.7678 20.1214C21.2052 20.6841 20.4421 21.0001 19.6465 21.0001ZM19.6465 13.0001C19.6465 13.2653 19.5411 13.5197 19.3536 13.7072C19.1661 13.8948 18.9117 14.0001 18.6465 14.0001H6.64648C6.38127 14.0001 6.12691 13.8948 5.93938 13.7072C5.75184 13.5197 5.64648 13.2653 5.64648 13.0001C5.64648 12.7349 5.75184 12.4806 5.93938 12.293C6.12691 12.1055 6.38127 12.0001 6.64648 12.0001H18.6465C18.9117 12.0001 19.1661 12.1055 19.3536 12.293C19.5411 12.4806 19.6465 12.7349 19.6465 13.0001ZM15.6465 17.0001C15.6465 17.2653 15.5411 17.5197 15.3536 17.7072C15.1661 17.8948 14.9117 18.0001 14.6465 18.0001H6.64648C6.38127 18.0001 6.12691 17.8948 5.93938 17.7072C5.75184 17.5197 5.64648 17.2653 5.64648 17.0001C5.64648 16.7349 5.75184 16.4806 5.93938 16.293C6.12691 16.1055 6.38127 16.0001 6.64648 16.0001H14.6465C14.9117 16.0001 15.1661 16.1055 15.3536 16.293C15.5411 16.4806 15.6465 16.7349 15.6465 17.0001ZM3.64648 5.00012C3.64648 4.80234 3.70513 4.609 3.81501 4.44455C3.9249 4.2801 4.08107 4.15193 4.2638 4.07624C4.44653 4.00055 4.64759 3.98075 4.84157 4.01934C5.03556 4.05792 5.21374 4.15316 5.35359 4.29302C5.49344 4.43287 5.58868 4.61105 5.62727 4.80503C5.66585 4.99901 5.64605 5.20008 5.57036 5.38281C5.49468 5.56553 5.3665 5.72171 5.20205 5.83159C5.03761 5.94147 4.84427 6.00012 4.64648 6.00012C4.38127 6.00012 4.12691 5.89476 3.93938 5.70723C3.75184 5.51969 3.64648 5.26534 3.64648 5.00012ZM6.64648 5.00012C6.64648 4.80234 6.70513 4.609 6.81501 4.44455C6.9249 4.2801 7.08108 4.15193 7.2638 4.07624C7.44653 4.00055 7.64759 3.98075 7.84157 4.01934C8.03556 4.05792 8.21374 4.15316 8.35359 4.29302C8.49344 4.43287 8.58868 4.61105 8.62727 4.80503C8.66586 4.99901 8.64605 5.20008 8.57036 5.38281C8.49468 5.56553 8.3665 5.72171 8.20205 5.83159C8.03761 5.94147 7.84427 6.00012 7.64648 6.00012C7.38127 6.00012 7.12691 5.89476 6.93938 5.70723C6.75184 5.51969 6.64648 5.26534 6.64648 5.00012ZM9.64648 5.00012C9.64648 4.80234 9.70513 4.609 9.81501 4.44455C9.9249 4.2801 10.0811 4.15193 10.2638 4.07624C10.4465 4.00055 10.6476 3.98075 10.8416 4.01934C11.0356 4.05792 11.2137 4.15316 11.3536 4.29302C11.4934 4.43287 11.5887 4.61105 11.6273 4.80503C11.6659 4.99901 11.6461 5.20008 11.5704 5.38281C11.4947 5.56553 11.3665 5.72171 11.2021 5.83159C11.0376 5.94147 10.8443 6.00012 10.6465 6.00012C10.3813 6.00012 10.1269 5.89476 9.93938 5.70723C9.75184 5.51969 9.64648 5.26534 9.64648 5.00012Z" fill="#374957"/> </g> <defs> <clipPath id="clip0_89_1850"> <rect width="24" height="24" fill="white" transform="translate(0.646484)"/> </clipPath> </defs> </svg>
                                        {{ @$data['student']->user->getTransWorkField() }}
                                        @if(!auth()->check())
                                            <a class="btn-primary-fill py-1" type="button" href="{{ route('login.auth') }}">
                                                <i class="ri-magic-line"></i>
                                                طلب استشارة 
                                            </a>
                                        @elseif(@$data['student']->user->id !== auth()->id())
                                            <button class="btn-primary-fill py-1" type="button" data-toggle="modal" data-target="#mentoringModal" onclick="$('#mentoringModal').modal('show')">
                                                <i class="ri-magic-line"></i>
                                                طلب استشارة 
                                            </button>
                                        @endif

                                    </h6>

                                </div>
                            </div>



                            <div class="card accordion mb-3">
                                <div class="card-header rounded border-0 p-0 bg-white" id="for_about">
                                        <button class="bg-white rounded border-0 p-2" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_for_about" aria-expanded="true" aria-controls="for_about">
                                                <i class="ri-user-follow-line"></i>
                                                <span class="country text-title font-600 ml-10">{{ ___('student.About') }}</span>
                                        </button>
                                </div>
                                <div class="show p-3" id="collapse_for_about">
                                    <p class="pera p-2 border border-1 rounded">
                                        <?php echo $data['student']->about_me ?? '-' ?>
                                    </p>
                                </div>
                            </div>
    



                            <div class="card accordion mb-3">
                                <div class="card-header rounded border-0 p-0 bg-white" id="for_experience">
                                        <button class="bg-white rounded border-0 p-2 collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_for_experience" aria-expanded="false" aria-controls="for_experience">
                                            <i class="ri-briefcase-line"></i>
                                            <span class="country text-title font-600 ml-10">{{ ___('student.Experiences') }}</span>
                                        </button>
                                </div>
                                <div class="collapse p-3" id="collapse_for_experience">
                                    <div class="p-2 border border-1 rounded">
                                        @if (@$data['student']->experience)
                                            @foreach (@$data['student']->experience as $key => $experience)
                                                <div class="">
                                                    <div class="single-education mb-30 d-flex justify-content-between align-items-start">
                                                        <div class="education-cap">
                                                            <h5 class="text-16 text-tile mb-15">
                                                                <a href="#">
                                                                    {{ @$experience['title'] }}
                                                                </a>
                                                            </h5>
                                                            <p class="pera text-primary mb-6">
                                                                {{ @$experience['name'] }} -
                                                                <span class="text-title text-capitalize">{{ str_replace('_', ' ',
                                                                    @$experience['employee_type']) }}</span>
                
                                                            </p>
                                                            <p class="pera mb-6">
                                                                {{ date('M y', strtotime(@$experience['start_date'])) }} -
                                                                @if (@$experience['current'])
                                                                {{ ___('student.Present') }} .
                                                                {{ \Carbon\Carbon::parse(@$experience['start_date'])->diffForHumans() }}
                                                                @else
                                                                {{ date('M y', strtotime(@$experience['end_date'])) }}
                                                                @endif
                                                            </p>
                                                            <p class="pera mb-20">
                                                                {{ @$experience['location'] }}
                                                            </p>
                                                            <p class="pera mb-6">
                                                                <?= @$experience['description'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>





                            <!--Educations  -->
                            <div class="card accordion mb-3">
                                <div class="card-header rounded border-0 p-0 bg-white" id="for_education">
                                        <button class="bg-white rounded border-0 p-2 collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_for_education" aria-expanded="false" aria-controls="for_education">
                                            <i class="ri-book-open-line"></i>
                                            <span class="country text-title font-600 ml-10">{{ ___('student.Educations') }}</span>
                                        </button>
                                </div>
                                <div class="collapse p-3" id="collapse_for_education">
                                    <div class="p-2 border border-1 rounded">
                                        @if (@$data['student']->education)
                                            @foreach (@$data['student']->education as $key => $institute)
                                                <div class="">
                                                    <div class="single-education mb-30 d-flex justify-content-between align-items-start">
                
                                                        <div class="education-cap">
                                                            <h5 class="text-16 text-tile mb-15">
                                                                <a href="#">
                                                                    {{ @$institute['name'] }}
                                                                </a>
                                                            </h5>
                                                            <p class="pera text-primary mb-6">
                                                                {{ @$institute['degree'] }} - {{ @$institute['program'] }}
                
                                                            </p>
                                                            <p class="pera mb-20">
                                                                {{ date('M y', strtotime(@$institute['start_date'])) }} -
                                                                @if (@$institute['current'])
                                                                {{ ___('student.Continue') }}
                                                                @else
                                                                {{ date('M y', strtotime(@$institute['end_date'])) }}
                                                                @endif
                                                            </p>
                                                            <p class="pera mb-6">
                                                                <?= @$institute['description'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Educations end -->

                            <!-- Skills -->
                            <div class="card accordion mb-3">
                                <div class="card-header rounded border-0 p-0 bg-white" id="for_skills">
                                        <button class="bg-white rounded border-0 p-2 collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_for_skills" aria-expanded="false" aria-controls="for_skills">
                                            <i class="ri-tools-line"></i>
                                            <span class="country text-title font-600 ml-10">{{ ___('student.Skills & Expertise') }}</span>
                                        </button>
                                </div>
                                <div class="collapse p-3" id="collapse_for_skills">
                                    <div class="pera p-2 border border-1 rounded tag-area3">
                                        <ul class="listing">
                                            @if (@$data['student']->skills)
                                                @foreach (@$data['student']->skills as $key => $skill)
                                                    <li class="single-list">{{ @$skill['value'] }}</li>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
=
                            <!-- Social media links -->
                            <div class="card accordion mb-3">
                                <div class="card-header rounded border-0 p-0 bg-white" id="for_social_media">
                                        <button class="bg-white rounded border-0 p-2 collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_for_social_media" aria-expanded="false" aria-controls="for_social_media">
                                            <i class="ri-profile-line"></i>
                                            <span class="country text-title font-600 ml-10">روابط التواصل الاجتماعي</span>
                                        </button>
                                </div>
                                <div class="collapse p-3" id="collapse_for_social_media">
                                    <div class="pera p-2 border border-1 rounded tag-area3">
                                        <ul class="listing">
                                            @if (@$data['student']->social_media_links)
                                                @foreach (@$data['student']->social_media_links as $key => $link)
                                                    <li class="single-list">
                                                        <a href="{{@$link['value']}}">{{ @$link['value'] }}</a>
                                                    </li>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- CV -->
                            <div class="card accordion mb-3">
                                <div class="card-header rounded border-0 p-0 bg-white" id="for_cv">
                                        <button class="bg-white rounded border-0 p-2 collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_for_cv" aria-expanded="false" aria-controls="for_cv">
                                            <i class="ri-file-line"></i>
                                            <span class="country text-title font-600 ml-10">السيرة الذاتية</span>
                                        </button>
                                </div>
                                <div class="collapse p-3" id="collapse_for_cv">
                                    <div class="pera p-2 border border-1 rounded tag-area3">
                                        <ul class="listing">
                                            @if (@$data['student']->cv_file)
                                            <li class="single-list"><a class="linka"
                                                    href="{{env('APP_URL').'/storage/'.@$data['student']->cv_file->original}}">Download</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

    
    
                            <!-- Phone -->
                            <div class="card accordion mb-3">
                                <div class="card-header rounded border-0 p-0 bg-white" id="for_phone">
                                        <button class="bg-white rounded border-0 p-2 collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_for_phone" aria-expanded="false" aria-controls="for_phone">
                                            <i class="ri-phone-line"></i>
                                            <span class="country text-title font-600 ml-10">رقم الهاتف</span>
                                        </button>
                                </div>
                                <div class="collapse p-3" id="collapse_for_phone">
                                    <div class="pera p-2 border border-1 rounded tag-area3">
                                        <ul class="listing">
                                            @if (@$data['student']->user->phone)
                                            <li class="single-list">
                                                {{@$data['student']->user->phone . ' ' . @$data['student']->user->phone_dial}}
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

<div class="modal fade boostrap-modal" id="mentoringModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content data">

            <div class="modal-body">
                <button type="button" class="close-icon" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line" aria-hidden="true"></i>
                </button>
                <div class="custom-modal-body ">
                    <form id="mentoring-request-form">
                        @csrf

                        <input type="hidden" name="mentor_id" value="{{ @$data['student']->user->id }}">
                        <!-- Title -->
                        <div class="small-tittle-two border-bottom mb-30 pb-8">
                            <h4 class="title text-capitalize font-600">
                                طلب مشورة من {{ @$data['student']->user->name }}
                            </h4>
                        </div>


                        <div class="ot-contact-form mb-24">
                            <label for="title" class="ot-contact-label"> {{ ___('mentoring.Mentoring Title') }} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control ot-contact-input" type="text"
                                placeholder="{{ ___('mentoring.Write Short Title Here') }}" aria-label="Mentoring Title"
                                name="title" id="title" value="">
                            <span class="text-danger custom-error-text" id="error_email"></span>
                        </div>

                        <div class="ot-contact-form mb-24">
                            <label for="phone" class="ot-contact-label"> {{ ___('mentoring.Mentoring phone') }} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control ot-contact-input" type="phone"
                                placeholder="{{ ___('mentoring.Write your phone number') }}" aria-label="Mentoring Title"
                                name="phone" id="phone" value="{{ auth()->user->phone ?? '' }}">
                        </div>

                        <div class="ot-contact-form mb-24">
                            <label class="ot-contact-label" for="mentoring_date">حدد التاريخ و التوقيت
                                <span class="text-danger">*</span></label>
                            <input
                                class="form-control ot-contact-input date-time-picker @error('mentoring_date') is-invalid @enderror"
                                date-picker type="text" name="mentoring_date"
                                value="" id="mentoring_date"
                                placeholder="تاريخ و توقيت المشورة">
                        </div>

                        <div class="ot-contact-form mb-24 monitor-request">
                            <label for="content" class="ot-contact-label"> {{ ___('mentoring.Your Mentoring Request') }} <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control h-100" id="content" name="content" rows="10"
                                placeholder="{{ ___('mentoring.Write Your Question') }}"></textarea>

                        </div>
                        <!-- Submit button -->
                        <div class="btn-wrapper d-flex flex-wrap gap-10 mt-20 justify-content-center justify-content-md-start">
                            <button class="btn-primary-fill" type="button"
                                onclick="submitMentoringRequest()">إرسال</button>
                            <button class="btn-primary-outline close-modal"  data-bs-dismiss="modal" aria-label="Close"
                                type="button">{{ ___('student.Discard') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('frontend/js/student/__modal.min.js') }}"></script> --}}


<style>
    .linka:hover {
        color: white;
    }
</style>

<!-- End-of Profile -->
@endsection