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
                    <a href="#" class="btn btn-success">All Bus</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('bus.store')}}" class="form form-horizontal form-responsive" method="post" >
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
                        <div class="row equal_height form-group">
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="bus_number" id="bus_no" class="form-control"   placeholder="Example: BA 1 KH 1020">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bus"></i>
                                    </div>
                                    <input type="text" name="bus_name" id="bus_name" class="form-control"   placeholder="Bus Name">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <input type="text" id="seat_limit" name="seat_limit" class="form-control" placeholder="Seat Limit EX. 23">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="made_year" name="made_year" class="form-control" placeholder="Made Year">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-cogs"></i>
                                    </div>
                                    <input type="text" id="company" name="manufacturer" class="form-control" placeholder="Manufracturer">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <!-- <i class="fa fa-users"></i> -->
                                        MODEL
                                    </div>
                                    <input type="text" id="model" name="model" class="form-control" placeholder="Model">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <!-- <i class="fas fa-palette"></i> -->
                                        COLOUR
                                    </div>
                                    <input type="text" id="color" name="color" class="form-control" placeholder="Colour">
                                </div>
                            </div>

                            
                            
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-street-view"></i>
                                    </div>
                                    <input type="text" id="bus_route" name="bus_route" class="form-control" placeholder="Bus Route Ex. Kathmandu To Dharan">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <!-- <i class="fa fa-servicestack"></i> -->
                                        Shift
                                    </div>
                                    <select name="service_type" class="form-control"  id="service_type">
                                        <option value="">Select Service type</option>
                                        <option value="Day">Day</option>
                                        <option value="Night">Night</option>
                                    </select>
                                </div>
                            </div>

                            

                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" name="driver_name" id="driver_name" class="form-control" placeholder="Assestant Name 1">
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="driver_phone" id="driver_name" class="form-control" placeholder="Assestan 1 Phone" value="984578475">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="conducter_name" name="conducter_name" class="form-control" placeholder="Assestant Name 2">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="conductor_phone" name="conductor_phone" class="form-control" placeholder="Assestant 2 Phone" value="984578457">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12 m_b20">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bus"></i>
                                    </div>
                                    <input type="file" multiple="" accept="image*/" name="driver_name" id="driver_name" class="form-control" placeholder="Upload Bus Image">
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
                                            <input id="new-row" type="text" class="form-control" placeholder="row" name="row">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input id="new-column" type="text" class="form-control" placeholder="column" name="column">
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

                                        <div class="col-lg-3">
                                            <div class="external-event assestant_seat  ui-state-highlight ui-state-default bg-green draggable" data-id="0"></div> 
                                        </div>
                                        <div class="col-lg-3">
                                            <!-- <div class="external-event  ui-state-highlight ui-state-default bg-yellow"><span class="fa fa-user-circle "></span></div><span>Conductor</span> -->
                                            <div class="external-event common_seat ui-state-highlight  ui-state-default bg-lime draggable " data-id="1"></div>
                                        </div>
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
<script>
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
            $(document).on('dblclick','.seatRow',function(){
                id=$(this).data('seat');
                if($('#commonseat_'+id).length>0){
                    return;
                }else{
                    // Add1='<div class="external-event common_seat ui-state-highlight  ui-state-default bg-lime  " data-id="1" id="commonseat_'+id+'">';
                    //     Add1+='<input type="hidden" name="row_col[]" value="'+id+'">';
                Add1='<div class="redclass">lakdjf alsdkfj</div>';
                Add1+='<input type="text" name="seat_name[]" id="" class="form-control dropzone" value="">';
                // Add1+='</div>';
                $('#'+id).html(Add1);
                }
                
                
                
            });
        });
        $(document).ready(function(){
            $(document).on('dblclick','.seatRow',function(){
                id=$(this).data('seat');
                if($('#commonseat_'+id).length>0){
                    $('#commonseat_'+id).remove();
                }
            });
        });

    
    

   

    

    
  
       


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