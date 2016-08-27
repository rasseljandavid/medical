@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Patients</h1>
            <hr />
            <p>

                <a href="/patients/create" >
                     Add Patient
                </a>
            </p>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th></th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Passcode</th>
                </thead>

                <tbody>
                    @foreach($patients as $patient)
                    <tr>
                        <td>
                            <a href="/patients/{{$patient->id}}/edit"> Edit </a> | 
                            <a href="javascript:;" class="delete" data-confirm="delete-form-{{$patient->id}}"> Delete 
                            </a>
                            <form id="delete-form-{{$patient->id}}" method="POST" action="/patients/{{$patient->id}}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="">
                            </form>
                        </td>
                        <td>{{ $patient->firstname}} {{ $patient->lastname }}</td>
                        <td>{{ $patient->contact }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->passcode }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
