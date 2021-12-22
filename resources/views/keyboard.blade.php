@extends('layout')
@section('container')

    <div class="search">
        Search by Name
        <form action="/category/{{ $category_name }}/name" method="GET">
            <input type="text" id="search" name="search">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="search">
        Search by Price
        <form action="/category/{{ $category_name }}/price" method="GET">
            <input type="text" id="search" name="search">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="row">
        <h1>{{$category_name}}</h1>
        <table class="view-table" border="solid 1px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Category Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keyboards as $keyboard)
                    <form action="/deleteKeyboard/{{$keyboard->id}}" method="POST">
                        @csrf
                        <tr>
                            <td>{{ $keyboard->id }}</td>
                            <td>
                                <a href="/category/{{ $category_name }}/keyboard/{{$keyboard->keyboard_name}}">
                                    <img width="400px" height="200px" src="{{ Storage::url($keyboard->keyboard_image) }}" alt="">
                                </a>
                            </td>
                            <td>{{ $keyboard->category_id }}</td>
                            <td>{{ $keyboard->keyboard_name }}</td>
                            <td>${{ $keyboard->keyboard_price }}</td>
                            <td>{{ $keyboard->description }}</td>
                            @auth
                            @if(Auth::user()->role_id == 1)
                            <td>
                                <button type="submit">Delete</button>
                            </td>
                            @else
                            <td></td>
                            @endif
                            @endauth
                            @if(Auth::id() == null)
                            <td></td>
                            @endif
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>

    @auth
    @if(Auth::user()->role_id == 1)
    <div class="row">
        <h3>Update Keyboard</h3>
        <form action="/updateKeyboard" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="keyboard_id">Keyboard ID</label></td>
                    <td><input type="number" name="keyboard_id" id="keyboard_id" placeholder="1"></td> 
                </tr>
                <tr>
                    <td><label for="category_id">Category ID</label></td>
                    <td><input type="number" name="category_id" id="category_id" placeholder="1"></td> 
                </tr>
                <tr>
                    <td><label for="keyboard_name">Name</label></td>
                    <td><input type="text" name="keyboard_name" id="keyboard_name" placeholder="Mechanical 1000"></td>
                </tr>
                <tr>
                    <td><label for="keyboard_price">Price</label></td>
                    <td><input type="number" name="keyboard_price" id="keyboard_price" placeholder="100000"></td>
                </tr>
                <tr>
                    <td><label for="description">Description</label></td>
                    <td><input type="text" name="description" id="description" placeholder="Keyboard's Description"></td>
                </tr>
                <tr>
                    <td><label for="keyboard_image">Image</label></td>
                    <td><input type="file" name="keyboard_image" id="keyboard_image"></td>
                </tr>
            </table>
            <button type="submit">Update Keyboard</button>
        </form>
    </div>
    @endif
    @endauth

    <div class="m-5 d-flex justify-content-center">
        {{$keyboards->withQueryString()->links()}}
    </div>

@endsection