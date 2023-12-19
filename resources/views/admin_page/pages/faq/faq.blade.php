@extends('admin_page.layouts.masterAdmin')
@section('Content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">FAQ</h5>
                <div class="d-flex justify-content-between mb-4">
                    <p>Ini adalah halaman untuk mengatur Frequently Asked Question</p>
                    <a href="{{ route('admin.faq.create') }}"><button class="btn btn-primary">Tambah FAQ</button></a>
                </div>
                <table id="{{ count($data) > 0 ? 'dataTables' : '' }}" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Tipe</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pertanyaan }}</td>
                                <td>{{ $item->jawaban }}</td>
                                <td>{{ $item->tipe }}</td>
                                <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    
                                <div class="d-flex">
                                    <a class="text-white" href="{{ route('admin.faq.edit', $item->id) }}"><button
                                            type="button" class="btn btn-warning m-1"><i
                                                class="ti ti-pencil"></i></button></a>
                                    <a class="text-white" href="#"><button type="button" class="btn btn-danger m-1"
                                            data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}"><i
                                                class="ti ti-trash"></i></button></a>
                                </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center mt-3">Tidak Ada Data</td>
                            </tr>
                        @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    @foreach ($data as $item)
        
        <div class="modal fade" id="delete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.faq.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus FAQ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yakin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
