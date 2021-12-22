@extends('layout')
@section('container')

<div class="row">
    <h3>Login</h3>
    <form action="/changePasswordValidation" method="POST" enctype="multipart/form-data">
        @csrf
        <table border="solid 1px">
            <tr>
                <td><label for="current_password">Current Password</label></td>
                <td><input type="password" name="current_password" id="current_password"></td>
            </tr>

            <tr>
                <td><label for="new_password">New Password</label></td>
                <td><input type="password" name="new_password" id="new_password"></td>
            </tr>

            <tr>
                <td><label for="confirm_password">Confirm Password</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit">Update Password</button>
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