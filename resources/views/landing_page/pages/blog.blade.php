@extends('landing_page.layouts.masterLanding')
@section('content')
    <main id="main">
        <section id="blog" class="blog">
            <div class="container">
                <div class="section-title">
                    <h2>Berita</h2>
                    <p>Berita Terkini</p>
                </div>
                <div class="row">
                    <?php
                if (count($data) > 0) {
                    foreach ($data as $key => $item) { ?>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0 img-cropped" src="/storage/public/blog/<?= $item['gambar'] ?>"
                                    alt="">
                            </div>
                            <div class="blog_details">
                                <h6>
                                    <?= $item['created_at'] ?>
                                </h6>
                                <a class="d-inline-block" href="/blog/<?= $item['slug'] ?>">
                                    <h1 style="font-weight: bold">
                                        <?= $item['judul'] ?>
                                    </h1>
                                </a>
                                <p>
                                    <?= $item['headline'] ?>...
                                </p>
                            </div>
                        </article>
                    </div>
                    <?php }
                } else { ?>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <h1>Data Kosong</h1>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
@endsection
