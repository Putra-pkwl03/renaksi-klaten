<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class LaporanRenaksi extends Model
{
    use HasUuids;

    protected $table = 'laporan_renaksi';

    protected $fillable = [
        'category_id',
        'unit_id',
        'sasaran',
        'indikator',
        'target_tw1',
        'target_tw2',
        'target_tw3',
        'target_tw4',
        'realisasi_tw1',
        'realisasi_tw2',
        'realisasi_tw3',
        'realisasi_tw4',
        'capaian_triwulan',
        'persen_capaian',
        'persen_capaian_akumulasi',
        'catatan_hasil_monitoring',
        'tindak_lanjut',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
