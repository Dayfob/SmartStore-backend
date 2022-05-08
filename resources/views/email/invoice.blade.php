{{--@component('email::message')--}}
    <h2>Hello {{$userName}},</h2><br>
    <p>Thank you for your purchase!</p><br>
    <p>Order information!</p><br>

        Order number: {{$orderId}}<br>
        Total price: {{$totalPrice}}<br>
        Delivery address: {{$address}}<br>
        Additional information: {{$additionalInformation}}<br>
    Your Smart Store Inc.<br>
{{--@endcomponent--}}
