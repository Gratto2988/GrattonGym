@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">

<!-- Add Class Form -->
    <div class="panel panel-default">
                <div class="panel-heading"><strong>Add Class</strong></div>
                <div class="panel-body"> 
                    <form class="form-horizontal" method="POST" action="addedclass">
                        {{ csrf_field() }}
    <!-- Class Name -->
                        <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                            <label for="class" class="col-md-3 control-label">Class Name</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control" name="class" value="{{ old('class') }}" placeholder="Class Name" required autofocus>

                                @if ($errors->has('class'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <!-- Day -->
                <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                            <label for="day" class="col-md-3 control-label">Day</label>

                            <div class="col-md-6">
                                
                                <select class="form-control" id="day" name="day">
                                    <option class="form-control" disabled selected>Please Select A Day</option>
                                    <option id="monday" class="form-control" name="monday" value="mon" required autofocus>Monday</option>
                                    <option id="tuesday" class="form-control" name="tuesday" value="tue" required autofocus>Tuesday</option>
                                    <option id="wednesday" class="form-control" name="wednesday" value="wed" required autofocus>Wednesday</option>
                                    <option id="thursday" class="form-control" name="thursday" value="thu" required autofocus>Thursday</option>
                                    <option id="friday" class="form-control" name="friday" value="fri" required autofocus>Friday</option>
                                    <option id="saturday" class="form-control" name="saturday" value="sat" required autofocus>Saturday</option>
                                    <option id="sunday" class="form-control" name="sunday" value="sun" required autofocus>Sunday</option>

                                </select>

                                @if ($errors->has('day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <!-- Duration -->
                <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-3 control-label">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" min="10" class="form-control" name="duration" value="{{ old('duration') }}" placeholder="Duration of Class" required autofocus>

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <!-- Time -->
                <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="time" class="col-md-3 control-label">Time</label>

                            <div class="col-md-2">
                                <input id="time" type="time" class="form-control" name="time" value="{{ old('time') }}" required autofocus>

                                @if ($errors->has('time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <label class="col-md-2 control-label pull-left"> 24/hr Format </label>

                        </div>           
    <!-- Mentor -->
                <div class="form-group{{ $errors->has('mentor_id') ? ' has-error' : '' }}">
                            <label for="mentor_id" class="col-md-3 control-label">Mentor</label>

                            <div class="col-md-6">
                                <!-- <input  type="number" class="form-control" name="mentor_id" value="{{ old('mentor_id') }}" required autofocus> -->

                                <select class="form-control" id="mentor_id" name="mentor_id" >
                                    <option class="form-control" disabled selected>Please Select A Mentor</option>
                                @foreach($mentors as $mentor)

                                    <option id="{{ $mentor->id }}" class="form-control" name="{{ $mentor->id }}" value="{{ $mentor->id }}" required autofocus>{{$mentor->firstname}} {{$mentor->surname}}</option>

                                @endforeach
                                </select>

  

                                @if ($errors->has('mentor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mentor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <!-- Total -->
                <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-3 control-label">Total</label>

                            <div class="col-md-6">
                                <input id="total" type="number" class="form-control" name="total" placeholder="Max Value for Class " value="{{ old('total') }}" required autofocus>

                                @if ($errors->has('total'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Add Class
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

