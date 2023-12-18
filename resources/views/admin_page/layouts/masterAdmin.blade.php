{{-- ============== Head ============== --}}
@include('admin_page.components.head')
{{-- ============== Head End ============== --}}

<main id="main">

    {{-- ============== Main Wrapper ============== --}}
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        {{-- ============== SideBar ============== --}}
        @include('admin_page.components.sidebar')
        {{-- ============== Sidebar End ============== --}}

        {{-- ============== Body Wrapper ============== --}}
        <div class="body-wrapper">
            {{-- ============== Header ============== --}}
            @include('admin_page.components.header')
            {{-- ============== Header End ============== --}}

            {{-- ============== Content ============== --}}
            @yield('Content')
            {{-- ============== Content End ============== --}}

        </div>
        {{-- ============== Body Wrapper End ============== --}}
    </div>
    {{-- ============== Main Wrapper End ============== --}}
</main>

{{-- ============== Preload ============== --}}
@include('landing_page.components.preload')
{{-- ============== Preload End ============== --}}

{{-- ============== Scripts ============== --}}
@include('admin_page.components.scripts')
{{-- ============== Scripts End ============== --}}
