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
                <form action="/deleteCategory/{{$category->id}}" method="POST">
                    @csrf
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
                                    <button type="submit">Update</button>
                                    <button type="submit">Delete</button>
                                </td>
                            @endif
                        @endauth
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>

    @auth
    @if(Auth::user()->role_id == 1)
    <div class="row">
        <h3>Update Category</h3>
        <form action="/updateCategory" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="category_id">Category ID</label></td>
                    <td><input type="number" name="category_id" id="category_id" placeholder="1"></td> 
                </tr>
                <tr>
                    <td><label for="category_name">Category Name</label></td>
                    <td><input type="text" name="category_name" id="category_name" placeholder="Mechanical"></td> 
                </tr>
                <tr>
                    <td><label for="category_image">Category Image</label></td>
                    <td><input type="file" name="category_image" id="category_image"></td> 
                </tr>
            </table>
            <button type="submit">Update Category</button>
        </form>
    </div>
    @endif
    @endauth
</div>

@endsection