@extends('layouts.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Validasi Kelurahan</h3>
                <p class="text-subtitle text-muted">Validasi ulang data dari RW, lalu kirim informasi final ke warga</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if($area->isEmpty())
                    <div class="alert alert-info">Tidak ada data yang menunggu validasi atau pengiriman informasi.</div>
                @else
                <div class="table-responsive">
                <table class="table align-middle" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Diajukan RT</th>
                            <th>Wilayah</th>
                            <th>Status</th>
                            <th>Tgl Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($area as $data)
                        <tr>
                            <td>{{ $area->firstItem() + $loop->index }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->creator?->name ?? '-' }}</td>
                            <td>
                                <small>RT {{ $data->creator?->rt_number }} / RW {{ $data->creator?->rw_number }}</small><br>
                                <small class="text-muted">{{ $data->village?->name ?? '-' }}</small>
                            </td>
                            <td>
                                <span class="badge bg-{{ $data->status_badge }}">{{ $data->status_label }}</span>
                                @if($data->hasil_kelurahan)
                                    <br><span class="badge bg-{{ $data->hasil_kelurahan_badge }} mt-1">{{ $data->hasil_kelurahan_label }}</span>
                                @endif
                            </td>
                            <td>{{ $data->updated_at->format('d M Y') }}</td>
                            <td>
                                <a href="/show/{{ $data->id }}" class="btn btn-sm btn-outline-secondary">
                                    <i data-feather="eye"></i>
                                </a>

                                @if($data->status === 'menunggu_kelurahan')
                                    <form action="{{ route('kelurahan.setujui', $data->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Setujui data ini dan siapkan informasi untuk warga?')">
                                        @csrf
                                        <button class="btn btn-sm btn-success">
                                            <i data-feather="check-circle"></i> Setujui
                                        </button>
                                    </form>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalTolakKel{{ $data->id }}">
                                        <i data-feather="x-circle"></i> Tolak
                                    </button>

                                    <div class="modal fade" id="modalTolakKel{{ $data->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('kelurahan.tolak', $data->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tolak Usulan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label class="form-label fw-semibold">Alasan penolakan</label>
                                                        <textarea name="catatan_kelurahan" class="form-control" rows="4"
                                                                  placeholder="Tuliskan alasan penolakan yang akan dilihat warga..." required maxlength="500"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($data->status === 'siap_diinformasikan')
                                    <form action="{{ route('kelurahan.kirim-informasi', $data->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Kirim informasi final ke warga? Setelah dikirim, warga bisa cek status usulan ini.')">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">
                                            <i data-feather="send"></i> Kirim Informasi
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <div class="d-flex justify-content-center mt-3">{{ $area->links() }}</div>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
