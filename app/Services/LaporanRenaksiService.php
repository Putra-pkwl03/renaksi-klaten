<?php

namespace App\Services;

use App\Models\LaporanRenaksi;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class LaporanRenaksiService
{
    public static function getDataByKategori()
    {
        $laporanByKategori = [];
        $capaianTriwulanByKategori = [];

        // Ambil semua kategori dari DB
        $categories = Category::orderBy('nama_kategori')->get();

        foreach ($categories as $category) {
            $categoryId = $category->id;
            $categoryName = $category->nama_kategori;

            // Ambil data laporan per kategori, pakai paginator
            $laporanByKategori[$categoryName] = LaporanRenaksi::where('category_id', $categoryId)
                ->orderBy('created_at', 'desc')
                ->paginate(3, ['*'], 'page_' . $categoryId);

            // Ambil capaian triwulan terakhir untuk kategori ini
            $capaianTriwulanByKategori[$categoryName] = LaporanRenaksi::where('category_id', $categoryId)
                ->orderBy('created_at', 'desc')
                ->value('capaian_triwulan');
        }

        return compact('laporanByKategori', 'capaianTriwulanByKategori');
    }
}
