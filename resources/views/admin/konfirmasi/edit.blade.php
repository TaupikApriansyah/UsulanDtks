@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Informasi</h3>
                    <p class="text-subtitle text-muted">Untuk Mengubah Data</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section max-w-full">

            <div class="card" style="width: 100%">

                <div class="card-body">
                    <form action="/konfirmasi/{{ $data->id }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="foto">
                            <img src="{{ asset('img/konfirmasi') }}/{{ $data->foto }}" alt=""
                                class="rounded w-50 mb-2">
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="foto" name="foto" required
                                    value="{{ $data->foto }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/konfirmasi" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
