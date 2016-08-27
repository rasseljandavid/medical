@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create new Operator</h1>
            <hr />
            <form method="POST" action="{{ url('users') }}">
                {{ csrf_field() }}
                @include('errors.validation')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">*Name</label>
                        <input autofocus required name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">*Email</label>
                        <input required name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">*Password</label>
                        <input required name="password" type="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">*Confirm Password</label>
                        <input required name="password_confirmation" type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" value="{{ old('password') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Operator</button>
                    <a href="/users" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
