@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2 ">
        	    <div class="panel panel-default">
                <div class="panel-heading"><strong>All Users</strong></div>

                <div class="panel-body"> 
                    
		<div class="table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">ID</th>
                            <th style="text-align: center;">First Name </th>
                            <th style="text-align: center;">Surname</th>
                            <th style="text-align: center;">Email</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td style="text-align:center;">{{$user->id}}</td>
                            
                            <td style="text-align: center;">{{$user->firstname}} minutes</td>
                            <td style="text-align: center;">{{$user->surname}}</td>
                            <td style="text-align: center;">{{$user->email}}>                  
                            
                            </td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            </div>
                </div>

            </div>

        </div>
    </div>
</div>


@endSection