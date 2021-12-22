@extends('layout')
@section('container')

<div class="row">
    <h3>Login</h3>
    <form action="/insertKeyboard" method="POST" enctype="multipart/form-data">
        @csrf
        <table border="solid 1px">
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
                <td><label for="keyboard_name">Keyboard Name</label></td>
                <td><input type="text" name="keyboard_name" id="keyboard_name"></td>
            </tr>

            <tr>
                <td><label for="keyboard_price">Keyboard Price ($)</label></td>
                <td><input type="number" name="keyboard_price" id="keyboard_price"></td>
            </tr>

            <tr>
                <td><label for="description">Description</label></td>
                <td><input type="text" name="description" id="description"></td>
            </tr>

            <tr>
                <td><label for="keyboard_image">Keyboard Image</label></td>
                <td><input type="file" name="keyboard_image" id="keyboard_image"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit">Add</button>
                </td>
            </tr>
        </table>
    </form>
</div>

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