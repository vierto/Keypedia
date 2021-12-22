@extends('layout')
@section('container')

<table class="view-table" border="solid 1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Category Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>       
        @foreach($keyboard as $keyboard)
            <tr>
                <td>{{ $keyboard->id }}</td>
                <td>
                    <img width="400px" height="200px" src="{{ Storage::url($keyboard->keyboard_image) }}" alt="">
                </td>
                <td>{{ $keyboard->category_id }}</td>
                <td>{{ $keyboard->keyboard_name }}</td>
                <td>${{ $keyboard->keyboard_price }}</td>
                <td>{{ $keyboard->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    @if(Auth::id() == null || Auth::user()->role_id == 2)
    <form action="/addToCart/{{$keyboard->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table border="solid 1px">
            <tr>
                <td><label for="quantity">Quantity</label></td>
                <td><input type="number" name="quantity" id="quantity"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit">Add to Cart</button>
                </td>
            </tr>
        </table>
    </form>
    @endif

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