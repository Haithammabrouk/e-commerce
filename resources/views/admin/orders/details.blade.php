@extends('admin.layouts.master')

@section('page')
    Order Details
@endsection


@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Order Details</h4>
                    <p class="category">Order details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $orders->id }}</td>
                                <td>{{ $orders->date }}</td>
                                <td>{{ $orders->address }}</td>
                                <td>
                                    @if ($orders->status)
                                        <span class="label label-success">Confirmed</span>
                                    @else
                                        <span class="label label-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($orders->status)
                                    {{ link_to_route('order.pending','Pending', $orders->id, ['class'=>'btn btn-warning btn-sm']) }}
                                @else
                                    {{ link_to_route('order.confirm','Confirm', $orders->id, ['class'=>'btn btn-success btn-sm']) }}
                                @endif  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">User Details</h4>
                    <p class="category">User Details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <td>{{ $orders->user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $orders->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $orders->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Registered At</th>
                            <td>{{ $orders->user->created_at->diffForHumans() }}</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Details</h4>
                    <p class="category">Product Details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>{{ $orders->id }}</td>
                            <td>
                                @foreach ($orders->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($orders->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($orders->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->quantity }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($orders->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td><img src="{{ url('uploads') . '/' . $product->image }}" alt="" style="width: 2em"></td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/admin/orders') }}" class="btn btn-success">Back to Orders</a>
    
@endsection