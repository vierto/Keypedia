@extends('layout')
@section('container')

<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
        <div class="card-body p-md-5">
            <div class="row justify-content-center">
            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                <form class="mx-1 mx-md-4" action="/registerValidation" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="email_address">E-mail Address</label>
                            <input type="email" id="email_address" name="email_address" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" />
                        </div>
                    </div>
                    
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-check-label" for="gender">Gender</label>
                            <br>
                            <input type="radio" id="male" name="gender" value="male" class="form-check-input">
                            <label for="male">Male</label>

                            <input type="radio" id="female" name="gender" value="female" class="form-check-input">
                            <label for="female">Female</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="date_of_birth">Date of Birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" placeholder="mm/dd/yyyy" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>

                </form>

            </div>
            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

{{-- <div class="form-container">
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