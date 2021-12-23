@extends('layout')
@section('container')

<div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
        alt="Sample image">
    </div>
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="/loginValidation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-outline mb-4">
                <label class="form-label" for="email_address">E-mail address</label>
                <input type="email" name="email_address" id="email_address" value={{Cookie::get('email_address') != null ? Cookie::get('email_address') : ""}} class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
            </div>

            <div class="form-outline mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" value={{Cookie::get('password') != null ? Cookie::get('password') : ""}} class="form-control form-control-lg"
                placeholder="Enter password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" id="remember_me" name="remember_me" />
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                    class="link-danger">Register</a></p>
            </div>

        </form>
    </div>
    </div>
</div>

{{-- <div class="row">
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
</div> --}}

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