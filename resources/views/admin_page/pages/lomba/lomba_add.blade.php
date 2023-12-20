@extends('admin_page.layouts.masterAdmin')
@section('Content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Lomba</h5>
                <p class="mb-5">Ini adalah halaman untuk menambah Lomba</p>

                <form class="row" action="/admin/MasterLomba/store" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" id="" name="nama">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Gambar</label>
                                <input name="gambar" type="file" class="form-control" id=""
                                    onchange="loadFile(event)" accept="image/*">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Preview</label>
                                <img id="output" width="350" height="160" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="" rows="8" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection