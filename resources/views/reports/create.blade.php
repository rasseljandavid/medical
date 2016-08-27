@extends('layouts.app')

@section('content')
<div class="container create-report">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Create new Report</h1>
            <hr />
            <form method="POST" action="{{ url('reports') }}">
                {{ csrf_field() }}
                @include('errors.validation')
                <div class="form-group">
                    <label for="firstname">*Select Patient</label>
                    <select autofocus required class="form-control" name="patient" id="patient">
                        <option> </option>
                        @foreach($patients as $patient) 
                            @if($patient->id == old('patient'))
                            <option value='{{$patient->id}}' selected>
                                {{$patient->firstname}} {{$patient->lastname}}
                            </option>
                            @else
                            <option value='{{$patient->id}}'>
                                {{$patient->firstname}} {{$patient->lastname}}
                            </option>
                            @endif
                        @endforeach
                    </select>
                 </div>

                 <div class="row">

                    <div class="form-group col-md-6">
                        <label for="lastname">*Select Date</label>
                        <input autocomplete="off" required name="reportDate" type="text" class="form-control" id="reportDate" placeholder="Select Date"  value="{{ old('reportDate') }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contact">*Laboratory</label>
                        <input required name="lab" type="text" class="form-control" id="lab" placeholder="Laboratory" value="{{ old('lab') }}" />
                    </div>
                </div>

                @include('reports.tests')

                <div class="form-group">
                    <label for="reportRemarks">Comment</label>
                    <textarea id="reportRemarks" name="reportRemarks" col="12" row="30" class="form-control">{{ old('reportRemarks') }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Report</button>
                    <a href="/patients" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
