@extends('layout')
@section('container')

<div class="addKeyboard">
    <a href="/addKeyboard">
        <button type="submit">Add Keyboard</button>
    </a>
</div>

<div class="row">
    <h3>View Categories</h3>
    <table class="view-table" border="solid 1px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                @auth
                    @if (Auth::user()->role_id == 1)
                        <th>Action</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id}}</td>
                        <td>
                            <a href="/category/{{$category->category_name}}">
                                <img width="400px" height="200px" src="{{ Storage::url($category->category_image) }}" alt="">
                            </a>
                        </td>
                        <td>{{ $category->category_name }}</td>
                        @auth                        
                            @if(Auth::user()->role_id == 1)
                                <td>
                                    <a href="/updateCategory/{{$category->id}}">
                                        <button>Update</button>
                                    </a>
                                    <form action="/deleteCategory/{{$category->id}}" method="POST">
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            @endif
                        @endauth
                    </tr>
            @endforeach
        </tbody>
    </table>

@endsection