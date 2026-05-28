@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Informasi</h3>
                    <p class="text-subtitle text-muted">Untuk Melihat Informasi</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section max-w-full">
            <div class="mb-3">
                <a href="konfirmasi/tambah" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i></a>
            </div>
            <div class="row">
                @foreach ($konfirmasi as $data)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('img/konfirmasi') }}/{{ $data->foto }}" class="h-80 w-100 mb-1 rounded"
                                    alt="">
                                <p>Konfirmasi 1</p>
                                <a href="konfirmasi/{{ $data->id }}/edit"
                                    class="btn btn-outline-warning rounded-circle"><i class="fas fa-cog"></i></a>
                                <form action="/konfirmasi/{{ $data->id }}/delete" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin Mau hapus Data ini?')" class="btn btn-outline-danger rounded-circle">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $konfirmasi->links() }}
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
