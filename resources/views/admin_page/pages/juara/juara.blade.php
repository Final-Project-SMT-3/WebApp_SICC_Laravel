@extends('admin_page.layouts.masterAdmin')
@section('Content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Juara</h5>
                <div class="d-flex justify-content-between mb-4">
                    <p>Ini adalah halaman untuk mengatur Juara</p>
                    <a href="/admin/MasterJuara/create"><button class="btn btn-primary">Tambah Lomba</button></a>
                </div>
                <table id="<?= count($data) > 0 ? 'dataTables' : '' ?>" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Lomba</th>
                            <th>Kelompok</th>
                            <th>Kategori Juara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="5" class="text-center">Belum ada data</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
