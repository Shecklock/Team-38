@include('header')

<div class="container">
    <h2>Confirm Your Order</h2>
    {{-- Display order details here --}}

    <div class="payment-options">
        <form action="{{ route('order.payNow', $order->OrderID) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>

        <form action="{{ route('order.payLater', $order->OrderID) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Pay Later</button>
        </form>
    </div>
</div>

@include('footer')
