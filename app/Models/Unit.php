<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Unit extends Model
{
    use HasUuids;

    protected $fillable = ['nama_unit', 'tahun'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function laporan()
    {
        return $this->hasMany(LaporanRenaksi::class);
    }
}
