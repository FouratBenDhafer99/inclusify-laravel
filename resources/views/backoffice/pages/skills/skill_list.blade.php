@extends('backoffice.pages.skills.index')
@section('skills')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title ">{{__('Skills')}}</h2>
                                    <p class="card-category"></p>
                                </div>
                                <div class="col">
                                    @include('backoffice.alerts.danger')
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <a href="{{ route('admin.skill.form') }}">
                                            <label class="btn btn-sm btn-success active ">
                                                <i class="tim-icons icon-simple-add"></i>
                                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Add a skill</span>
                                                <span class="d-block d-sm-none">
                                </span>
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
                                        Date created
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($skills as $skill)
                                        <tr>
                                            <td>
                                                {{$skill->name}}
                                            </td>
                                            <td>
                                                {{$skill->created_at}}
                                            </td>
                                            <td class="text-primary">
                                                <button class="btn btn-sm btn-primary">See quizzes</button>
                                                <a href="{{ route('admin.skill.form', $skill->id) }}"
                                                   class="btn btn-sm btn-info text-white">Edit</a>
                                                <a href="{{ route('admin.skill.delete', $skill->id) }}"
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
