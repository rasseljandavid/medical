@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create new Patient</h1>
            <hr />
            <form method="POST" action="{{ url('patients') }}">
                {{ csrf_field() }}
                @include('errors.validation')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="firstname">*First Name</label>
                        <input autofocus required name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" value="{{ old('firstname') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">*Last Name</label>
                        <input required name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{ old('lastname') }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="contact">*Contact</label>
                        <input required name="contact" type="text" class="form-control" id="contact" placeholder="Contact" value="{{ old('contact') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>


                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="address" class="form-control" id="address" placeholder="Address" value="{{ old('address') }}">
                </div>
                <hr />

                <div class="row">
                
                    <div class="form-group col-md-6">
                        <label for="passcode">*Passcode for Login</label>
                        <input required name="passcode" type="passcode" class="form-control" id="passcode" placeholder="Passcode" value="{{ old('passcode') }}">
                    </div>

                    <div class="col-md-6">
                        <p class="legend">Field that have <span style="font-size: 1.4em;">*</span> are required.</p>
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Patient</button>
                    <a href="/patients" class="btn btn-default">Cancel</a>
                </div>
            </form>

           
        </div>
    </div>
</div>
@endsection
