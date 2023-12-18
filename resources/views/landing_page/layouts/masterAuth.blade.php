{{-- ============== Head ============== --}}
@include('landing_page.components.head')
{{-- ============== Head End ============== --}}

{{-- ============== Content ============== --}}
@yield('Content')
{{-- ============== Content End ============== --}}

{{-- ============== Preload ============== --}}
@include('landing_page.components.preload')
{{-- ============== Preload End ============== --}}

{{-- ============== Scripts ============== --}}
@include('landing_page.components.scripts')
{{-- ============== Scripts End ============== --}}
