@extends('layouts.app')

@section('content')
<div class="container create-report">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Update Report for {{$report->patient->firstname}} {{$report->patient->lastname}}</h1>
            <hr />
            <form method="POST" action="{{ url("reports/$report->id") }}">
                {{ csrf_field() }}
                @include('errors.validation')
                <input type="hidden" name="_method" value="PUT" />
                 <div class="row">
                    <div class="form-group col-md-6">
                        <label for="lastname">*Select Date</label>
                        <input autocomplete="off" autofocus required name="reportDate" type="text" class="form-control" id="reportDate" placeholder="Select Date" value="{{$report->reportDate}}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contact">*Laboratory</label>
                        <input required name="lab" type="text" class="form-control" id="lab" placeholder="Laboratory" value="{{$report->lab}}">
                    </div>
                </div>
               		 @foreach($report->tests as $test)
	                	<div class="row">
						    <div class="form-group col-md-4">
						        <label for="contact">Test</label>
						        <input  name="test[]" type="text" class="form-control" id="test" placeholder="Test" value="{{$test->test}}">
						    </div>

						    <div class="form-group col-md-4">
						        <label for="contact">Result</label>
						        <input  name="result[]" type="text" class="form-control" id="result" placeholder="Result" value="{{$test->result}}">
						    </div>

						    <div class="form-group col-md-4">
						        <label for="contact">Remarks</label>
						        <input  name="comment[]" type="text" class="form-control" id="comment" placeholder="Remarks"  value="{{$test->comment}}">
						    </div>
						</div>
                	@endforeach
				<p class="text-center"><a href="javascript:;" id="add-new-test">Add New Test</a></p>

                <div class="form-group">
                    <label for="reportRemarks">Comment</label>
                    <textarea id="reportRemarks" name="reportRemarks" col="12" row="12" class="form-control">{{$report->reportRemarks}}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Report</button>
                    <a href="/reports" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
