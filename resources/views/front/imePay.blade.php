<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>

<form action="https://stg.imepay.com.np:7979/WebCheckout/Checkout" method="post">
	<input type="hidden" name="TokenId" value="{{$token_response->TokenId}}">
	<input type="hidden" name="MerchantCode" value="{{$merch_code}}">
	<input type="hidden" name="RefId" value="{{$token_response->RefId}}">
	<input type="hidden" name="TranAmount" value="{{$token_response->Amount}}">
	<input type="hidden" name="Source" value="W">
	<input type="submit" name="submit" value="submit">
</form>

</body>
</html>