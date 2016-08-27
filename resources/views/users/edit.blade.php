@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Operator {{$user->name}}</h1>
            <hr />
            <form method="POST" action="{{ url("users/$user->id") }}">
                {{ csrf_field() }}
                @include('errors.validation')
                <input type="hidden" name="_method" value="PUT" />
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">*Name</label>
                        <input autofocus required name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">*Email</label>
                        <input required name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">*Password</label>
                        <input required name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Confirm Password</label>
                        <input required name="password_confirmation" type="password" class="form-control" id="password-confirm" placeholder="Confirm Password">
                    </div>
                </div>
                
               

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Operator</button>
                    <a href="/users" class="btn btn-default">Cancel</a>
                </div>
            </form>

           
        </div>
    </div>
</div>
@endsection
