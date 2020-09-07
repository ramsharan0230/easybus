<table id="datatable" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead>
                                        <tr>

                                            <th>Booking No.:</th>
                                            <th>
                                                <span class="fa fa-user"></span> Passenger Name & No.
                                            </th>
                                            <th>
                                                <i class="fa fa-calendar"></i> Bus No.:
                                            </th>
                                            <th>
                                                <i class="fa fa-calendar"></i> Date:
                                            </th>
                                            <th> 
                                                <i class="fa fa-street-view"></i> Passenger Station
                                            </th>
                                            <th> 
                                                <i class="fa fa-user-circle"></i> Assestant 1
                                            </th>
                                            <th> 
                                                <i class="fa fa-user-circle"></i> Assestant 2
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    	@foreach($bookings as $booking)
                                        <tr >
                                            <td>{{$booking->book_no}}</td>
                                            <td>{{$booking->name}} <br> 
                                                <small>{{$booking->phone}}</small></td>
                                            <td>{{$booking->bus->bus_number}}</td>
                                            <td>{{$booking->date}}</td>
                                            <!-- <td> 2075-12-12 <br>
                                                <small>12:55:00 PM</small>
                                            </td> -->
                                            <td>
                                                From: {{$booking->pickup_station}} <br> To: {{$booking->drop_station}}
                                            </td>
                                           
                                            <td>
                                            	@if($booking->bus->driver)
                                                {{$booking->bus->driver->name}} <br>
                                                <small>{{$booking->bus->assistant_one_phone}}</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($booking->bus->conductor)
                                                {{$booking->bus->conductor->name}} <br>
                                                <small>{{$booking->bus->assistant_two_phone}}</small>
                                                @endif
                                            </td>
                                            
                                            <!-- <td>
                                                <a href="add-bus.php" class="btn btn-info"> <span class="fa fa-edit"></span> Edit</a>
                                                <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div>
                                            </td> -->
                                        </tr>
                                        @endforeach
                                       
                                        
                                        
                                    </tbody>
                                </table> 
