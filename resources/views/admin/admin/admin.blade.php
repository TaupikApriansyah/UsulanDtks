@extends('layouts.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen User</h3>
                <p class="text-subtitle text-muted">RT, RW, Kelurahan</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="/admin/addData" class="btn btn-outline-primary">
                    <i data-feather="user-plus"></i> Tambah User
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table align-middle" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Wilayah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $roleColors = [
                        'kelurahan'  => 'primary',
                        'rw'         => 'info',
                        'rt'         => 'secondary',
                    ];
                    @endphp
                    @foreach($user as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <span class="badge bg-{{ $roleColors[$u->role] ?? 'secondary' }}">
                                    {{ strtoupper($u->role) }}
                                </span>
                            </td>
                            <td>
                                @if($u->rt_number) RT {{ $u->rt_number }} / @endif
                                @if($u->rw_number) RW {{ $u->rw_number }} @endif
                                @if($u->village) <br><small class="text-muted">{{ $u->village->name }}</small> @endif
                                @if(!$u->rt_number && !$u->rw_number && !$u->village) <span class="text-muted">—</span> @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="/admin/{{ $u->id }}/editData" class="btn btn-sm btn-outline-warning">
                                    <i data-feather="edit"></i>
                                </a>
                                <form action="/admin/{{ $u->id }}/destroy" method="POST"
                                      onsubmit="return confirm('Hapus user {{ $u->name }}?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <div class="d-flex justify-content-center mt-3">{{ $user->links() }}</div>
            </div>
        </div>
    </section>
</div>
@endsection
