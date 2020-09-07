@extends('layouts.admin')
@section('title','Add Routine')
@section('content')
    <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add Routine<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Routine</a></li>
                    <li class="active">Add Routine</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <!-- Default box -->
                        <div class="box">

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
                            <div class="box-body ">
                                <form action="{{route('saveAssistantRoutine')}}" method="post">
                                    {{csrf_field()}}
                                <input type="hidden" name="bus_id" value="{{$id}}">
                               <div class="row equal_height form-group">
                                    
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus"> From</i>
                                            </div>
                                            <select class="form-control" name="from">
                                                <option value="">From</option>
                                                @foreach($destinations as $destination)
                                                <option value="{{$destination->name}}">{{$destination->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-map-marker"> To</i>
                                            </div>
                                            <select class="form-control" name="to">
                                                <option value="">To</option>
                                                @foreach($destinations as $destination)
                                                <option value="{{$destination->name}}">{{$destination->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                Price
                                            </div>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="price" value="{{old('price')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus">Boarding Point</i>
                                            </div>
                                            <input type="text" name="boarding_point" value="{{old('boarding_point')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- <i class="fa fa-servicestack"></i> -->
                                                Shift
                                            </div>
                                            <select name="shift" class="form-control"  id="service_type">
                                                <option value="">Select Service type</option>
                                                <option value="Day">Day</option>
                                                <option value="Night">Night</option>
                                            </select>
                                        </div>
                                    </div>
                                   <div class="col-lg-6 col-sm-6 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus"> Departure Time</i>
                                            </div>
                                            <input type="time" name="time" value="{{old('time')}}" class="form-control" id='datetimepicker3'>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 m_b20">
                                        <label class="font_13 m_b0">Travel Date</label>
                                        <input type="text" id="nepaliDate1" class="bod-picker form-control" name="date" autocomplete="off">
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <label>Notice</label>
                                            <textarea name="notice" rows="5" class="form-control">{{old('notice')}}</textarea>
                                        </div>
                                    </div>
                                     
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <div class="box-tools pull-right">
                                            <div class="input-group">
                                                
                                                <button type="submit" class="btn btn-success"> <span class="fa fa-plus"></span> Add Routine</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                              </form>
                                </div>
                            </div>  
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        
       

            
@endsection
@push('script')
<script src="//cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>

<script type="text/javascript">
    

    
    $(document).ready(function(){
        $(".bod-picker").val();
        $(".bod-picker").nepaliDatePicker({
            dateFormat: "%y-%m-%d",
            closeOnDateSelect: true,
            // minDate: formatedNepaliDate
        });
    });
</script>
@endpush