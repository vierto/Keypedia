@extends('layout')
@section('container')

<div class="row">
    <h3>Login</h3>
    <form action="/loginValidation" method="POST" enctype="multipart/form-data">
        @csrf
        <table border="solid 1px">
            <tr>
                <td><label for="email_address">E-Mail Address</label></td>
                <td><input type="text" name="email_address" id="email_address" placeholder="user@keypedia.com" value={{Cookie::get('email_address') != null ? Cookie::get('email_address') : ""}}></td> 
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" placeholder="********" value={{Cookie::get('password') != null ? Cookie::get('password') : ""}}></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="remember_me" name="remember_me">
                <label for="remember_me">Remember Me</label></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Login</button>
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