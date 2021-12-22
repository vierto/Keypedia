@extends('layout')
@section('container')

<table class="view-table" border="solid 1px">
    <thead>
        <tr>
            <th>Cart ID</th>
            <th>User ID</th>
            <th>Keyboard Id</th>
            <th>Keyboard Name</th>
            <th>Keyboard Image</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carts as $cart)    
            <tr>
                <td>{{ $cart->id }}</td>
                <td>{{ $cart->user_id }}</td>
                <td>{{ $cart->keyboard_id }}</td>
                <td>{{ $cart->keyboard_name }}</td>
                <td>
                    <img width="400px" height="200px" src="{{ Storage::url($cart->keyboard_image) }}" alt="">
                </td>
                <td>{{ $cart->quantity }}</td>
                <td><label for="quantity">Quantity</label></td>

                <form action="/myCart/{{$cart->keyboard_id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <td><input type="number" name="quantity" id="quantity"></td>
                    <td><button type="submit">Update</button></td>
                </form>
            </tr>
        @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Subtotal : </td>
                <td>${{ $carts->sum('subtotal') }}</td>
                <td></td>
            </tr>
    </tbody>
</table>

    <a href="/checkout">
        <button>Checkout</button>
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection