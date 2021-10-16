@extends('front.layouts.master')

@section('content')

<h2>Profile</h2>
<hr>

@if (session()->has('msg') )
    <div class="alert alert-success"> {{ session()->get('msg') }} </div> 
    @endif

<h3>User Details</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2">User Details <a href="{{ route('change.password') }}" class="pull-right"><i class="fa fa-cogs"></i> Change Password </a>
            <a href="{{ route('user.update') }}" class="pull-right" style="margin-right: 20px;"><i class="fa fa-cogs"></i> Change Name,Email </a></th>
        </tr>
    </thead>
    <tr>
        <th>ID</th>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $user->name}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Registered At</th>
        <td>{{ $user->created_at}}</td>
    </tr>
</table>


<h4 class="title">Orders</h4>
<hr>
<div class="content table-responsive table-full-width">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($user->orders as $order)
                <td>{{ $order->id }}</td>
                <td>
                    @foreach ($order->products as $item)
                    <table class="table">
                        <tr>
                            <td>{{ $item->name }}</td>
                        </tr>
                    </table>
                    @endforeach
                </td>

                <td>
                    @foreach ($order->orderItems as $item)
                    <table class="table">
                        <tr>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    </table>
                    @endforeach
                </td>

                <td>
                    @foreach ($order->orderItems as $item)
                    <table class="table">
                        <tr>
                            <td>${{ $item->price }}</td>
                        </tr>
                    </table>
                    @endforeach
                </td>

                <td>
                    @if ($order->status)
                    <span class="badge badge-success">Confirmed</span>
                    @else
                    <span class="badge badge-warning">Pending</span>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/user/order') . '/' . $order->id }}" class="btn btn-outline-dark btn-sm">Details</a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

</div>

@endsection