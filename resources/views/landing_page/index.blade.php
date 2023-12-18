@extends('landing_page.layouts.masterLanding')
@section('Content')
    {{-- Hero --}}
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="836" height="1328" viewBox="0 0 836 1328" fill="none"
                    data-aos="fade-left">
                    <path
                        d="M1190.33 450.892C1279.93 605.361 1449.88 766.942 1423.6 842.052C1399.07 918.304 1183.69 907.488 1021.97 929.474C858.497 950.319 1058.63 1315.23 906.156 1326.83C753.683 1338.43 248.607 996.724 130.816 889.502C13.026 782.281 -22.0306 597.685 14.1556 457.306C51.2776 315.487 161.514 215.003 272.712 143.822C383.909 72.6412 498.763 30.4642 631.787 10.3304C766.569 -8.66209 920.458 -7.05236 1003.32 69.2936C1086.19 145.64 1098.96 295.281 1190.33 450.892Z"
                        fill="url(#paint0_linear_66_71)" />
                    <defs>
                        <linearGradient id="paint0_linear_66_71" x1="1231.66" y1="1680.83" x2="-216.614" y2="521.498"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#1A334C" stop-opacity="0.73" />
                            <stop offset="0.444714" stop-color="#356899" />
                            <stop offset="1" stop-color="#BC7DBD" />
                        </linearGradient>
                    </defs>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="625" height="972" viewBox="0 0 625 972" fill="none"
                    data-aos="fade-left" data-aos-delay="500">
                    <path
                        d="M1263.6 415.966C1353.2 570.435 1523.16 732.015 1496.87 807.126C1472.34 883.378 1256.96 872.562 1095.24 894.548C931.768 915.393 924.841 958.804 772.369 970.405C619.896 982.005 310.159 910.126 192.369 802.905C74.5782 695.683 247.182 582.783 283.368 442.405C320.49 300.585 -91.9253 4.7547 19.2725 -66.4261C130.47 -137.607 572.034 -4.4617 705.059 -24.5956C839.841 -43.5881 993.73 -41.9783 1076.59 34.3677C1159.46 110.714 1172.23 260.355 1263.6 415.966Z"
                        fill="url(#paint0_linear_138_273)" />
                    <defs>
                        <linearGradient id="paint0_linear_138_273" x1="-112.131" y1="144.905" x2="849.277"
                            y2="120.738" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#1A334C" stop-opacity="0.52" />
                            <stop offset="0.397815" stop-color="#356899" />
                            <stop offset="1" stop-color="#BC7DBD" />
                        </linearGradient>
                    </defs>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="355" height="1060" viewBox="0 0 355 1060" fill="none"
                    data-aos="fade-right" data-aos-delay="1000">
                    <path
                        d="M118.597 503.966C208.203 658.435 378.155 820.015 351.868 895.126C327.339 971.378 111.957 960.562 -49.7585 982.548C-213.232 1003.39 -220.159 1046.8 -372.632 1058.4C-525.105 1070.01 -834.841 998.126 -952.632 890.905C-1070.42 783.683 -897.818 670.783 -861.632 530.405C-824.51 388.585 -1236.93 92.7547 -1125.73 21.5739C-1014.53 -49.6069 -572.966 83.5383 -439.942 63.4044C-305.16 44.4119 -151.271 46.0217 -68.4062 122.368C14.4581 198.714 27.233 348.355 118.597 503.966Z"
                        fill="url(#paint0_linear_138_274)" />
                    <defs>
                        <linearGradient id="paint0_linear_138_274" x1="-1059.93" y1="1416.97" x2="661.111"
                            y2="878.324" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#1A334C" stop-opacity="0.52" />
                            <stop offset="0.541667" stop-color="#356899" />
                            <stop offset="1" stop-color="#BC7DBD" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="row hero-content" data-aos="fade-up">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h6 class="fs-1" style="color: #094067;"><b>Selamat Datang di SI CC !</b></h6>
                    <p class="lead my-4 fs-5">
                        SI CC adalah sistem Informasi yang <br>
                        menyatukan berbagai macam informasi lomba <br>
                        seperti PKM, KMIPN, Gemastik, dan Pilmapres
                    </p>
                    <a href="#tentangKita">
                        <button class="btn d-flex justify-content-center align-items-center">Baca Selengkapnya <i
                                class="ti ti-arrow-right ms-3"></i> </button>
                    </a>
                </div>
                <div class="col-lg-6 hero-img">
                    <img src="{{ asset('landing_page') }}/img/hero_img.png" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- Hero End --}}

    <main id="main">
        {{-- Tentang Kita --}}
        <section id="tentangKita">

            <div class="section-title d-flex flex-column justify-content-center align-items-center" data-aos="fade-down">
                <h4>Apa Itu SI CC</h4>
                <div class="underline"></div>
            </div>

            <div class="container d-flex align-items-center">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 " data-aos="fade-right">
                        <p>SI CC adalah Sistem Informasi untuk mewadahi Mahasiswa Jurusan Teknologi Informasi
                            Politeknik Negeri Jember yang ingin mengikuti perlombaan skala nasional seperti PKM,
                            KMIPN, Gemastik dan Pilmapres. <br>
                            Diharapkan dengan adanya wadah seperti SI CC, mahasiswa
                            dapat menyalurkan prestasi akademiknya sesuai bidang lomba yang diikuti.</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <img src="{{ asset('landing_page') }}/img/mockup.svg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
        {{-- Tentang Kita End --}}

        {{-- Informasi --}}
        <section id="informasi">
            <div class="section-title d-flex flex-column justify-content-center align-items-center" data-aos="fade-down">
                <h4>Informasi Lomba</h4>
                <div class="underline"></div>
            </div>
            <div class="container" data-aos="fade-up">
                {{-- <div class="row">
                            <?php
                            if (count($dataLomba) > 0) {
                                foreach ($dataLomba as $key => $item) { ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <img src="/storage/public/<?= $item['foto'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <?= $item['nama_lomba'] ?>
                                        </h6>
                                    </div>
                                    <div class="card-footer"><a href="/lomba" class="btn btn-primary">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <?php }
                            } else { ?>
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Tidak Ada Lomba</h6>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
        
                        </div> --}}
            </div>
        </section>
        {{-- Informasi End --}}

        {{-- FAQ --}}
        <section id="faq">
            <div class="section-title d-flex flex-column justify-content-center align-items-center" data-aos="fade-down">
                <h4>Frequently Asked Question</h4>
                <div class="underline"></div>
            </div>
            <div class="container" data-aos="fade-up">
                {{-- <div class="accordion" id="accordionExample">
                            <?php
                            if (count($data) > 0) {
                                foreach ($data as $key => $item) { ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?= $key + 1 ?>" aria-expanded="true"
                                        aria-controls="collapse<?= $key + 1 ?>">
                                        <?= $item['pertanyaan'] ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $key + 1 ?>"
                                    class="accordion-collapse collapse <?= $key == 0 ? 'show' : '' ?>"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?= $item['jawaban'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php }
                            } else { ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Pertanyaan 1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                        the collapse plugin adds the appropriate classes that we use to style each element.
                                        These classes control the overall appearance, as well as the showing and hiding via CSS
                                        transitions. You can modify any of this with custom CSS or overriding our default
                                        variables. It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div> --}}
            </div>
        </section>
        {{-- FAQ End --}}
    </main>
@endsection
