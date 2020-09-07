@extends('layouts.admin')
@section('title','All Passenger')
@section('content')
 <section class="content-header">
                <h1>All Passengers<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Passenger Management</a></li>
                    <li class="active">All Passengers</li>
                </ol>
            </section>
            
            <!-- Main content -->
            
            <section class="content">
                
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font_13 m_b0">Travel Date</label>
                                            <input type="text" name="date" id="SelectDate" class="bod-picker form-control  border_radius0" autocomplete="off" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-success datesubmit">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font_13 m_b0">By Bus</label>
                                            <select class="form-control busData name="bus">
                                                @foreach($buses as $bus)
                                                <option value="{{$bus->id}}">{{$bus->bus_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-success searchbyBus">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            
                            
                            <!-- <div class="box-header">
                                <a href="add-destination.php" class="btn btn-success">Add New Passengers</a>
                            </div> -->
                            <div class="box-body appendData vendor-box">
                                <table id="example1" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>SN</th>
                                            <th> Name</th>
                                            <th>Bus</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Seat</th>
                                            <th>Destination</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    	@php($i=1)
                                    	@foreach($details as $detail)
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td> {{$detail->name}}<br>
                                                {{$detail->phone}}
                                            </td>
                                            <td>{{$detail->bus->bus_name}}<br>
                                                ({{$detail->bus->bus_number}})
                                            </td>
                                            <td>{{$detail->date}}</td>
                                            <td>{{$detail->time}}</td>
                                            <td>{{$detail->seat->seat_name}}</td>
                                            <td>from:{{$detail->from}}<br>
                                                @if($detail->sub_destination)
                                                    {{$detail->sub_destination}}
                                                @else
                                                    {{$detail->to}}
                                                @endif
                                            </td>
                                            <!-- <td> -->
                                                <!-- <a href="passenger-detail.php" class="btn btn-info"> <span class="fa fa-edit"></span> edit</a> -->
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div> -->
                                            <!-- </td> -->
                                        </tr>
                                        @php($i++)
                                        @endforeach
                                        
                                    </tbody>
                                </table> 
                            </div>  
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->

@endsection
@push('script')
  
<script >
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
       $('.delete').submit(function(e){
        e.preventDefault();
        var message=confirm('Are you sure to delete');
        if(message){
          this.submit();
        }
        return;
       });
    });
    
    $("#example1").DataTable({
        "pageLength": 100
    });
    $(".bod-picker").nepaliDatePicker({
        dateFormat: "%y-%m-%d",
        closeOnDateSelect: true,
        // minDate: formatedNepaliDate
    });
    $('.datesubmit').click(function(){
        if($('.bod-picker').val()==''){
            return;
        }else{
            date=$('.bod-picker').val();
            $.ajax({
                method:"post",
                url:"{{route('searchPassengerByDate')}}",
                data:{date:date},
                success:function(data){
                    if(data.message){
                        $('#example1_wrapper').remove();
                        $('.appendData').append(data.html);
                        $("#example1").DataTable({
                            "pageLength": 100
                        });
                    }
                }
            });
        }
        
    });
    $('.searchbyBus').on('click',function(){
        busId=$('.busData').val();
        $.ajax({
            method:"post",
            url:"{{route('searchPassengerByBus')}}",
            data:{bus_id:busId},
            success:function(data){
                if(data.message){
                    $('#example1_wrapper').remove();
                    $('.appendData').append(data.html);
                    $("#example1").DataTable({
                        "pageLength": 100
                    });
                }
            }
        });
    });
   

  </script>
@endpush