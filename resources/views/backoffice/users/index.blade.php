@extends('backoffice.layouts.app')
@section('page_title', 'Skill')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Users</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="table tablesorter " id="">
                                <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            <a href="{{$user->email}}">{{$user->email}}</a>
                                        </td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td class="">
                                            <form method="post"
                                                  @if($user->role=='ADMIN')
                                                      action="{{ route('admin.user.revokeAdmin', $user->id) }}"
                                                  @else
                                                      action="{{ route('admin.user.grantAdmin', $user->id) }}"
                                                  @endif
                                            >
                                                @csrf
                                                @method('PUT')

                                                    <button type="submit" class="btn ">
                                                        @if($user->role!='ADMIN')
                                                        Grant
                                                        @else Revoke
                                                        @endif
                                                            admin role
                                                    </button>
                                            </form>
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
@endsection
