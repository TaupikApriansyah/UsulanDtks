<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'rt_number',
        'rw_number',
        'village_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // --- Helper Role ---

    public function hasRole(string|array $roles): bool
    {
        return in_array($this->role, (array) $roles);
    }

    public function isKelurahan(): bool  { return $this->role === 'kelurahan'; }
    public function isRw(): bool         { return $this->role === 'rw'; }
    public function isRt(): bool         { return $this->role === 'rt'; }

    // --- Relasi ---

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function surveis()
    {
        return $this->hasMany(Survei::class, 'created_by');
    }
}
