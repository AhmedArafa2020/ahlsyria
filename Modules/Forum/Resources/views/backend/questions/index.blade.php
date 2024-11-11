@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection


@section('content')
    <div class="page-content">

        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => @$data['title'],
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                '#' => @$data['title'],
            ],

            'buttons' => 1,
        ])
        {{-- breadecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic ecommerce-components product-list">
            <div class="card">
                <div class="card-body">
                    <!--  toolbar table start  -->
                    <div
                        class="table-toolbar d-flex flex-wrap gap-2 flex-column flex-xl-row justify-content-center justify-content-xxl-between align-content-center pb-3">
                        <form action="" method="get">
                            <div class="align-self-center">
                                <div
                                    class="d-flex flex-wrap gap-2 flex-column flex-lg-row justify-content-center align-content-center">
                                    <!-- show per page -->
                                    @include('backend.ui-components.per-page')
                                    <!-- show per page end -->

                                     <!-- start categories -->
                                     <div class="align-self-center">
                                        <div class="dropdown dropdown-designation custom-dropdown-select"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="{{ ___('common.Category') }}">
                                            <select id="single" class="select2 form-control categories_select"
                                                name="category" data-href="{{ route('ajax-forum-categories-list') }}">
                                                <option selected disabled>{{ ___('common.Select Category') }}</option>
                                                @if (@$_GET['category'])
                                                    <option value="{{ $_GET['category'] }}" selected>
                                                        {{ @$data['params']['category'] }}</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <!-- end categories -->

                                    <!-- start Creator -->
                                    <div class="align-self-center">
                                        <div class="dropdown dropdown-designation custom-dropdown-select"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="{{ ___('forum.Select Creator') }}">
                                            <select class="form-control created_by_select w-100" name="created_by"
                                                data-href="{{ route('ajax-forum-creator-list') }}">
                                                <option selected disabled>
                                                    {{ ___('forum.Select Creator') }}</option>
                                                @if (@$_GET['created_by'])
                                                    <option value="{{ $_GET['created_by'] }}" selected>
                                                        {{ @$data['params']['created_by'] }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end Creator -->

                                    <!-- start filter -->
                                    <div class="align-self-center">
                                        <div class="dropdown dropdown-designation custom-dropdown-select"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="{{ ___('ui_element.status') }}">
                                            <select class="form-control select2 w-100" name="status">
                                                <option selected disabled>
                                                    {{ ___('common.Select Status') }}</option>
                                                @if (@$_GET['status'])
                                                    <option value="{{ $_GET['status'] }}" selected>
                                                        {{ @$data['params']['status'] }}</option>
                                                @endif
                                                <option value="1" {{ @$_GET['status'] == 1 ? 'selected' : '' }}>
                                                    {{ ___('common.Active') }}</option>
                                                <option value="2" {{ @$_GET['status'] == 3 ? 'selected' : '' }}>
                                                    {{ ___('common.Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end filter -->

                                    <div class="align-self-center d-flex gap-2">
                                        <!-- search start -->
                                        <div class="align-self-center">
                                            <div class="search-box d-flex">
                                                <input class="form-control" placeholder="{{ ___('common.search') }}"
                                                    name="search" value="{{ @request()->search }}" />
                                                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                            </div>
                                        </div>
                                        <!-- search end -->


                                        <!-- dropdown action -->
                                        <div class="align-self-center">
                                            <div class="dropdown dropdown-action">
                                                <button type="submit" class="btn-add">
                                                    <span class="icon">{{ ___('common.Filter') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!--toolbar table end -->
                    <!--  table start -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead">
                                <!-- start table header from ui-helper function -->
                                {{ table_header('', $data['tableHeader']) }}
                                <!-- end table header from ui-helper function -->
                            </thead>
                            <tbody class="tbody">

                                @forelse ($data['forum_questions'] as $key => $question)
                                    <tr>
                                        <td>{{ @$question->id }}</td>
                                        <td>{{ Str::limit(@$question->title, 20) }}</td>
                                        <td>{{ @$question->category->title }}</td>
                                        <td>{{ @$question->user->name }}</td>
                                        <td>{{ @$question->answers->count() }}</td>
                                        <td>{{ @$question->replies->count() }}</td>
                                        <td>{{ statusBackend(@$question->featured->class, @$question->featured->name) }}</td>
                                        <td>{{ statusBackend(@$question->status->class, @$question->status->name) }}</td>
                                        <td class="action">
                                            <div class="dropdown dropdown-action">
                                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('forum.details', $question->slug) }}" target="_blank"><span
                                                                class="icon mr-12"><i class="fa-solid fa-eye"></i></span>
                                                            {{ ___('common.View') }}</a>
                                                    </li>
                                                    @if (hasPermission('forum_featured_manage'))
                                                    <li>
                                                        <a class="dropdown-item change_featured"
                                                            href="javascript:void(0);" data-id="{{ encryptFunction(@$question->id) }}"><span
                                                                class="icon mr-12"><i class="fa-solid fa-rotate-left" ></i></span>
                                                            {{ $question->is_featured == 10 ? ___('forum.Make Featured') : ___('forum.Remove Featured') }}</a>
                                                    </li>
                                                    @endif
                                                    @if (hasPermission('forum_status_manage'))
                                                    <li>
                                                        <a class="dropdown-item change_status"
                                                            href="javascript:void(0);" data-id="{{ encryptFunction(@$question->id) }}"><span
                                                                class="icon mr-12"><i class="fa-solid fa-rotate-left"></i></span>
                                                            {{ $question->status_id == 1 ? ___('forum.Make Inactive') : ___('forum.Make Active') }}</a>
                                                    </li>
                                                    @endif
                                                    @if (hasPermission('forum_delete'))
                                                        <li>
                                                            <a class="dropdown-item delete_data" href="javascript:void(0);"
                                                                data-href="{{ route('forum.destroy', encryptFunction($question->id)) }}">
                                                                <span class="icon mr-8"><i
                                                                        class="fa-solid fa-trash-can"></i></span>
                                                                <span>{{ ___('common.delete') }}</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <!-- empty table -->
                                    @include('backend.ui-components.empty_table', [
                                        'colspan' => '9',
                                        'message' => ___('message.Please add a new entity or manage the data table to see the content here'),
                                    ])
                                    <!-- empty table -->
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--  table end -->
                    <!--  pagination start -->
                    @include('backend.ui-components.pagination', ['data' => $data['forum_questions']])
                    <!--  pagination end -->
                </div>
            </div>
        </div>
        <!--  table content end -->
    </div>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
    <script src="{{ asset('modules/forum/js/app.js') }}"></script>
@endpush
