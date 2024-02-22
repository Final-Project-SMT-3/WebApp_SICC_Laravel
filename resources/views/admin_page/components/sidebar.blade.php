<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('admin_page') }}/images/logos/logo_admin.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item mt-3">
                    <a class="sidebar-link" href="/admin" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/acc" aria-expanded="false">
                        <span>
                            <i class="ti ti-check"></i>
                        </span>
                        <span class="hide-menu">Acc Pendaftar</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/blog" aria-expanded="false">
                        <span>
                            <i class="ti ti-news"></i>
                        </span>
                        <span class="hide-menu">Artikel</span>
                    </a>
                </li> --}}
                <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/lomba" aria-expanded="false">
                        <span>
                            <i class="ti ti-trophy"></i>
                        </span>
                        <span class="hide-menu">Lomba</span>
                    </a>
                </li>
                <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/juara" aria-expanded="false">
                        <span>
                            <i class="ti ti-award"></i>
                        </span>
                        <span class="hide-menu">Juara</span>
                    </a>
                </li>
                <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/faq" aria-expanded="false">
                        <span>
                            <i class="ti ti-question-mark"></i>
                        </span>
                        <span class="hide-menu">FAQ</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/pengajuanBimbingan" aria-expanded="false">
                        <span>
                            <i class="ti ti-checklist"></i>
                        </span>
                        <span class="hide-menu">Pengajuan Bimbingan</span>
                    </a>
                </li>
                <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/pengajuanJudul" aria-expanded="false">
                        <span>
                            <i class="ti ti-checklist"></i>
                        </span>
                        <span class="hide-menu">Pengajuan Judul</span>
                    </a>
                </li>
                <li class="sidebar-item mt-2">
                    <a class="sidebar-link" href="/admin/pengajuanProposal" aria-expanded="false">
                        <span>
                            <i class="ti ti-checklist"></i>
                        </span>
                        <span class="hide-menu">Pengajuan Proposal</span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
