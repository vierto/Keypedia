@extends('layout')
@section('container')

    @auth
    @if(Auth::user()->role_id == 1)
    <div class="row">
        <h3>Update Category</h3>
        <form action="/updateCategoryValidation/{{$category_id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="category_name">Category Name</label></td>
                    <td><input type="text" name="category_name" id="category_name" placeholder="Mechanical"></td> 
                </tr>
                <tr>
                    <td><label for="category_image">Category Image</label></td>
                    <td><input type="file" name="category_image" id="category_image"></td> 
                </tr>
            </table>
            <button type="submit">Update</button>
        </form>
    </div>
    @endif
    @endauth
</div>

@endsection