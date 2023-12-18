{{-- ============== Head ============== --}}
@include('landing_page.components.head')
{{-- ============== Head End ============== --}}

<div class="text-center position-absolute top-50 start-50 translate-middle">
    <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Akun anda berhasil dibuat</h2>
        <p class="mb-4 mx-2">Silahkan melakukan login pada aplikasi mobile yang telah tersedia :)</p>
        <a href="/login"><button class="btn btn-primary">Kembali Ke Login</button></a>
        <div class="mt-3">
            <img id="gambarVerified" src="{{ asset('landing_page') }}/img/verified.gif" width="500" class="img-fluid" />
        </div>
    </div>
</div>

{{-- ============== Scripts ============== --}}
@include('landing_page.components.scripts')
{{-- ============== Scripts End ============== --}}
