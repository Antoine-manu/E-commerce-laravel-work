@include('components.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Order History</h1>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('components.footer')