@extends('landing_page.layouts.masterAuth')
@section('Content')
    <div id="forgetPass" class="container-fluid">
        <div class="row vh-100">
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <form action="/admin" method="POST" class="card-form">
                    <div class="title-forms">
                        <h3 class="title">Forget Password</h3>
                        <div style="width: 350px;" class="underline mb-4"></div>
                        <p>Tenang, kami akan membantu mengembalikan akunmu
                            <br>Silahkan cantumkan e-mailmu
                        </p>
                    </div>
                    <div class="inputGroup mt-4">
                        <div class="input mb-5">
                            <input name="password" type="email" class="input-field" required />
                            <label class="input-label">Email</label>
                        </div>
                        <button type="submit" name="submit" class="btn">Forget Password</button>
                        <p class="mt-2">Belum punya akun? Ayo <a href="/register">daftar disini</a></p>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 illustration d-flex justify-content-center align-items-center">
                <img class="img-fluid" src="{{ asset('landing_page') }}/img/illustration_forgetpass.png"
                    alt="gambar forget pass">
            </div>
        </div>
    </div>
@endsection
