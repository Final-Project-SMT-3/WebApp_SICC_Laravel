@extends('admin_page.layouts.masterAdmin')
@section('Content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Artikel</h5>
                <p class="mb-5">Ini adalah halaman untuk menambah Artikel</p>

                <form class="row" action="#" method="POST">
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Judul</label>
                        <input type="email" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="" id="" rows="1" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Thumbnail</label>
                        <input type="file" class="form-control" id="" onchange="loadFile(event)">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Preview</label>
                        <img id="output" width="350" height="160" class="img-thumbnail">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
