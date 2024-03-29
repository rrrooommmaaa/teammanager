@extends('layouts.app')

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ now()->format('F Y') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('page.index', 'calendar') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Calendar') }}</li>

            @slot('calendar')
                <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                    <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                        <i class="fas fa-angle-right"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month">Month</a>
                    <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek">Week</a>
                    <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay">Day</a>
                </div>
            @endslot
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <!-- Fullcalendar -->
                <div class="card card-calendar">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">Calendar</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body p-0">
                        <div class="calendar" data-toggle="calendar" id="calendar"></div>
                    </div>
                </div>
                <!-- Modal - Add new event -->
                <!--* Modal header *-->
                <!--* Modal body *-->
                <!--* Modal footer *-->
                <!--* Modal init *-->
                <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
                        <div class="modal-content">
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form class="new-event--form">
                                    <div class="form-group">
                                        <label class="form-control-label">Event title</label>
                                        <input type="text" class="form-control form-control-alternative new-event--title" placeholder="Event Title">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-control-label d-block mb-3">Status color</label>
                                        <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                                            <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" autocomplete="off" checked></label>
                                            <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning" autocomplete="off"></label>
                                            <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger" autocomplete="off"></label>
                                            <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success" autocomplete="off"></label>
                                            <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default" autocomplete="off"></label>
                                            <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary" autocomplete="off"></label>
                                        </div>
                                    </div>
                                    <input type="hidden" class="new-event--start" />
                                    <input type="hidden" class="new-event--end" />
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary new-event--add">Add event</button>
                                <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal - Edit event -->
                <!--* Modal body *-->
                <!--* Modal footer *-->
                <!--* Modal init *-->
                <div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="edit-event-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
                        <div class="modal-content">
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form class="edit-event--form">
                                    <div class="form-group">
                                        <label class="form-control-label">Event title</label>
                                        <input type="text" class="form-control form-control-alternative edit-event--title" placeholder="Event Title">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label d-block mb-3">Status color</label>
                                        <div class="btn-group btn-group-toggle btn-group-colors event-tag mb-0" data-toggle="buttons">
                                            <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" autocomplete="off" checked></label>
                                            <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning" autocomplete="off"></label>
                                            <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger" autocomplete="off"></label>
                                            <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success" autocomplete="off"></label>
                                            <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default" autocomplete="off"></label>
                                            <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary" autocomplete="off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Description</label>
                                        <textarea class="form-control form-control-alternative edit-event--description textarea-autosize" placeholder="Event Desctiption"></textarea>
                                        <i class="form-group--bar"></i>
                                    </div>
                                    <input type="hidden" class="edit-event--id">
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-calendar="update">Update</button>
                                <button class="btn btn-danger" data-calendar="delete">Delete</button>
                                <button class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/moment/min/moment.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
@endpush