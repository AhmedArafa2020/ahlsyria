@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection


@section('content')
    <div class="event-content">

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

                                    @include('backend.ui-components.per-page')


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

                                @forelse ($data['mentorings'] as $key => $item)
                                    <tr>
                                        <td>{{ @$item->id }}</td>
                                        <td>{{ Str::limit(@$item->title, 20) }}</td>
                                        <td>
                                            {{ $item->status }}
                                            {{-- {{ statusBackend(@$item->status->class, $item->status) }} --}}
                                        </td>
                                        <td class="create-date">{{ showDate(@$item->mentoring_date) }}</td>
                                        <td class="create-date">{{ showDate(@$item->created_at) }}</td>

                                        <td class="action">
                                            <a class="dropdown-item"
                                                href="{{ route('mentorings.show', $item->id) }}"><span
                                                    class="icon mr-12"><i
                                                        class="fa-solid fa-eye"></i></span>
                                                {{ ___('common.show') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <!-- empty table -->
                                    @include('backend.ui-components.empty_table', [
                                        'colspan' => '6',
                                        'message' => ___(
                                            'message.Please add a new entity or manage the data table to see the content here'),
                                    ])
                                    <!-- empty table -->
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--  table end -->
                    <!--  pagination start -->
                    @include('backend.ui-components.pagination', ['data' => $data['mentorings']])
                    <!--  pagination end -->
                </div>
            </div>
        </div>
        <!--  table content end -->
    </div>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
