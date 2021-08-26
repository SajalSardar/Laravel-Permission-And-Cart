@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mb-5">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Permisiion') }}</div>

                <div class="card-body row">
                    <div class="col-md-12">
                        <form action="{{ route('update.users',$user->id ) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text"  class="form-control" name="name" value="{{ $user->name}}">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                            </div>
                            @if ($user->name != "Super-Admin")
                            <div class="form-group">
                                <select name="role" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if($user->hasRole($role->id) == $role->id) selected @endif
                                        >
                                            {{ $role->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            @endif


                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>


</div>
@endsection
