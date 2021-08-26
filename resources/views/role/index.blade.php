@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mb-5">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Permisiion') }}</div>

                <div class="card-body row">
                    <div class="col-md-12">
                        <form action="{{ route('add.permission') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Permission Name">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <tr style="height: 50px">
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($permissions as $permission )
                            <tr>
                                <td>
                                    {{ $permission->name }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('delete.permission',$permission->id ) }}">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Set a Permisiion') }}</div>

                <div class="card-body">
                    <form action="{{ route('assign.permission') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <select name="role" id="" class="form-control">
                                <option>-- Select A Role--</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="permission" id="" class="form-control">
                                <option>-- Select A Permission--</option>
                                @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Role And Permisiion') }}</div>

                <div class="card-body">
                   <table class="table">
                       <tr style="height: 50px">
                           <th>Role</th>
                           <th>Permission</th>
                           <th>Action</th>
                       </tr>
                       @foreach ($roles as  $role)
                        @if ($role->name != "Super-Admin")
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <ul>
                                    @foreach ($role->getAllPermissions() as $permission )
                                    <li>{{ $permission->name }}
                                        <a href="{{ url('role/permission/' .$role->id ."/".$permission->id ) }}" style="color: #fff; font-family: sans-serif; text-decoration: none; background: red; padding: 2px 4px;">X</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ $role->id }}">Edit</a>
                            </td>
                        </tr>
                        @endif
                       @endforeach

                   </table>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
