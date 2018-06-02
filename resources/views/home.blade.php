@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
<!-- Start Booked Classes Section -->

            
            <div class="panel panel-default ">
                <div class="panel-heading"><strong>Booked Classes</strong><a href="/home/bookclass"><button type="button" class="btn btn-xs btn-success pull-right">Book a Class</button></a> </div>
                <div class="panel-body">

                @if(count($booking) < 1)
                    <th>Book Your First Class</th>

                @elseif(count($booking) >= 1)
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr> 
                            <th style="text-align:center;">Class</th>
                            <th style="text-align: center;">Duration </th>
                            <th style="text-align: center;">Mentor</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($booking as $row)
                        <tr>
                            <td style="text-align:center;">{{$row->class['class']}}</td>
                            
                            <td style="text-align: center;">{{$row->class['duration']}} minutes</td>
                            <td style="text-align: center;">{{$row->class->mentor['firstname']}} {{$row->class->mentor['surname']}}</td>
                            <td>

                                  <button type="button" class="btn btn-danger btn-xs pull-right" id="myBtn{{$row['id']}}">Cancel</button>

                            <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$row['id']}}" role="dialog">
                                    <div class="modal-dialog">
                                
                            <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      
                                      <h4 class="modal-title">Are You Sure You Want to Cancel Your Booking?</h4>
                                    
                                      <div class="pull-right">
                                      
                                            <form class="form-horizontal" method="POST" action="home/delete" id="{{$row['id']}}">
                                            {{csrf_field()}}
                                            <input id="booking_id" type="hidden" class="form-control" name="booking_id" value="{{$row['id']}}" readonly>
                                  
                                            <button type="submit" class="btn btn-success" form="{{$row['id']}}">
                                                Cancel Booking
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
                                $("#myBtn{{$row['id']}}").click(function(){
                                    $("#myModal{{$row['id']}}").modal();
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
                        {{$booking->links()}}
                    </div>
                </div>
            </div>  
            

<!-- End Booked Classes Section -->

        </div>
    </div>
</div>
@endsection
