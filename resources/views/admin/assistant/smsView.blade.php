@extends('layouts.admin')
@section('title','Add SMS Notice')
@section('content')
	<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add SMS Notice<small>EASYBUS</small></h1>
                <a href="{{route('changeDetail')}}" class="btn btn-warning">Back</a>
                <ol class="breadcrumb">

                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Routine</a></li>
                    <li class="active">Add SMS Routiness</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible message">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {!! Session::get('message') !!}
                    </div>
                    @endif
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
                                <form action="{{route('saveSmsAssistant')}}" method="post">
                                    {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$detail->id}}">
								<div class="form-group">
									<label>SMS Notice</label>
									<textarea name="sms" class="form-control" rows="3">{{$detail->sms}}</textarea>
								</div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="submit" class="btn btn-success">
                                    
                                </div>
                              	</form>
                                <a href="{{route('sendSmsAssistant',$detail->id)}}" class="btn btn-info">Send</a>
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
    

</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".bod-picker").val();   
		$(".bod-picker").nepaliDatePicker({
		    dateFormat: "%y-%m-%d",
		    closeOnDateSelect: true,
		    // minDate: formatedNepaliDate
		});
        $('.message').fadeOut(4000);
	});
</script>
@endpush