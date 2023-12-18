{{-- ============== Head ============== --}}
@include('landing_page.components.head')
{{-- ============== Head End ============== --}}

{{-- ============== Navbar ============== --}}
@include('landing_page.components.navbar')
{{-- ============== Navbar End ============== --}}

{{-- ============== Content ============== --}}
@yield('Content')
{{-- ============== Content End ============== --}}

{{-- ============== Preload ============== --}}
@include('landing_page.components.preload')
{{-- ============== Preload End ============== --}}

{{-- ============== Always On Top Button ============== --}}
@include('landing_page.components.alwaysTopButton')
{{-- ============== Always On Top Button End ============== --}}

{{-- ============== Footer ============== --}}
@include('landing_page.components.footer')
{{-- ============== Footer End ============== --}}

{{-- ============== Scripts ============== --}}
@include('landing_page.components.scripts')
{{-- ============== Scripts End ============== --}}
