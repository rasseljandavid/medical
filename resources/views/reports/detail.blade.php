@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>
            	Report for {{$report->patient->firstname}} {{$report->patient->firstname}} on
            	{{$report->reportDate}}
           	</h2>
            <hr />
            <div class="table-responsive">
	            <table class="table table-bordered">
	                <thead>
	                	<tr>
		                    <th>Test</th>
		                    <th>Result</th>
		                    <th>Remarks</th>
	                    </tr>
	                </thead>

	                <tbody>
	                    @foreach($report->tests as $test)
	                    <tr>
	                        <td>{{ $test->test}}</td>
	                        <td>{{ $test->result}}</td>
	                        <td>{{ $test->comment}}</td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
            </div>

            <p><strong>Conclusion:</strong></p>
            <p>{{$report->reportRemarks}}</p>
            <hr />

            <p>
            	<a href="/email/{{$report->id}}" class="btn btn-primary"><i class="fa fa-email"> </i>Email</a> 
            	<a href="/download/{{$report->id}}" download class="btn btn-info">Export</a>
            </p>
        </div>
    </div>
</div>
@endsection
