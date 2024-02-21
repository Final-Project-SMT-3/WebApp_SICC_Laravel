@extends('admin_page.layouts.masterAdmin')
@section('Content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Lomba</h5>
                <div class="d-flex justify-content-between mb-4">
                    <p>Ini adalah halaman untuk mengatur Lomba</p>
                    <a href="/admin/MasterLomba/create"><button class="btn btn-primary">Tambah Lomba</button></a>
                </div>
                <table id="<?= count($data) > 0 ? 'dataTables' : '' ?>" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Lomba</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $item->nama_lomba }}
                                    </td>
                                    <td>
                                        {{ $item->detail_lomba }}
                                    </td>
                                    <td><img class="img-fluid rounded-2" src="/storage/public/{{ $item->foto ?? '-' }}"
                                            alt="" width="100"></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-warning m-1">
                                                <a class="text-white" href="/admin/MasterLomba/edit/{{ $item->id }}"><i
                                                        class="ti ti-pencil"></i></a>
                                            </button>
                                            <button type="button" class="btn btn-danger m-1">
                                                <a class="text-white"
                                                    href="/admin/MasterLomba/delete/{{ $item->id }}"><i
                                                        class="ti ti-trash"></i></a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
