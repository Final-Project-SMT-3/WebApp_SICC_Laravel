@extends('landing_page.layouts.masterAuth')
@section('Content')
    <div id="register" class="container-fluid">
        <div class="row vh-100">
            <div class="col-lg-6 illustration d-flex justify-content-center align-items-center">
                <img class="img-fluid" src="{{ asset('landing_page') }}/img/illustration_register.png" alt="gambar register">
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <form class="card-form">
                    <div class="title-forms">
                        <h3 class="title">Sign Up</h3>
                        <div class="underline mb-4"></div>
                        <p>Selamat datang, silahkan Sign Up untuk mendaftar di SI CC</p>
                    </div>
                    <div class="inputGroup mt-4">
                        <div class="input">
                            <input type="text" class="input-field" required />
                            <label class="input-label">E-mail</label>
                        </div>
                        <div class="input mb-5">
                            <input type="text" class="input-field" required />
                            <label class="input-label">Username</label>
                        </div>
                        <button class="btn">Sign Up</button>
                        <p class="mt-2">Sudah punya akun? sini <a href="/login">login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
