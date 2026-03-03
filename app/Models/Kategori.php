<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aspirasi;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori', 'keterangan'];

    public function aspirasis()
    {
        return $this->hasMany(Aspirasi::class);
    }
}
