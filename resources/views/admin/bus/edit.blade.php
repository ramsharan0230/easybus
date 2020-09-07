@extends('layouts.admin')
@section('title','Edit Bus')
@section('content')
<section class="content-header">
    <h1>Edit Bus<small>EASYBUS</small></h1>
    <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Vendor</a></li>
        <li><a href="#">All Bus</a></li>
        <li class="active">Edit Bus</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row equal_height">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <a href="{{route('bus.index')}}" class="btn btn-success">All Bus</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('bus.update',$detail->id)}}" class="form form-horizontal form-responsive" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="row equal_height">
            <div class="col-lg-12">
                <!-- Default box -->
                <div class="box height_manage">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit bus</h3>

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row equal_height form-group">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h2 class="font_20 font_weight600">Bus Information</h2>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="bus_number" id="bus_no" class="form-control"   placeholder="Example: BA 1 KH 1020"  value="{{$detail->bus_number}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus"></i>
                                            </div>
                                            <input type="text" name="bus_name" id="bus_name" class="form-control"   placeholder="Bus Name" value="{{$detail->bus_name}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <input type="text" id="seat_limit" name="seat_limit" class="form-control" placeholder="Seat Limit EX. 23" value="{{$detail->seat_limit}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" id="made_year" name="made_year" class="form-control" placeholder="Made Year" value="{{$detail->made_year}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-cogs"></i>
                                            </div>
                                            <input type="text" id="company" name="manufacturer" class="form-control" placeholder="Manufracturer" value="{{$detail->manufacturer}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- <i class="fa fa-users"></i> -->
                                                MODEL
                                            </div>
                                            <input type="text" id="model" name="model" class="form-control" placeholder="Model" value="{{$detail->model}}">
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                
                                                COLOUR
                                            </div>
                                            <input type="text" id="color" name="color" class="form-control" placeholder="Colour" value="{{$detail->color}}">
                                        </div>
                                    </div> -->

                                    
                                    
                                    <!-- <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-street-view"></i>
                                            </div>
                                            <input type="text" id="bus_route" name="bus_route" class="form-control" placeholder="Bus Route Ex. Kathmandu To Dharan" value="{{$detail->bus_route}}">
                                        </div>
                                    </div> -->
                                    

                                    

                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <select class="form-control" name="assistant_1">
                                                <option value="">Select Driver</option>
                                                @foreach($driver as $assistant)
                                                <option value="{{$assistant->id}}" {{$assistant->id==$detail->assistant_1?'selected':''}}>{{$assistant->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="assistant_one_phone" id="driver_name" class="form-control" placeholder="Driver mobile no" value="{{$detail->assistant_one_phone}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <select class="form-control" name="assistant_2">
                                                <option value="">Select Conductor</option>
                                                @foreach($conductor as $assistant2)
                                                <option value="{{$assistant2->id}}" {{$assistant2->id==$detail->assistant_2?'selected':''}}>{{$assistant2->name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" id="conductor_phone" name="assistant_two_phone" class="form-control" placeholder="Conductor Phone" value="{{$detail->conductor_phone}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <label>Bus Image</label>
                                            
                                            <input type="file" accept="image*/" name="image_1" id="driver_name" class="form-control" placeholder="Upload Bus Image">
                                        </div>
                                        @if($detail->image_1)
                                            <div class="form-group">
                                              <strong>Thumbnail Image</strong>
                                              <br>
                                              <img src="{{ asset('images/listing/'.$detail->image_1) }}" />
                                            </div>
                                           @endif
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <label>Image</label>
                                            <input type="file" accept="image*/" name="image_2" id="driver_name" class="form-control" placeholder="Upload Bus Image">
                                        </div>
                                        @if($detail->image_2)
                                       <div class="form-group">
                                          <strong>Thumbnail Image</strong>
                                          <br>
                                          <img src="{{ asset('images/listing/'.$detail->image_2) }}" />
                                       </div>
                                       @endif
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <label>Image</label>
                                            <input type="file" accept="image*/" name="image_3" id="driver_name" class="form-control" placeholder="Upload Bus Image">
                                        </div>
                                        @if($detail->image_3)
                                       <div class="form-group">
                                          <strong>Thumbnail Image</strong>
                                          <br>
                                          <img src="{{ asset('images/listing/'.$detail->image_3) }}" />
                                       </div>
                                       @endif
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                Price
                                            </div>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="price" value="{{$detail->price}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus"> Category</i>
                                            </div>
                                            <select name="bus_category" class="form-control">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus">Boarding Point</i>
                                            </div>
                                            <input type="text" name="boarding_point" value="{{$detail->boarding_point}}" class="form-control">
                                        </div>
                                    </div> -->
                                    
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                Facilities
                                            </div>
                                            <input type="text" name="facilities" class="form-control" placeholder="Ac,Water,Fooding" value="{{$detail->facilities}}">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-lg-12">
                <!-- Default box -->
                <div class="box height_manage">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bus Layout</h3>
                        <!-- <div class="box-tools pull-right"> 
                        </div> -->
                    </div>
                    <div class="row equal_height">
                        <div class="col-lg-4">
                            <div class="box-body">
                                <!-- <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input id="new-row" type="text" class="form-control" placeholder="row" name="row" value="{{$detail->row}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input id="new-column" type="text" class="form-control" placeholder="column" name="column" value="{{$detail->column}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-btn">
                                            <button id="okey" type="button" class="btn btn-primary btn-flat">Add Layout</button>
                                        </div>
                                    </div>
                                </div> -->
                                
                            </div>
                        </div>
                        <!-- <div class="col-lg-2">
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input id="new-seat" type="text" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <divc class="col-lg-6">
                                    <div class="input-group-btn">
                                        <button id="add-seat" type="button" class="btn btn-primary btn-flat">Add New Seat</button>
                                    </div>
                                </divc>
                            </div>
                        </div> -->

                        <div class="col-lg-4">

                            <div class="box-body">
                                <div id="external-events">
                                    <div class="row">

                                       <!--  <div class="col-lg-3">
                                            <div class="external-event assestant_seat  ui-state-highlight ui-state-default bg-green draggable" data-id="0"></div> 
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="external-event  ui-state-highlight ui-state-default bg-yellow"><span class="fa fa-user-circle "></span></div><span>Conductor</span>
                                            <div class="external-event common_seat ui-state-highlight  ui-state-default bg-lime draggable " data-id="1"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="box-body">
                                <table class="table table-responsive table-bordered " width="auto" id="bus_layout_view">
                                    <tbody id="seat_method">
                                        @for($i=0;$i<$detail->column;$i++)
                                        <tr>
                                            @for($j=0;$j<$detail->row;$j++)
                                            @php
                                                $rowcol=$i.$j;
                                                $busseat=$detail->busseat()->where('row_col',$rowcol)->get();
                                                
                                            @endphp
                                            <td data-seat="" id="" class="seatRow">
                                                @if($i==0 && $j==$detail->row-1)
                                                <div class="external-event assestant_seat  ui-state-highlight ui-state-default bg-green draggable" data-id="0"></div>
                                                @else
                                                    
                                                    @if(count($busseat)>0)
                                                        <input type="hidden" name="row_col[]" value="{{$rowcol}}" id="rowcol_{{$rowcol}}">
                                                        <div class=" common_seat bg-lime" id="commonseat_{{$rowcol}}"></div>
                                                        <input type="text" name="seat_name[]" id="seatname_{{$rowcol}}" class="form-control dropzone" value="{{$busseat[0]['seat_name']}}" data-id="{{$busseat[0]['id']}}">
                                                    @else
                                                    
                                                    @endif
                                                @endif
                                            </td>
                                            @endfor
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     
 

 
                    
                </div> 
            </div>
            <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                <div class="box-tools pull-right">
                    <div class="input-group">
                        <button type="reset" class="btn btn-info"> <span class="fa fa-trash"></span> Cancel</button>
                        
                        <button type="submit" class="btn btn-success" > <span class="fa fa-send"></span> submit</button>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
</section>
<!-- /.content -->      
@endsection
@push('script')
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(function () {
    
     
        $("#new-row").keyup(function(){
            seat_row = $("#new-row").val();
            return seat_row;
        })
        $("#new-column").keyup(function(){
            seat_column = $("#new-column").val();
            return seat_column;
        })

    $("#okey").click(function(e){
        e.preventDefault();
        var seat_html = $("#seat_method");
        var last_seat = $('#seat_method tr td').length;

        if (last_seat == 0) {
            var seat= 1;
        }
        
        if (last_seat!= 0) {
            var seat= last_seat+1;
        }

        for (var i = 0; i < seat_row; i++){
            var rows = $('<tr></tr>')
            for(var j =0; j<seat_column; j++){
                Add='<td  data-seat='+i+j+' id='+i+j+' class="seatRow">';
                Add+='<div class="external-event assestant_seat  ui-state-highlight ui-state-default bg-green draggable" data-id="0">';
                Add+='</div';
                Add+='</td>';
                Add+='</div>';
                if(i==0 && j==0){
                    rows.append(Add);
                }else{
                    Add='<td  data-seat='+i+j+' id='+i+j+' class="seatRow">';
                    
                    Add+='</td>';
                    Add+='</div>';
                    rows.append(Add);
                }
                

                seat++;
            }
            seat_html.append(rows);
        }
    })


    $('#add-seat').click(function (e) {
            e.preventDefault()
            //Get value and make sure it is not null
            var val = $('#new-seat').val()
            if (val.length == 0) {
                return
            }
            var event = $('<div />')
            event.css({
                'background-color': 'red',
                'background-image' :'url("./images/seat.png")',
                'border-color'    : 'blue',
                'color'           : '#fff',
                'width'           : 40
            }).addClass('external-event')
            event.html(val);
            $('#external-events').append(event);
            $('#new-seat').val('');
        })
        // var seat_row = 5;
        // var seat_column = 7;

        // // e.preventDefault();
        // var seat_html = $("#seat_method");
        // for (var i = 1; i <= seat_row; i++){
        //     var rows = $('<tr></tr>')
        //     for(var j =1; j<=seat_column; j++){
        //         rows.append('<td class="ui-sortable ui-droppable" data-seat='+"seat"+i+j+'></td>');

        //     }
        //     seat_html.append(rows);
        // }
        $(document).ready(function(){
            $('.dropzone').on('keyup',function(e){
                e.preventDefault();
                value=$(this).val();
                id=$(this).data('id');
                    $.ajax({
                    url: "{{route('changeSeatName')}}",
                    method: 'post',
                    async: true,
                    data: { value: value, id: id },
                    success: function(data) {
                        console.log(data);
                        // $('#myModal .modal-body').html(data);
                        // $('#myModal').modal('show');
                    }
                });
            });
        });
    
        $(document).ready(function(){
            $(document).on('dblclick','.seatRow',function(){
                id=$(this).data('seat');
                
                if($('#commonseat_'+id).length>0){
                    $('#commonseat_'+id).remove();
                    $('#seatname_'+id).remove();
                    $('#rowcol_'+id).remove();
                }else{
                    // Add1='<div class="external-event common_seat " data-id="1" id="commonseat_'+id+'">';
                Add1='<input type="hidden" name="row_col[]" value="'+id+'" id="rowcol_'+id+'">';
                Add1+='<div class=" common_seat bg-lime" id="commonseat_'+id+'"></div>';
                Add1+='<input type="text" name="seat_name[]" id="seatname_'+id+'" class="form-control dropzone" value="">';
                // Add1+='</div>';
                $('#'+id).html(Add1);
                }
                
                
                
            });
        });
        // $(document).ready(function(){
        //     $(document).on('dblclick','.seatRow',function(){
        //         id=$(this).data('seat');
        //         if($('#commonseat_'+id).length>0){
        //             $('#commonseat_'+id).remove();
        //         }
        //     });
        // });

    
    

   

    

    
  
       


    // init_events($('#external-events div.external-event'))
    //     var currColor = '#3c8dbc' //Red by default
    //     //Color chooser button
    //     var colorChooser = $('#color-chooser-btn')
    //     $('#color-chooser > li > a').click(function (e) {
    //         e.preventDefault()
    //         //Save color
    //         currColor = $(this).css('color')
    //         //Add color effect to button
    //         $('#add-new-row').css({ 'background-color': currColor, 'border-color': currColor })
    //     })
    //     $('#add-new-row').click(function (e) {
    //         e.preventDefault()
    //         //Get value and make sure it is not null
    //         var val = $('#new-row').val()
    //         if (val.length == 0) {
    //             return
    //         }
    //         var event = $('<div />')
    //         event.css({
    //             'background-color': currColor,
    //             'border-color'    : currColor,
    //             'color'           : '#fff',
    //             'width'           : 40
    //         }).addClass('external-event')
    //         event.html(val)
    //         $('#external-events').append(event);

    //         //Add draggable funtionality
           

    //         //Remove event from text input
    //         $('#new-row').val('');
    //     })






    })
</script>
@endpush