@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mb-5">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ __('Add New User') }}</div>

                <div class="card-body row">
                    <div class="col-md-12">

                        <form action="{{ route('insert.users.superadmin') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input id="name" type="text" placeholder="User Name" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation"
                                    autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <select name="role" id="type" class="form-control" value="{{ old('role') }}">
                                    <option disabled selected value>-- Select Type --</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" >
                                        {{ $role->name }}
                                    </option>
                                    @endforeach

                                </select>

                                    @error('role')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>
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
