@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                       <div class="panel panel-default">
                <div class="panel-heading"><strong>Update Name</strong><a href="/home/details"><button type="button" class="btn btn-xs btn-success pull-right">Back to Account</button></a></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="updatename">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('string') ? ' has-error' : '' }}">

                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                            Current First Name: <strong>{{$user['firstname']}}</strong>
                                <input id="firstname" type="firstname" class="form-control" name="firstname" value="{{$user['firstname']}}" required autofocus>

                                @if ($errors->has('string'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('string') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group{{ $errors->has('string') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                            Current Surname: <strong>{{$user['surname']}}</strong>
                                <input id="surname" type="surname" class="form-control" name="surname" value="{{$user['surname']}}" required autofocus>

                                @if ($errors->has('string'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('string') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


                </div>
    </div>
</div>
@endsection