<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul',
        'keterangan',
        'status',
        'feedback',
        'admin_id',
        'siswa_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
