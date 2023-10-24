@extends('backoffice.pages.questions.index')
@section('questions')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title ">{{__('Questions')}}</h2>
                                    <p class="card-category"></p>
                                </div>
                                <div class="col">
                                    @include('backoffice.alerts.danger')
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <a href="{{ route('admin.question.form') }}">
                                            <label class="btn btn-sm btn-success active ">
                                                <i class="tim-icons icon-simple-add"></i>
                                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Add a question</span>
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
                                        The question
                                    </th>
                                    <th>
                                        Skill
                                    </th>
                                    <th>
                                        Date created
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>
                                                {{$question->description}}
                                            </td>
                                            <td>
                                                {{$question->skill->name}}
                                            </td>
                                            <td>
                                                {{$question->created_at}}
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{ route('admin.question.delete', $question->id) }}"
                                                   class="btn btn-sm btn-danger text-white">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="">
                                {{$questions->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
