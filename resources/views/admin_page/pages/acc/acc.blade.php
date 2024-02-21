@extends('admin_page.layouts.masterAdmin')
@section('Content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Persetujuan Pendaftar</h5>
                <div class="d-flex justify-content-between mb-4">
                    <p>Ini adalah halaman untuk mengatur persetujuan pendaftar</p>
                </div>
                <table id="{{ count($data) > 0 ? 'dataTables' : '' }}" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Lomba</th>
                            <th>Nama Kelompok</th>
                            <th>Nama & NIM Anggota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @if (count($data) > 0)
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $item->nama_lomba }}
                                    </td>
                                    <td>
                                        {{ $item->nama_kelompok }}
                                    </td>
                                    <td>
                                        <ol>
                                            @php
                                                $nim_array = explode(', ', $item->nim_anggota);
                                                $nama_array = explode(', ', $item->nama_anggota);
                                                $result = [];
                                                foreach ($nim_array as $key => $nim) {
                                                    $result[] = $nama_array[$key] . '_' . $nim;
                                                }
                                            @endphp
                                            @foreach ($result as $nama_nim)
                                                <li>{{ $nama_nim }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Acc</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else --}}
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data</td>
                        </tr>
                        {{-- @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
