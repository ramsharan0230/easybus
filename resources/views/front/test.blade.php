@extends('layouts.front')
@section('content')
<form action="{{route('khaltiTesting')}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="public_key" value="test_public_key_fdab9e1a4a6a4cf3a0fb18ac9ec1abec">
	<input type="hidden" name="mobile" value="9841749906">
	<input type="hidden" name="product_identity" value="asdfasdf">
	<input type="hidden" name="product_name" value="new product">
	<input type="hidden" name="amount" value="200000">
	<input type="submit" name="">
</form>
@endsection


