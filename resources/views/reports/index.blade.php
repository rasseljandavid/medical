@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Reports</h1>
            <hr />
            <p>
                <a href="/reports/create" >
                     Add Report
                </a>
            </p>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th></th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Laboratory</th>
                    <th>Remarks</th>
                </thead>

                <tbody>
                    @foreach($reports as $report)
                 
                    <tr>
                        <td>
                            <a href="/reports/{{$report->id}}/edit">Edit</a> | 
                            <a href="javascript:;" class="delete" data-confirm="delete-form-{{$report->id}}">Delete</a>
                            <form id="delete-form-{{$report->id}}" method="POST" action="/reports/{{$report->id}}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="">
                            </form>
                        </td>
                        <td>{{ $report->patient->firstname }} {{ $report->patient->lastname }}</td>
                        <td>{{ $report->reportDate}}</td>
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
