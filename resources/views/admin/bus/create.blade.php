@extends('layouts.admin')
@section('title','Add Bus')
@section('content')
<section class="content-header">
    <h1>Add Bus<small>EASYBUS</small></h1>
    <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Vendor</a></li>
        <li><a href="#">All Bus</a></li>
        <li class="active">Add Bus</li>
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
        @if (count($errors) > 0)
        <div class="alert alert-danger message">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form action="{{route('bus.store')}}" class="form form-horizontal form-responsive" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row equal_height">
            <div class="col-lg-12">
                <!-- Default box -->
                <div class="box height_manage">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add bus</h3>

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
                                            <input type="text" name="bus_number" id="bus_no" class="form-control"   placeholder="Example: BA 1 KH 1020"  value="{{old('bus_number')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus"></i>
                                            </div>
                                            <input type="text" name="bus_name" id="bus_name" class="form-control"   placeholder="Bus Name" value="{{old('bus_name')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <input type="number" id="seat_limit" name="seat_limit" class="form-control" placeholder="Seat Limit EX. 23" value="{{old('seat_limit')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" id="made_year" name="made_year" class="form-control" placeholder="Made Year" value="{{old('made_year')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-cogs"></i>
                                            </div>
                                            <input type="text" id="company" name="manufacturer" class="form-control" placeholder="Manufracturer" value="{{old('manufacturer')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- <i class="fa fa-users"></i> -->
                                                MODEL
                                            </div>
                                            <input type="text" id="model" name="model" class="form-control" placeholder="Model" value="{{old('model')}}">
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                
                                                COLOUR
                                            </div>
                                            <input type="text" id="color" name="color" class="form-control" placeholder="Colour" value="{{old('color')}}">
                                        </div>
                                    </div> -->

                                    
                                    
                                    <!-- <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-street-view"></i>
                                            </div>
                                            <input type="text" id="bus_route" name="bus_route" class="form-control" placeholder="Bus Route Ex. Kathmandu To Dharan" value="{{old('bus_route')}}">
                                        </div>
                                    </div> -->
                                    

                                    

                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <select class="form-control" name="assistant_1">
                                                <option value="">Select Driver</option>
                                                @foreach($driver as $drive)
                                                <option value="{{$drive->id}}">{{$drive->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="assistant_one_phone" id="driver_name" class="form-control" placeholder="Driver mobile no" value="{{old('assistant_one_phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <select class="form-control" name="assistant_2">
                                                <option value="">Select Conductor</option>
                                                @foreach($conductor as $assistant)
                                                <option value="{{$assistant->id}}">{{$assistant->name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" id="conductor_phone" name="assistant_two_phone" class="form-control" placeholder="Conductor Phone" value="{{old('conductor_phone')}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <label>Bus Image</label>
                                            
                                            <input type="file" accept="image*/" name="image_1" id="driver_name" class="form-control" placeholder="Upload Bus Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <label> image</label>
                                            
                                            <input type="file" accept="image*/" name="image_2" id="driver_name" class="form-control" placeholder="Upload Bus Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <label> image</label>
                                            
                                            <input type="file" accept="image*/" name="image_2" id="driver_name" class="form-control" placeholder="Upload Bus Image">
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                Price
                                            </div>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="price" value="{{old('price')}}">
                                        </div>
                                    </div> -->
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
                                            <input type="text" name="boarding_point" value="{{old('boarding_point')}}" class="form-control">
                                        </div>
                                    </div> -->
                                    
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                Facilities
                                            </div>
                                            <input type="text" name="facilities" class="form-control" placeholder="Ac,Water,Fooding" value="{{old('facilities')}}">
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
                                <div class="row">
                                    
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input id="new-column" type="number" class="form-control" placeholder="column" name="row" min="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input id="new-row" type="number" class="form-control" placeholder="row" name="column" min="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-btn">
                                            <button id="okey" type="button" class="btn btn-primary btn-flat">Add Layout</button>
                                        </div>
                                    </div>
                                </div>
                                
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

<script type="text/javascript">
    

</script>
<script>
    //preventing keyboard input in column field
    // $("#new-column").keypress(function (evt) {
    //     evt.preventDefault();
    // });
$(function () {
    $(".draggable").draggable(
            {
                start:
                    function (event, ui) {
                        id=$(this).data('id');
                        console.log(id);
                    }
            }
        );
    $( "#seat_method  tr td" ).droppable({
            accept: ".draggable",
            drop :function(event, ui) { 
                var seat_id = $(this).data('seat');
                
                // alert(seat_id); 
            } 
        });
    // $(function shortable(){
    //     $( "#seat_method tr td" ).sortable({
    //         revert: true,
    //         connectWith: "#seat_method tr td",
            
    //     }

    //     );

    //     $( "#external-events .external-event" ).draggable({
    //         connectToSortable: "#seat_method tr td",
    //         helper      : "clone",
    //         revert      : false,
    //         zIndex      : 1070,
    //         // drop: function(event, ui){
    //         //      var seat_id = $(this).data('seat');
    //         //      alert(seat_id);
    //         // }
    //     });
    //     $( "#seat_method  tr td" ).droppable({
    //         accept: ".external-event",
    //         drop :function(event, ui) { 
    //             var seat_id = $(this).data('seat');
    //             // alert(seat_id); 
    //         } 
    //     });
    // });

     
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

        // alert('hello');
        $("#seat_method tr").remove();
        var seat_html = $("#seat_method");
        var last_seat = $('#seat_method tr td').length;

        if (last_seat == 0) {
            var seat= 1;
        }
        
        if (last_seat!= 0) {
            var seat= last_seat+1;
        }
        seat_column = $("#new-column").val();
        seat_row = $("#new-row").val();
        for (var i = 0; i < seat_row; i++){
            var rows = $('<tr></tr>')
            for(var j =0; j<seat_column; j++){
                Add='<td  data-seat='+i+j+' id='+i+j+' class="seatRow">';
                Add+='<div class="external-event assestant_seat  ui-state-highlight ui-state-default bg-green draggable" data-id="0">';
                Add+='</div';
                Add+='</td>';
                Add+='</div>';
                if(i==0 && j==seat_column-1){
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