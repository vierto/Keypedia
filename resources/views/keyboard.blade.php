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
                                <a href="/updateKeyboard/{{$keyboard->id}}">
                                    <button>Update</button>
                                </a>
                                <form action="/deleteKeyboard/{{$keyboard->id}}" method="POST">
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                            @else
                            <td></td>
                            @endif
                            @endauth
                            @if(Auth::id() == null)
                            <td></td>
                            @endif
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="m-5 d-flex justify-content-center">
        {{$keyboards->withQueryString()->links()}}
    </div>

@endsection