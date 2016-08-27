@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Report for {{$patient->firstname}} {{$patient->lastname}}</h1>
            <hr />

            <div class="table-responsive">
	            <table class="table table-bordered">
	                <thead>
	                    <th>Date</th>
	                    <th>Laboratory</th>
	                    <th>Remarks</th>
	                </thead>

	                <tbody>
	                    @foreach($patient->reports as $report)
	                 
	                    <tr>
	                        <td><a href="/detail/{{$report->id}}">{{ $report->reportDate}}</a></td>
	                        <td>{{ $report->lab }}</td>
	                        <td>{{ $report->reportRemarks }}</td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
            </div>
        </div>
    </div>
</div>
@endsection
