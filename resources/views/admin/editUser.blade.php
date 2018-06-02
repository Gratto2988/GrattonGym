@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2 ">
                       <div class="panel panel-default">
                <div class="panel-heading"><strong>Update User</strong><a href="/home/details"><button type="button" class="btn btn-xs btn-success pull-right">Back to Account</button></a></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="updatename">
                        {{ csrf_field() }}
                        
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $user->id }}" required>

                        <div class="form-group{{ $errors->has('string') ? ' has-error' : '' }}">

                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
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



<!-- Email Area -->

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Update Email</strong><a href="/home/details"></a></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="updateemail">
                        {{ csrf_field() }}
                        
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $user->id }}" required>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                            Current Email: <strong>{{$user['email']}}</strong>
                                <input id="email" type="email" class="form-control" name="email"  required autofocus>

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



<!-- Password Area  -->

                       <div class="panel panel-default">
                <div class="panel-heading"><strong>Change Password</strong><a href="/home/details"></a></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="updatepassword">
                        {{ csrf_field() }}
                        
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $user->id }}" required>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <input type="checkbox" onclick="myFunction()">Show Password
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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

<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@endsection