@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading"><strong>Dashboard</strong><a href="/home"><button type="button" class="btn btn-xs btn-success pull-right">Back to Home</button></a></div>

                <div class="panel-body"> 
                    
                        <div class="alert alert-success">
                            <strong>{{ session('details') }}</strong>
                        </div>


                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Account Details</strong></div>

                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-hover">

                <tbody>
                    <tr>
                        <td><strong>ID: </strong></td>
                        <td>{{$user['id']}}</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><strong>Full Name: </strong></td>
                        <td>{{$user['firstname']}} {{$user['surname']}}</td>
                        <td><a href="/home/editname"><button type="button" class="btn btn-xs btn-success pull-right">Update Name</button></a></td>
                    </tr>                

                    <tr>
                        <td><strong>Email: </strong></td>
                        <td>{{$user['email']}}</td>
                        <td><a href="/home/editemail"><button type="button" class="btn btn-xs btn-success pull-right">Update Email</button></a></td>
                    </tr>

                    <tr>
                        <td><strong>Password: </strong></td>
                        <td>************</td>
                        <td><a href="/home/editpassword"><button type="button" class="btn btn-xs btn-success pull-right">Update Password</button></a></td>

                    </tr>
                    </tbody>

                </table>
                </div>
                
                </div>

            </div>
        </div>
    </div>
</div>
@endsection