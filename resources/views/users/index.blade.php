@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Operators</h1>
            <hr />
            <p>
                <a href="/users/create" >
                     Add Operator
                </a>
            </p>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="/users/{{$user->id}}/edit"> Edit </a> | 
                            <a href="javascript:;" class="delete" data-confirm="delete-form-{{$user->id}}"> Delete 
                            </a>
                            <form id="delete-form-{{$user->id}}" method="POST" action="/users/{{$user->id}}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="">
                            </form>
                        </td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
