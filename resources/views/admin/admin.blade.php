@extends('layouts.admin')

@section('content')

   <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2 ">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Dashboard</strong></div>
                <div class="panel-body"> 
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            <strong>{{ session('status') }}</strong>
                        </div>
                    @elseif(session('login'))
                        <div class="alert alert-success">
                            <strong> Welcome {{ Auth::user()->firstname}} {{Auth::user()->surname }}
                            {{ session('login') }}</strong>
                        </div>

                    @else
                        <div class="alert alert-success">
                            <strong> 
                            What Would You Like to Do Next {{ Auth::user()->firstname}} {{Auth::user()->surname }}?
                            </strong>
                        </div>
                    @endif

                </div>

            </div>

</div>
</div>
</div>

@endSection


