@extends('layout')
@section('container')

    @auth
    @if(Auth::user()->role_id == 1)
    <div class="row">
        <h3>Update Keyboard</h3>
        <form action="/updateKeyboardValidation/{{$keyboard_id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="category_name">Category</label></td>
                    <td>
                        <select name="category_name" id="category_name">
                            <option value="">Choose a Category!</option>
                            @foreach ($categories as $c)
                                <option value="{{$c->category_name}}">{{$c->category_name}}</option>
                            @endforeach
                        </select>
                    </td>
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