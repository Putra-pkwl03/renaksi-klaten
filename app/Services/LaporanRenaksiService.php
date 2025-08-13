<?php

// app/Services/LaporanRenaksiService.php
namespace App\Services;

use App\Models\LaporanRenaksi;

class LaporanRenaksiService
{
    public static function getDataByKategori()
    {
        $laporanByKategori = [];
        $capaianTriwulanByKategori = [];

        foreach (['A', 'B', 'C', 'D'] as $kode) {
            $laporanByKategori[$kode] = LaporanRenaksi::where('kategori', $kode)
                ->orderBy('created_at', 'desc')
                ->paginate(3, ['*'], 'page_' . $kode);

            $capaianTriwulanByKategori[$kode] = LaporanRenaksi::where('kategori', $kode)
                ->orderBy('created_at', 'desc')
                ->value('capaian_triwulan');
        }

        return compact('laporanByKategori', 'capaianTriwulanByKategori');
    }
}
