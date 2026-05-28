@extends('layouts.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Usulan</h3>
                <p class="text-subtitle text-muted">Daftar usulan DTKS</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex gap-2">
                @if(auth()->user()->isRt())
                    <a href="/plus" class="btn btn-outline-primary">
                        <i data-feather="plus"></i> Tambah
                    </a>
                @endif
                @if(auth()->user()->isKelurahan())
                    <a href="/export-survei" class="btn btn-outline-success">
                        <i data-feather="download"></i> Export
                    </a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table align-middle" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No KK</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($area as $data)
                        <tr>
                            <td>{{ $area->firstItem() + $loop->index }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->kk }}</td>
                            <td>
                                <span class="badge bg-{{ $data->status_badge }}">
                                    {{ $data->status_label }}
                                </span>
                                @if($data->hasil_kelurahan)
                                    <br><span class="badge bg-{{ $data->hasil_kelurahan_badge }} mt-1">{{ $data->hasil_kelurahan_label }}</span>
                                @endif
                                @if($data->catatan_rw && $data->status === 'draft')
                                    <br><small class="text-danger">Catatan RW: {{ Str::limit($data->catatan_rw, 40) }}</small>
                                @endif
                            </td>
                            <td class="d-flex flex-wrap gap-1">
                                <a href="/show/{{ $data->id }}" class="btn btn-sm btn-outline-secondary">
                                    <i data-feather="eye"></i>
                                </a>

                                {{-- Edit & hapus: hanya RT pemilik, hanya kalau masih draft --}}
                                @if(auth()->user()->isRt() && $data->created_by === auth()->id())
                                    @if($data->isDraft())
                                        <a href="/survei/{{ $data->id }}/edit" class="btn btn-sm btn-outline-warning">
                                            <i data-feather="settings"></i>
                                        </a>
                                        <form action="/survei/{{ $data->id }}/destroy" method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i data-feather="trash"></i>
                                            </button>
                                        </form>
                                        {{-- Kirim ke RW --}}
                                        <form action="{{ route('survei.kirim-rw', $data->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Kirim ke RW untuk divalidasi?')">
                                            @csrf
                                            <button class="btn btn-sm btn-primary">
                                                <i data-feather="send"></i> Kirim ke RW
                                            </button>
                                        </form>
                                    @endif
                                @endif

                                <a href="/survei/{{ $data->id }}/print" class="btn btn-sm btn-danger">
                                    <i data-feather="printer"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <div class="d-flex justify-content-center mt-3">{{ $area->links() }}</div>
            </div>
        </div>
    </section>
</div>
@endsection
