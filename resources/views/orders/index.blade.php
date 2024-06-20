
@include('components.header')
    <div class="container mt-5">
        <h1 class="mb-4">Vos commandes</h1>
        @foreach ($orders as $order)
            <div class="card mb-3">
                <div class="card-header">
                    <h2 class="h5">Order #{{ $order->id }} - {{ $order->created_at }}</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@include('components.footer')