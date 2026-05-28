@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Cek DTKS</h3>
                    <p class="text-subtitle text-muted">Untuk Melihat Data Cek DTKS</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section max-w-full">

            <div class="card" style="width: 100%">
                <div class="card-header">
                    <a href="dtks/addData" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i></a>
                    <a href="export-dtks" class="btn btn-outline-success">
                        <i class="fas fa-print"></i></a>
                </div>
                <div class="card-body">
                    <table class="table align-middle" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nik</th>
                                <th>No KK</th>
                                <th>No Telepon</th>
                                <th>Keperluan</th>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtks as $data)
                                <tr>
                                    <td>{{ $dtks->firstItem() + $loop->index }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->kk }}</td>
                                    <td>{{ $data->nomor_kontak }}</td>
                                    <td>{{ $data->keperluan }}</td>
                                    <td class="d-flex gap-2 mt-3">
                                        <a href="dtks/{{ $data->id }}/editData"
                                            class="btn btn-outline-warning rounded-circle">
                                            <i data-feather="settings"></i>
                                        </a>
                                        <form action="/dtks/{{ $data->id }}/deleteData" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin mau hapus Data DTKS ini?')" class="btn btn-outline-danger rounded-circle">
                                                <i data-feather="trash"></i>
                                            </button>
                                        </form>
                                        <a href="dtks/{{ $data->id }}/print" class="btn btn-danger rounded-circle">
                                            <i class="fas fa-print"></i></a>
                                        <a href="https://wa.me/{{ $data->nomor_kontak }}"
                                            class="btn btn-outline-success rounded-circle">
                                            <i class="fas fa-phone"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $dtks->links() }}
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
