@extends('backoffice.layouts.app')

@section('content')
<head>
    <!-- Add these lines to your HTML file -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('frontoffice/js/events.js') }}"></script>
</head>

<style>
    #noEventsMessage {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 18px;
    }

    .center-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    img {
        max-width: 100%;
        height: auto;
    }
    

    .active-tab {
        display: block;
    }
</style>


<!--***************************************************************************************************************************************
*******************************************************       EVENTS       ****************************************************************
****************************************************************************************************************************************-->

<div class="container">

    <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
            <a class="nav-link active" id="eventsTab" data-toggle="tab" href="#eventsContent">Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="categoryTab" data-toggle="tab" href="#categoryContent">Category</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="eventsContent">
            <br>
            <h1>Events</h1>
            <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                <input type="text" id="searchInput" class="form-control" placeholder="Search Events">
                <div style="display: flex; gap: 10px;">
                    <button type="button" class="btn btn-primary" id="removeAllButton">Remove All</button>
                    <a href="{{ route('events.create') }}" class="btn btn-success">Create New Event</a>
                </div>
            </div>


            <div id="noEventsMessage" style="display: none;">
                <div class="center-content">
                    <h2>The searched product is either not existent or no longer available, <br>unless you have a time travel machine.<br></h2>
                    <img src="{{ asset('frontoffice/images/noevents.png') }}" alt="No Events Found">
                </div>
            </div>


            @if (count($events) === 0)
                <p>No events found.</p>
            @else
            <form method="POST" action="{{ route('events.deleteAll') }}">
                @csrf
                @method('DELETE') 
                <!--<button type="button" class="btn btn-primary" id="removeAllButton">Remove All</button>
                <a href="{{ route('events.create') }}" class="btn btn-success">Create New Event</a>-->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Organizer</th>
                            <th>Status</th>
                            <th>Capacity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td>
                                <input type="checkbox" name="selectedEvents[]" value="{{ $event->id }}" data-event-id="{{ $event->id }}">
                            </td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->organizer }}</td>
                            <td>{{ $event->status }}</td>
                            <td>{{ $event->capacity }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-link">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="deleteSingleEventForm" method="POST" action="{{ route('events.destroy', $event->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" onclick="confirmDelete('{{ route('events.destroy', $event->id) }}', 'single')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            @endif

        </div>


        <!--***************************************************************************************************************************************
        *******************************************************       CATEGORY       **************************************************************
        ****************************************************************************************************************************************-->

        <!-- Category tab content -->
        <div class="tab-pane fade" id="categoryContent">
            <h1>Here the part exist for category</h1>
        </div>
    </div>

    
</div>

<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected events?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<form id="deleteMultipleEventForm" method="POST" action="{{ route('events.deleteAll') }}">
    @csrf
    @method('POST')
    <input type="hidden" id="selectedEvents" name="selectedEvents" value="">
</form>

@endsection


<!--
<script>
    $(document).ready(function () {
        $('#myTabs a[href="#eventsContent"]').tab('show');

        // Handle tab switching
        $('#myTabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        var searchInput = $('#searchInput');
        var noEventsMessage = $('#noEventsMessage');
        var table = $('table');

        searchInput.on('keyup', function () {
            var query = $(this).val().toLowerCase();
            var eventsFound = false;

            table.find('tr').each(function () {
                var eventRow = $(this).text().toLowerCase();
                if (eventRow.indexOf(query) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                    eventsFound = true;
                }
            });

            console.log('Search query:', query); // Log the search query
            console.log('Events found:', eventsFound); // Log if events are found

            if (eventsFound) {
                noEventsMessage.hide();
                table.show();
                $('#removeAllButton').show();
                $('.btn.btn-success').show();
            } else {
                noEventsMessage.show();
                table.hide();
                $('#removeAllButton').hide();
                $('.btn.btn-success').hide();
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        console.log('JavaScript code is running');
        var searchInput = $('#searchInput');
        var noEventsMessage = $('#noEventsMessage');
        var table = $('table'); 

        searchInput.on('keyup', function () {
            var query = $(this).val().toLowerCase();
            var eventsFound = false;

            table.find('tr').each(function () {
                var eventRow = $(this).text().toLowerCase();
                if (eventRow.indexOf(query) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                    eventsFound = true;
                }
            });

            if (eventsFound) {
                noEventsMessage.hide();
                table.show();
                $('#removeAllButton').show();  
                $('.btn.btn-success').show(); 
            } else {
                noEventsMessage.show();
                table.hide();
                $('#removeAllButton').hide(); 
                $('.btn.btn-success').hide();
            }
        });
    });
</script>



<script>
    function confirmDelete(deleteUrl) {
        if (confirm('Are you sure you want to delete this event?')) {
            window.location.href = deleteUrl;
        } else {
            return false;
        }
    }
</script>

<script>
    $(document).ready(function () {
        console.log('JavaScript code is running');
        $('#removeAllButton').click(function () {
            const selectedEventIds = [];

            $('input[type="checkbox"]:checked').each(function () {
                selectedEventIds.push($(this).data('event-id'));
            });

            console.log(selectedEventIds); 

            if (selectedEventIds.length === 0) {
                alert('Please select events to delete.');
            } else {
                $('#selectedEvents').val(selectedEventIds);
                $('#deleteConfirmationModal').modal('show');
            }
        });


        $('#confirmDelete').click(function () {
            $('#deleteConfirmationModal').modal('hide');

            console.log('Submitting the form'); 
            $('#deleteForm').submit();
        });
    });
</script>

-->