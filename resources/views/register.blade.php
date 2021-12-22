@extends('layout')
@section('container')

<link rel="stylesheet" href="{{asset('css/register_form.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">

<div class="form-container">
    <h3>Register</h3>
    <form action="/registerValidation" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-field">
            <div>
                <label for="username">Username</label>
            </div>
            <div>
                <input id="username" type="text" name="username">
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="email_address">E-mail Address</label>
            </div>
            <div>
                <input id="email_address" type="email" name="email_address">
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="password">Password</label>
            </div>
            <div>
                <input id="password" type="password" name="password">
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="confirm_password">Confirm Password</label>
            </div>
            <div>
                <input id="confirm_password" type="password" name="confirm_password">
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="address">Address</label>
            </div>
            <div>
                <input id="address" type="text" name="address">
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="gender">Gender</label>
            </div>
            <div id="radio-gender">
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="date_of_birth">Date of Birth</label>
            </div>
            <div>
                <input id="date_of_birth" type="date" name="date_of_birth" placeholder="mm/dd/yyyy">
            </div>
        </div>

        <div class="form-submit">
            <button type="submit">Register</button>
        </div>
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