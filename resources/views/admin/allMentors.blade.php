@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2 ">
<div class="panel panel-default">
                <div class="panel-heading"><strong>Dashboard</strong><a href="/admin"><button type="button" class="btn btn-xs btn-success pull-right">Back to Home</button></a></div>

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

        	    <div class="panel panel-default">
                <div class="panel-heading"><strong>All Mentors</strong>
                    <div class="pull-right search-container">
                        <form method="post" action="/admin/searchmentor">
                            {{ csrf_field() }}
                          <input type="text" placeholder="Search.." name="search" required>
                          <button type="submit">Submit</button>
                        </form>
                      </div>
                </div>
                
 @if(count($mentors) < 1)
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">

                    <tbody>
                        <tr>
                            <td style="text-align:center;">Sorry We Could Not find What You Were Looking For</td>

                            
                        </tr>  

                     @else    
                <div class="panel-body"> 
                    
		<div class="table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">ID</th>
                            <th style="text-align: center;">First Name </th>
                            <th style="text-align: center;">Surname</th>
                            <th style="text-align:right;">Edit</th>
                            <th style="text-align: right;">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($mentors as $mentor)
                        <tr>
                            <td style="text-align:center;">{{$mentor->id}}</td>
                            
                            <td style="text-align: center;">{{$mentor->firstname}}</td>
                            <td style="text-align: center;">{{$mentor->surname}}</td>                
                            <td style="text-align:center;">
                                <form class="form-horizontal" method="POST" action="editmentor" id="edit{{$mentor->id}}">
                                    {{csrf_field()}}
                                    <input id="mentor_id" type="hidden" class="form-control" name="mentor_id" value="{{$mentor->id}}" readonly>
                                    <button  type="submit" class="btn btn-success btn-xs pull-right">  Edit
                                    </button>
                                </form>
                            </td>
                            <td>     
                                <button  type="button" class="btn btn-danger btn-xs pull-right" id="myBtn{{$mentor->id}}">Delete</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$mentor->id}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Delete This Mentor?</h4>
                                    
                                      <div class="pull-right">
                                      
                                            <form class="form-horizontal" method="POST" action="deletementor" id="{{$mentor->id}}">
                                            {{csrf_field()}}
                                            <input id="mentor_id" type="hidden" class="form-control" name="mentor_id" value="{{$mentor->id}}" readonly>
                                  
                                            <button type="submit" class="btn btn-success" form="{{$mentor->id}}">
                                                Yes
                                            </button>
                                            
                                            <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                            </form>

                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div><!--end of modal-->
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$mentor->id}}").click(function(){
                                    $("#myModal{{$mentor->id}}").modal();
                                });
                            });
                            </script>
                            
                            </td>
                        </tr>


                    @endforeach

@endif


                    </tbody>
                </table>
            </div>
                    <div class="text-center">
                        {{$mentors->links()}}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


@endSection