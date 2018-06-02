@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Update Email</strong><a href="/home/details"><button type="button" class="btn btn-xs btn-success pull-right">Back to Account</button></a></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="updateemail">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                            Current Email: <strong>{{$user['email']}}</strong>
                                <input id="email" type="email" class="form-control" name="email" value="{{$user['email']}}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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