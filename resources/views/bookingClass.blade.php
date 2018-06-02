@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Dashboard</strong><a href="/home"><button type="button" class="btn btn-xs btn-success pull-right">Back to Home</button></a></div>

                <div class="panel-body"> 

                        <div class="alert alert-success">
                            <strong>Book a Class Below</strong>
                        </div>
                </div>

            </div>
<!-- Monday Classes -->
        <div class="panel-group">
            <div class="panel panel-default">
            <a data-toggle="collapse" href="#monday">
                <div class="panel-heading">
                    <p class="panel-title">Monday's Classes</p>
                </div>
            </a>

                <div id="monday" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align:center;">Duration </th>
                            <th style="text-align:center;">Available</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    
                      @foreach($mon as $info)
                       
                        <tr>
                            <td style="text-align:center;">{{$info['class']}}</td>
                            <td style="text-align:center;">{{$info['duration']}} Minutes</td>
                            <td style="text-align:center;">
                            
                            <!-- this if statement is a new classesController calling the total Method -->
                            @if($total->alreadybooked($info['id']) == 0 )

                            {{$total->total($info['id'])}}
                           
                            </td>

                            <td>
                            <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}">Book</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$info['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Book this Class?</h4>
                                    
                                      <div class="pull-right">
                                      
                                        <form class="form-horizontal" method="POST" action="booked" id="form{{$info['id']}}">

                                        {{csrf_field()}}

                                        <input id="class_id" type="hidden" class="form-control" name="class_id" value="{{$info['id']}}">
                              
                                        <button type="submit" class="btn btn-success " form="form{{$info['id']}}">
                                            Book Class
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                      
                                        </form>
                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div>
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$info['id']}}").click(function(){
                                    $("#myModal{{$info['id']}}").modal();
                                });
                            });
                            </script>

                            </td>
                            @else
                                {{$total->total($info['id'])}}
                                <td> <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}" disabled>Booked</button></td>

                            @endif
                        </tr>   
                    @endforeach


                    </tbody>
                </table>
                </div>
                </div>
                </div>
            </div>  
<!-- Tuesday Classes -->
        <div class="panel-group">
            <div class="panel panel-default">
            <a data-toggle="collapse" href="#tuesday">
                <div class="panel-heading">
                <p class="panel-title">
                Tuesday's Classes
                </p>

                </div>
                </a>
                <div id="tuesday" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align:center;">Duration </th>
                            <th style="text-align:center;">Available</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                      
                    @foreach($tue as $info)
                       
                        <tr>
                            <td style="text-align:center;">{{$info['class']}}</td>
                            <td style="text-align:center;">{{$info['duration']}} Minutes</td>
                            <td style="text-align:center;">
                            @if($total->alreadybooked($info['id']) == 1 )
                            {{$total->total($info['id'])}}
                            <td> <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}" disabled>Booked</button></td>
                            @else
                            {{$total->total($info['id'])}}
                           
                            </td>


                            <td>
                            <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}">Book</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$info['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Book this Class?</h4>
                                    
                                      <div class="pull-right">
                                      
                                        <form class="form-horizontal" method="POST" action="booked" id="form{{$info['id']}}">

                                        {{csrf_field()}}

                                        <input id="class_id" type="hidden" class="form-control" name="class_id" value="{{$info['id']}}">
                              
                                        <button type="submit" class="btn btn-success " form="form{{$info['id']}}">
                                            Book Class
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                      
                                        </form>
                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div>
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$info['id']}}").click(function(){
                                    $("#myModal{{$info['id']}}").modal();
                                });
                            });
                            </script>

                            </td>
                            @endif
                        </tr>   
                    @endforeach

                    </tbody>
                </table>
                </div>
                </div>
                </div>
            </div>  
<!-- Wednesday Classes -->
        <div class="panel-group">
            <div class="panel panel-default">
            <a data-toggle="collapse" href="#wedneday">
                <div class="panel-heading">
                <p class="panel-title">
                Wednesday's Classes
                </p>

                </div>
                </a>
                <div id="wedneday" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align:center;">Duration </th>
                            <th style="text-align:center;">Available</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                      
                    @foreach($wed as $info)
                       
                       <tr>
                            <td style="text-align:center;">{{$info['class']}}</td>
                            <td style="text-align:center;">{{$info['duration']}} Minutes</td>
                            <td style="text-align:center;">
                            @if($total->alreadybooked($info['id']) == 1 )
                            {{$total->total($info['id'])}}
                            <td> <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}" disabled>Booked</button></td>
                            @else
                            {{$total->total($info['id'])}}
                           
                            </td>


                            <td>
                            <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}">Book</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$info['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Book this Class?</h4>
                                    
                                      <div class="pull-right">
                                      
                                        <form class="form-horizontal" method="POST" action="booked" id="form{{$info['id']}}">

                                        {{csrf_field()}}

                                        <input id="class_id" type="hidden" class="form-control" name="class_id" value="{{$info['id']}}">
                              
                                        <button type="submit" class="btn btn-success " form="form{{$info['id']}}">
                                            Book Class
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                      
                                        </form>
                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div>
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$info['id']}}").click(function(){
                                    $("#myModal{{$info['id']}}").modal();
                                });
                            });
                            </script>

                            </td>
                            @endif
                        </tr>   
                    @endforeach

                    </tbody>
                </table>
                </div>
                </div>
                </div>
            </div>  
<!-- Thursday Classes -->
        <div class="panel-group">
            <div class="panel panel-default">
            <a data-toggle="collapse" href="#thursday">
                <div class="panel-heading">
                <p class="panel-title">
                Thursday's Classes
                </p>

                </div>
                </a>
                <div id="thursday" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align:center;">Duration </th>
                            <th style="text-align:center;">Available</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                      
                    @foreach($thu as $info)
                       
                        <tr>
                            <td style="text-align:center;">{{$info['class']}}</td>
                            <td style="text-align:center;">{{$info['duration']}} Minutes</td>
                            <td style="text-align:center;">
                            @if($total->alreadybooked($info['id']) == 1 )
                            {{$total->total($info['id'])}}
                            <td> <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}" disabled>Booked</button></td>
                            @else
                            {{$total->total($info['id'])}}
                           
                            </td>


                            <td>
                            <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}">Book</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$info['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Book this Class?</h4>
                                    
                                      <div class="pull-right">
                                      
                                        <form class="form-horizontal" method="POST" action="booked" id="form{{$info['id']}}">

                                        {{csrf_field()}}

                                        <input id="class_id" type="hidden" class="form-control" name="class_id" value="{{$info['id']}}">
                              
                                        <button type="submit" class="btn btn-success " form="form{{$info['id']}}">
                                            Book Class
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                      
                                        </form>
                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div>
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$info['id']}}").click(function(){
                                    $("#myModal{{$info['id']}}").modal();
                                });
                            });
                            </script>

                            </td>
                            @endif
                        </tr>   
                    @endforeach

                    </tbody>
                </table>
                </div>
                </div>
                </div>
            </div>  
<!-- Friday Classes -->
        <div class="panel-group">
            <div class="panel panel-default">
            <a data-toggle="collapse" href="#friday">
                <div class="panel-heading">
                <p class="panel-title">
                Friday's Classes
                </p>

                </div>
                </a>
                <div id="friday" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align:center;">Duration </th>
                            <th style="text-align:center;">Available</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                      
                    @foreach($fri as $info)
                       
                        <tr>
                            <td style="text-align:center;">{{$info['class']}}</td>
                            <td style="text-align:center;">{{$info['duration']}} Minutes</td>
                            <td style="text-align:center;">
                            @if($total->alreadybooked($info['id']) == 1 )
                            {{$total->total($info['id'])}}
                            <td> <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}" disabled>Booked</button></td>
                            @else
                            {{$total->total($info['id'])}}
                           
                            </td>


                            <td>
                            <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}">Book</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$info['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Book this Class?</h4>
                                    
                                      <div class="pull-right">
                                      
                                        <form class="form-horizontal" method="POST" action="booked" id="form{{$info['id']}}">

                                        {{csrf_field()}}

                                        <input id="class_id" type="hidden" class="form-control" name="class_id" value="{{$info['id']}}">
                              
                                        <button type="submit" class="btn btn-success " form="form{{$info['id']}}">
                                            Book Class
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                      
                                        </form>
                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div>
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$info['id']}}").click(function(){
                                    $("#myModal{{$info['id']}}").modal();
                                });
                            });
                            </script>

                            </td>
                            @endif
                        </tr>   
                    @endforeach

                    </tbody>
                </table>
                </div>
                </div>
                </div>
            </div>  
<!-- Saturday Classes -->
        <div class="panel-group">
            <div class="panel panel-default">
            <a data-toggle="collapse" href="#saturday">
                <div class="panel-heading">
                <p class="panel-title">
                Saturday's Classes
                </p>

                </div>
                </a>
                <div id="saturday" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align:center;">Duration </th>
                            <th style="text-align:center;">Available</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                      
                    @foreach($sat as $info)
                       
                        <tr>
                            <td style="text-align:center;">{{$info['class']}}</td>
                            <td style="text-align:center;">{{$info['duration']}} Minutes</td>
                            <td style="text-align:center;">
                            @if($total->alreadybooked($info['id']) == 1 )
                            {{$total->total($info['id'])}}
                            <td> <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}" disabled>Booked</button></td>
                            @else
                            {{$total->total($info['id'])}}
                           
                            </td>


                            <td>
                            <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}">Book</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$info['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Book this Class?</h4>
                                    
                                      <div class="pull-right">
                                      
                                        <form class="form-horizontal" method="POST" action="booked" id="form{{$info['id']}}">

                                        {{csrf_field()}}

                                        <input id="class_id" type="hidden" class="form-control" name="class_id" value="{{$info['id']}}">
                              
                                        <button type="submit" class="btn btn-success " form="form{{$info['id']}}">
                                            Book Class
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                      
                                        </form>
                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div>
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$info['id']}}").click(function(){
                                    $("#myModal{{$info['id']}}").modal();
                                });
                            });
                            </script>

                            </td>
                            @endif
                        </tr>   
                    @endforeach

                    </tbody>
                </table>
                </div>
                </div>
                </div>
            </div>  
<!-- Sunday Classes -->
        <div class="panel-group">
            <div class="panel panel-default">
            <a data-toggle="collapse" href="#Sunday">
                <div class="panel-heading">
                <p class="panel-title">
                Sunday's Classes
                </p>

                </div>
                </a>
                <div id="Sunday" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align:center;">Duration </th>
                            <th style="text-align:center;">Available</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                      
                    @foreach($sun as $info)
                       
                        <tr>
                            <td style="text-align:center;">{{$info['class']}}</td>
                            <td style="text-align:center;">{{$info['duration']}} Minutes</td>
                            <td style="text-align:center;">
                            @if($total->alreadybooked($info['id']) == 1 )
                            {{$total->total($info['id'])}}
                            <td> <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}" disabled>Booked</button></td>
                            @else
                            {{$total->total($info['id'])}}
                           
                            </td>


                            <td>
                            <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-info btn-xs pull-right" id="myBtn{{$info['id']}}">Book</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$info['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Book this Class?</h4>
                                    
                                      <div class="pull-right">
                                      
                                        <form class="form-horizontal" method="POST" action="booked" id="form{{$info['id']}}">

                                        {{csrf_field()}}

                                        <input id="class_id" type="hidden" class="form-control" name="class_id" value="{{$info['id']}}">
                              
                                        <button type="submit" class="btn btn-success " form="form{{$info['id']}}">
                                            Book Class
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No </button>&nbsp;
                                      
                                        </form>
                                                                            
                                      </div>

                                  </div>
                                  
                                </div>
                              </div>
                              </div>
                        
                            <script>
                            $(document).ready(function(){
                                $("#myBtn{{$info['id']}}").click(function(){
                                    $("#myModal{{$info['id']}}").modal();
                                });
                            });
                            </script>

                            </td>
                            @endif
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
</div>
@endsection