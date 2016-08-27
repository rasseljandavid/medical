@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Patient {{$patient->firstname}} {{$patient->lastname}}</h1>
            <hr />
            @include('errors.validation')
            <form method="POST" action="{{ url("patients/$patient->id") }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" />
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="firstname">*First Name</label>
                        <input autofocus value="{{ $patient->firstname }}" required name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name">
                     </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">*Last Name</label>
                        <input value="{{ $patient->lastname }}" required name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="contact">*Contact</label>
                        <input value="{{ $patient->contact }}" required name="contact" type="text" class="form-control" id="contact" placeholder="Contact">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input value="{{ $patient->email }}"  name="email" type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input value="{{ $patient->address }}"  name="address" type="address" class="form-control" id="address" placeholder="Address">
                </div>
                <hr />
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="passcode">*Passcode for Login</label>
                        <input value="{{ $patient->passcode }}" required name="passcode" type="passcode" class="form-control" id="passcode" placeholder="Passcode">
                    </div>

                    <div class="col-md-6">
                        <p class="legend">Field that have <span style="font-size: 1.4em;">*</span> are required.</p>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Patient</button>
                    <a href="/patients" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
