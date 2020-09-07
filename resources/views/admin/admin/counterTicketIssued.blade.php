@extends('layouts.admin')
@section('title','Ticket List')

@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Ticket Booking Detail<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <li class="active">Ticket Booking Detail</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
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
                                            <option value="{{$bus->bus->id}}">{{$bus->bus->bus_name}}</option>
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
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                               
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body vendor-box">
                                <table id="example1" class="table vendor-table table-striped">
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Booked By</th>
                                            <th>Bus</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Shift</th>
                                            <th>Booked On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($bookings as $report)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>
                                                {{$report->name}}<br>
                                                ({{$report->phone}})
                                            </td>
                                            <td>{{$report->bus->bus_name}}({{$report->bus->bus_number}})</td>
                                            <td>{{$report->from}}</td>
                                            <td>@if($report->sub_destination)
                                                {{$report->sub_destination}}
                                                @else
                                                {{$report->to}}
                                                @endif
                                            </td>
                                            <td>{{$report->price}}</td>
                                            <td>{{$report->date}}</td>
                                            <td>{{$report->shift}}</td>
                                            <td>{{$report->booked_on}}</td>

                                        </tr>
                                        @php($i++)
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    $(".bod-picker").nepaliDatePicker({
        dateFormat: "%y-%m-%d",
        closeOnDateSelect: true,
        // minDate: formatedNepaliDate
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
    $(function () {
    $("#example1").DataTable({
        "pageLength": 100
    });
  });

    $('.datesubmit').click(function(){
        if($('.bod-picker').val()==''){
            return;
        }else{
            date=$('.bod-picker').val();
            counter=0;
            online=0;
            $.ajax({
                method:"post",
                url:"{{route('searchPassengerByDate')}}",
                data:{date:date,counter:counter,online:online},
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
        counter=0;
        $.ajax({
            method:"post",
            url:"{{route('searchPassengerByBus')}}",
            data:{bus_id:busId,counter:counter},
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