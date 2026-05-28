@extends('layouts.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit User</h3>
                <p class="text-subtitle text-muted">Ubah data user</p>
            </div>
        </div>
    </div>
    <section class="section max-w-full">
        <div class="card" style="width:100%">
            <div class="card-body">
                <form action="/admin/{{ $admin->id }}/updateData" method="post">
                    @csrf

                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label text-right">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name', $admin->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label text-right">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email', $admin->email) }}" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label text-right">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" placeholder="Kosongkan jika tidak diubah">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label text-right">Role</label>
                        <div class="col-sm-6">
                            <select name="role" id="roleSelect"
                                    class="form-control @error('role') is-invalid @enderror" required>
                                <option value="kelurahan"  {{ old('role',$admin->role)=='kelurahan'  ? 'selected':'' }}>Kelurahan</option>
                                <option value="rw"         {{ old('role',$admin->role)=='rw'         ? 'selected':'' }}>RW</option>
                                <option value="rt"         {{ old('role',$admin->role)=='rt'         ? 'selected':'' }}>RT</option>
                            </select>
                            @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div id="fieldRt" class="form-group row mb-3" style="display:none">
                        <label class="col-sm-4 col-form-label text-right">Nomor RT</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="rt_number"
                                   value="{{ old('rt_number', $admin->rt_number) }}" placeholder="cth: 01">
                        </div>
                    </div>

                    <div id="fieldRw" class="form-group row mb-3" style="display:none">
                        <label class="col-sm-4 col-form-label text-right">Nomor RW</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="rw_number"
                                   value="{{ old('rw_number', $admin->rw_number) }}" placeholder="cth: 01">
                        </div>
                    </div>

                    <div id="fieldVillage" class="form-group row mb-3" style="display:none">
                        <label class="col-sm-4 col-form-label text-right">Kelurahan/Desa</label>
                        <div class="col-sm-6">
                            <select name="village_id" class="form-control">
                                <option value="">-- Pilih Kelurahan --</option>
                                @foreach($villages as $v)
                                    <option value="{{ $v->id }}"
                                        {{ old('village_id', $admin->village_id) == $v->id ? 'selected':'' }}>
                                        {{ $v->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/admincontrol" class="btn btn-danger ms-2">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
const roleSelect   = document.getElementById('roleSelect');
const fieldRt      = document.getElementById('fieldRt');
const fieldRw      = document.getElementById('fieldRw');
const fieldVillage = document.getElementById('fieldVillage');

function toggleWilayah() {
    const role = roleSelect.value;
    fieldRt.style.display      = role === 'rt'              ? '' : 'none';
    fieldRw.style.display      = ['rt','rw'].includes(role) ? '' : 'none';
    fieldVillage.style.display = ['rt','rw','kelurahan'].includes(role) ? '' : 'none';
}
roleSelect.addEventListener('change', toggleWilayah);
toggleWilayah();
</script>
@endsection
