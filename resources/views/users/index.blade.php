@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card">
                <div class="card-header">{{ __('All Users') }}
                    <a href="{{ route('add.users.superadmin') }}" class="btn btn-primary">Add User</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr style="height: 50px">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Verified</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @foreach ($user->roles()->pluck('name') as $userrole)
                                        {{ $userrole }}
                                    @endforeach
                                </td>
                                <td> <span class="badge  {{ $user->status == 1 ? "badge-primary" : "badge-danger" }}"> {{ $user->status == 1 ? "Active" : "Deactive" }}</span></td>
                                <td>{{ $user->email_verified_at != null ? "Email Verified" : "None Verified"  }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>

                                    @if (!$user->hasRole("Super-Admin"))
                                        <a class="btn  btn-sm {{ $user->status == 1 ? "btn-danger" : "btn-primary" }}" href="{{ $user->id }}">
                                            {{ $user->status == 1 ? "Deactive" : "Active" }}
                                        </a>
                                    @endif
                                    <a class="btn btn-primary btn-sm" href="{{route('edit.users',$user->id)  }}">Edit</a>
                                    @if (!$user->hasRole("Super-Admin"))

                                            <a class="btn btn-danger btn-sm" href="{{ $user->id }}">Delete</a>


                                    @endif


                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>

        </div>
    </div>


</div>
@endsection
