$(document).ready(function () {
    $('#myTabs a[href="#eventsContent"]').tab('show');

    $('#myTabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    var searchInput = $('#searchInput');
    var searchCategoryInput = $('#searchCategoryInput');
    var noEventsMessage = $('#noEventsMessage');
    var noCategoriesMessage = $('#noCategoriesMessage');
    var table = $('table');

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
        console.log('Search query:', query);
        filterEvents(query);
    });

    console.log('JavaScript code is running');

    function filterCategories(query) {
        var categoriesFound = false;

        table.find('tr').each(function () {
            var categoryRow = $(this).text().toLowerCase();
            if (categoryRow.indexOf(query) === -1) {
                $(this).hide();
            } else {
                $(this).show();
                categoriesFound = true;
            }
        });

        if (categoriesFound) {
            noCategoriesMessage.hide();
            table.show();
            $('#removeAllButton').show();
            $('.btn.btn-success').show();
        } else {
            noCategoriesMessage.show();
            table.hide();
            $('#removeAllButton').hide();
            $('.btn.btn-success').hide();
        }
    }
    
    
    searchCategoryInput.on('keyup', function () {
        var query = $(this).val().toLowerCase();
        console.log('Search query:', query);
        filterCategories(query);
    });


});


