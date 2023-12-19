@extends('admin_page.layouts.masterAdmin')
@section('Content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit FAQ</h5>
                <p class="mb-5">Ini adalah halaman untuk mengedit FAQ</p>

                <form class="row" action="{{ route('admin.faq.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Pertanyaan</label>
                        <input name="pertanyaan" type="text" class="form-control" id=""
                            value="{{ $data->pertanyaan }}">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Jawaban</label>
                        <textarea name="jawaban" rows="3" class="form-control">{{ $data->jawaban }}</textarea>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Tipe</label>
                        <div class="form-check">
                            <input class="form-check-input" value="faq" type="radio" name="radioTipe" id="flexRadioDefault1" {{ $data->tipe == 'faq' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                FAQ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="tips" type="radio" name="radioTipe" id="flexRadioDefault2" {{ $data->tipe == 'tips' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tips
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
