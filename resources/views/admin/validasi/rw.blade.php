@extends('layouts.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Validasi RW</h3>
                <p class="text-subtitle text-muted">Data usulan menunggu persetujuan RW</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if($area->isEmpty())
                    <div class="alert alert-info">Tidak ada data yang menunggu validasi RW.</div>
                @else
                <div class="table-responsive">
                <table class="table align-middle" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Oleh RT</th>
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
                            <td>{{ $data->creator?->name ?? '-' }}<br>
                                <small class="text-muted">RT {{ $data->creator?->rt_number }} / RW {{ $data->creator?->rw_number }}</small>
                            </td>
                            <td>{{ $data->updated_at->format('d M Y') }}</td>
                            <td>
                                <a href="/show/{{ $data->id }}" class="btn btn-sm btn-outline-secondary">
                                    <i data-feather="eye"></i>
                                </a>

                                {{-- Setujui --}}
                                <form action="{{ route('rw.setujui', $data->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Setujui dan kirim ke Kelurahan?')">
                                    @csrf
                                    <button class="btn btn-sm btn-success">
                                        <i data-feather="check"></i> Setujui
                                    </button>
                                </form>

                                {{-- Tolak --}}
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalTolak{{ $data->id }}">
                                    <i data-feather="x"></i> Tolak
                                </button>

                                {{-- Modal Tolak --}}
                                <div class="modal fade" id="modalTolak{{ $data->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('rw.tolak', $data->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tolak & Kembalikan ke RT</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label fw-semibold">Alasan / Catatan untuk RT</label>
                                                    <textarea name="catatan_rw" class="form-control" rows="4"
                                                              placeholder="Tuliskan alasan penolakan..." required maxlength="500"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Tolak & Kembalikan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
