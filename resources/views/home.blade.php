@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Access Report</div>
                <div class="panel-body">
                    <form class="form-horizontal patient-login" role="form" method="POST" action="{{ url('/') }}">
                        {{ csrf_field() }}

                        @include('errors.validation')
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input autocomplete="off" id="name" type="text" class="form-control" name="name" value=" " autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('passcode') ? ' has-error' : '' }}">
                            <label for="passcode" class="col-md-4 control-label">Passcode</label>

                            <div class="col-md-6">
                                <input id="passcode" type="password" class="form-control" name="passcode" value="">

                                @if ($errors->has('passcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Access Report
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
