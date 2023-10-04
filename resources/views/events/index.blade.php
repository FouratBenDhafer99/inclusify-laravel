@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Search Events">
    </div>

    <h1>Events</h1>

    <div id="noEventsMessage" style="display: none;">
        No events found. Please try again.
    </div>

    @if (count($events) === 0)
        <p>No events found.</p>
    @else
    <form method="POST" action="{{ route('events.deleteAll') }}">
        @csrf
        @method('DELETE') 
        <button type="button" class="btn btn-primary" id="removeAllButton">Remove All</button>
        <a href="{{ route('events.create') }}" class="btn btn-success">Create New Event</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Select</th> <!-- New checkbox column -->
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
                            <button class="btn btn-link" onclick="confirmDelete('{{ route('events.destroy', $event->id) }}')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    @endif
</div>

<!-- Add this code inside your Blade template -->
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
<form id="deleteForm" method="POST" action="{{ route('events.deleteAll') }}">
    @csrf
    @method('DELETE')
    <input type="hidden" id="selectedEvents" name="selectedEvents" value="">
</form>


@endsection




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var searchInput = $('#searchInput');
        var noEventsMessage = $('#noEventsMessage');
        var tableBody = $('tbody'); 
        searchInput.on('keyup', function () {
            var query = $(this).val().toLowerCase(); 
            var eventsFound = false;

            tableBody.find('tr').each(function () {
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
                tableBody.show();
            } else {
                noEventsMessage.show();
                tableBody.hide();
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
        // Show the modal when "Remove All" is clicked
        $('#removeAllButton').click(function () {
            const selectedEventIds = [];

            // Loop through the selected checkboxes and collect their IDs
            $('input[type="checkbox"]:checked').each(function () {
                selectedEventIds.push($(this).data('event-id'));
            });

            console.log(selectedEventIds); // Check if this logs the selected event IDs

            if (selectedEventIds.length === 0) {
                alert('Please select events to delete.');
            } else {
                // Set the selected event IDs in the hidden input field
                $('#selectedEvents').val(JSON.stringify(selectedEventIds));

                // Show the confirmation modal
                $('#deleteConfirmationModal').modal('show');
            }
        });


        // Handle deletion confirmation
        $('#confirmDelete').click(function () {
            // Close the modal
            $('#deleteConfirmationModal').modal('hide');

            // Submit the form for deletion
            console.log('Submitting the form'); 
            $('#deleteForm').submit();
        });
    });
</script>

