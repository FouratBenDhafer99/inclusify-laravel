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
    var deleteAllRoute = '{{ route("events.deleteAll") }}';
    
    function filterEvents(query) {
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
    }

    searchInput.on('keyup', function () {
        var query = $(this).val().toLowerCase();
        console.log('Search query:', query); // Log the search query
        filterEvents(query);
    });

    console.log('JavaScript code is running');

    function confirmDelete(deleteUrl, deletionType, selectedEventIds) {
        if (deletionType === 'single') {
            // If it's a single event deletion, directly navigate to the delete URL
            window.location.href = deleteUrl;
        } else {
            // If it's multiple event deletion, display the modal
            $('#deleteConfirmationModal').modal('show');
            $('#confirmDelete').off('click').on('click', function () {
                $('#deleteConfirmationModal').modal('hide');
                console.log('Submitting the form');
                $('#deleteForm').attr('action', deleteUrl).submit();
    
                // Update the UI to remove the selected events
                selectedEventIds.forEach(function (eventId) {
                    $('input[value="' + eventId + '"]').closest('tr').remove();
                });
            });
        }
    }
    
    
    $('#removeAllButton').click(function () {
        const selectedEventIds = [];

        $('input[type="checkbox"]:checked').each(function () {
            selectedEventIds.push($(this).val());
        });

        // Log the selected event IDs to the console
        console.log('Selected Event IDs:', selectedEventIds);

        if (selectedEventIds.length === 0) {
            alert('Please select events to delete.');
        } else {
            $('#selectedEvents').val(selectedEventIds.join(','));
            // Determine the deletion type based on the number of selected events
            const deletionType = selectedEventIds.length === 1 ? 'single' : 'multiple';
            confirmDelete(deleteAllRoute, deletionType, selectedEventIds);
        }
    });
    
    
    

    $('#confirmDelete').click(function () {
        $('#deleteConfirmationModal').modal('hide');
        console.log('Submitting the form');
        $('#deleteForm').submit();
    });
});