@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2 ">
            
<div class="panel panel-default">
                <div class="panel-heading"><strong>Edit Mentor</strong></div>
                <div class="panel-body"> 
                    <form class="form-horizontal" method="POST" action="updatementor">
                        {{ csrf_field() }}
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $mentors->id }}" required>

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="firstname" class="form-control" name="firstname" value="{{$mentors->firstname}}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$mentors->surname}}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Mentor
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>

        </div>
    </div>
</div>


@endSection

