<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survei extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'tgl_lahir' => 'date',
        'tanggal_kehamilan' => 'date',
        'informasi_dikirim_at' => 'datetime',
    ];

    // --- Status label & badge ---

    const STATUS_LABELS = [
        'draft'               => 'Draft',
        'menunggu_rw'         => 'Menunggu RW',
        'menunggu_kelurahan'  => 'Menunggu Kelurahan',
        'siap_diinformasikan' => 'Siap Dikirim ke Warga',
        'diinformasikan'      => 'Informasi Dikirim',
    ];

    const STATUS_BADGES = [
        'draft'               => 'secondary',
        'menunggu_rw'         => 'warning',
        'menunggu_kelurahan'  => 'info',
        'siap_diinformasikan' => 'primary',
        'diinformasikan'      => 'success',
    ];

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? $this->status;
    }

    public function getStatusBadgeAttribute(): string
    {
        return self::STATUS_BADGES[$this->status] ?? 'secondary';
    }

    public function isDraft(): bool { return $this->status === 'draft'; }

    public function isSiapDiinformasikan(): bool
    {
        return $this->status === 'siap_diinformasikan';
    }

    public function isDiinformasikan(): bool
    {
        return $this->status === 'diinformasikan';
    }

    public function getHasilKelurahanLabelAttribute(): string
    {
        return match ($this->hasil_kelurahan) {
            'disetujui' => 'Disetujui Kelurahan',
            'ditolak' => 'Ditolak Kelurahan',
            default => 'Belum Ada Hasil',
        };
    }

    public function getHasilKelurahanBadgeAttribute(): string
    {
        return match ($this->hasil_kelurahan) {
            'disetujui' => 'success',
            'ditolak' => 'danger',
            default => 'secondary',
        };
    }

    // --- Relasi ---

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function regencie()
    {
        return $this->belongsTo(Regency::class, 'regencie_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
