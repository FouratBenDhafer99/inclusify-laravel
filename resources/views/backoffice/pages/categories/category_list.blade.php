    @extends('backoffice.pages.categories.index')
    @section('categories')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="card-title ">{{ __('Categories') }}</h2>
                                        <p class="card-category"></p>
                                    </div>
                                    <div class="col">
                                        @include('backoffice.alerts.danger')
                                    </div>
                                    <div class="col">
                                        <div class="float-right">
                                            <a href="{{ route('admin.category.form') }}">
                                                <label class="btn btn-sm btn-success active ">
                                                    <i class="tim-icons icon-simple-add"></i>
                                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Add a
                                                        category</span>
                                                    <span class="d-block d-sm-none"></span>
                                                </label>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $category->description }}
                                                    </td>
                                                    <td class="text-primary">
                                                        <a href="{{ route('admin.category.form', $category->id) }}"
                                                            class="btn btn-sm btn-info text-white">Edit</a>
                                                        <a href="{{ route('admin.category.delete', $category->id) }}"
                                                            class="btn btn-sm btn-danger text-white">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
