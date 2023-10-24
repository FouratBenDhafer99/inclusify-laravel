@extends('backoffice.layouts.app')

@section('content')
<head>
    <!-- Add these lines to your HTML file -->
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
            <a class="nav-link {{ request()->input('activeTab') === 'eventsTab' ? 'active' : '' }}" id="eventsTab" data-toggle="tab" href="#eventsContent">Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->input('activeTab') === 'categoryTab' ? 'active' : '' }}" id="categoryTab" data-toggle="tab" href="#categoryContent">Category</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade {{ request()->input('activeTab') === 'eventsTab' ? 'show active' : '' }}" id="eventsContent">
            <br>
            <h1>Events</h1>
            <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                <input type="text" id="searchInput" class="form-control" placeholder="Search Events">
                <div style="display: flex; gap: 10px;">
                <button type="button" class="btn btn-primary remove-all-button" data-url="{{ route('events.deleteAll') }}" data-type="events">Remove All</button>
                <a href="{{ route('events.create') }}" class="btn btn-success">Create New Event</a>
                </div>
            </div>


            <div id="noEventsMessage" style="display: none;">
                <div class="center-content">
                    <h2>The searched product is either not existent or no longer available, <br>unless you have a time travel machine.<br></h2>
                    <img src="{{ asset('frontoffice/images/noevents.png') }}" alt="No Events Found">
                </div>
            </div>


            @if (count($data['events']) === 0)
                <p>No events found.</p>
            @else
            <form method="POST" action="{{ route('events.deleteAll') }}">
                @csrf
                @method('DELETE') 
                <table class="table">
                    <thead>
                        <tr>
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
                        @foreach ($data['events'] as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->organizer->name }}</td>
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
                                    <form method="POST" action="{{ route('events.destroy', $event->id) }}">
                                        @csrf
                                        @method('DELETE') 
                                        <button class="btn btn-link" type="submit" onclick="return confirm('Are you sure you want to delete this event?');">
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
        <div class="tab-pane fade {{ request()->input('activeTab') === 'categoryTab' ? 'show active' : '' }}" id="categoryContent">
            <br>
            <h1>Category</h1>
            <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                <input type="text" id="searchCategoryInput" class="form-control" placeholder="Search Categorys">
                <div style="display: flex; gap: 10px;">
                    <button type="button" class="btn btn-primary" id="removeAllCategoriesButton">Remove All</button>
                    <a href="{{ route('categories.create') }}" class="btn btn-success">Create New Category</a>
                </div>
            </div>


            <div id="noCategoriesMessage" style="display: none;">
                <div class="center-content">
                    <h2>The searched product is either not existent or no longer available, <br>unless you have a time travel machine.<br></h2>
                    <img src="{{ asset('frontoffice/images/noevents.png') }}" alt="No Events Found">
                </div>
            </div>

            @if (count($data['categories']) === 0)
                <p>No categories found.</p>
            @else
            <form method="POST" action="">
                @csrf
                @method('DELETE') 
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['categories'] as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                            <div class="btn-group">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-link">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}" id="deleteCategoryForm">
                                    @csrf
                                    @method('DELETE') 
                                    <button class="btn btn-link" type="submit" onclick="confirmDelete('{{ route('categories.deleteAll') }}', 'all')">
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
    </div>

    
</div>



<div class="modal fade delete-confirmation-modal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete all the categories?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
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
                Are you sure you want to delete all the events?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function handleDeleteAll(url, type) {
        if (confirm(`Are you sure you want to delete all ${type}?`)) {
            const deleteAllForm = document.getElementById('deleteAllForm');
            deleteAllForm.action = url;
            deleteAllForm.submit();
        }
    }

    function confirmDelete(deleteUrl, deletionType) {
        if (deletionType === 'single') {
            window.location.href = deleteUrl;
        } else {
            // If it's multiple event deletion, display the modal
            $('#deleteConfirmationModal').modal('show');
            $('#confirmDelete').off('click').on('click', function () {
                $('#deleteConfirmationModal').modal('hide');
                console.log('Submitting the form');
                $('#deleteForm').attr('action', deleteUrl).submit();
            });
        }
    }


    document.addEventListener('DOMContentLoaded', function () {
        const removeAllButtons = document.querySelectorAll('.remove-all-button');
        removeAllButtons.forEach(button => {
            button.addEventListener('click', function () {
                const url = this.getAttribute('data-url');
                const type = this.getAttribute('data-type');
                handleDeleteAll(url, type);
            });
        });
    });

   

</script>

@endsection
