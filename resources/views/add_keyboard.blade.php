@extends('layout')
@section('container')

<div class="row">
    <h3>Login</h3>
    <form action="/addKeyboardValidation" method="POST" enctype="multipart/form-data">
        @csrf
        <table border="solid 1px">
            <tr>
                <td><label for="password">Current Password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>

            <tr>
                <td><label for="password">New Password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>

            <tr>
                <td><label for="password">New Confirm Password</label></td>
                <td><input type="password" name="password" id="password"></td>
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

@endsection