{{--@component('email::message')--}}
Hello {{$userName}},<br>
<h2>Thank you for your purchase!</h2><br>
<b>Order information:</b><br>
Order number: {{$orderId}}<br>
Total price: {{$totalPrice}}<br>
Delivery address: {{$address}}<br>
Additional information: {{$additionalInformation}}<br><br>
<b>Your Smart Store Inc.</b><br>
{{--@endcomponent--}}
