<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Category extends Model
{
    use HasUuids;

    protected $fillable = ['nama_kategori', 'unit_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function laporan()
    {
        return $this->hasMany(LaporanRenaksi::class);
    }
}
