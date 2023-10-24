console.log('JavaScript file is loaded.');

$(document).ready(function () {
    $('#myTabs a[href="/jobslist"]').tab('show');

    $('#myTabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    var searchInput = $('#searchInput');
    var noJobsMessage = $('.alert.alert-info'); 
    var table = $('.job-listing');

    function filterJobs(query) {
        var jobsFound = false;

        table.find('.card').each(function () {
            var jobRow = $(this).text().toLowerCase();
            if (jobRow.indexOf(query) === -1) {
                $(this).hide();
            } else {
                $(this).show();
                jobsFound = true;
            }
        });

        if (jobsFound) {
            noJobsMessage.hide();
            table.show();
        
        } else {
            noJobsMessage.show();
            table.hide();
        }
    }

    searchInput.on('keyup', function () {
        var query = $(this).val().toLowerCase();
        console.log('Search query:', query);
        filterJobs(query);
    });

    console.log('JavaScript code is running');
});