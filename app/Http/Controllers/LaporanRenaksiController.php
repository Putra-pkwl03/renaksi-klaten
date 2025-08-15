<?php

namespace App\Http\Controllers;

use App\Models\LaporanRenaksi;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\LaporanRenaksiService;

class LaporanRenaksiController extends Controller
{
    public function index(Request $request)
    {
        $mode = $request->get('mode', 'list');
        $showActions = true; 
        $topbarTitle = $mode === 'form' ? 'Tambah Laporan Renaksi' : 'Laporan Renaksi';

        if ($mode === 'form') {
            $laporan = new LaporanRenaksi();
            $categories = Category::all();
            $units = Unit::all();
            $capaianTriwulanByKategori = [];
            $laporanByKategori = [];
        } else {
            extract(LaporanRenaksiService::getDataByKategori());
            $laporan = collect();
            $categories = collect();
            $units = collect();
        }

        return view('apps.LaporanRenaksi', compact(
            'laporan',
            'topbarTitle',
            'mode',
            'showActions',
            'categories',
            'units',
            'capaianTriwulanByKategori',
            'laporanByKategori'
        ));
    }

    public function create()
    {
        $topbarTitle = 'Tambah Laporan Renaksi';
        $mode = 'form';
        $showActions = true;
        $laporan = new LaporanRenaksi();
        $categories = Category::all();
        $units = Unit::all();
        $capaianTriwulanByKategori = [];
        $laporanByKategori = [];

        return view('layouts-eg.horizontal', compact(
            'laporan',
            'topbarTitle',
            'mode',
            'showActions',
            'categories',
            'units',
            'capaianTriwulanByKategori',
            'laporanByKategori'
        ));
    }

public function store(Request $request)
{
    $request->validate([
        'kategori' => 'required|exists:categories,id',
        'unit_id' => 'required|exists:units,id',
        'sasaran' => 'required|string',
        'indikator' => 'nullable|string',
        'target_tw1' => 'nullable|string',
        'target_tw2' => 'nullable|string',
        'target_tw3' => 'nullable|string',
        'target_tw4' => 'nullable|string',
        'realisasi_tw1' => 'nullable|string',
        'realisasi_tw2' => 'nullable|string',
        'realisasi_tw3' => 'nullable|string',
        'realisasi_tw4' => 'nullable|string',
    ]);

    $data = $request->all();
    $data['category_id'] = $data['kategori'];
    unset($data['kategori']);
    $data['unit_id'] = $request->unit_id;

    $totalTargetTriwulan = 0;
    $totalRealisasiTriwulan = 0;
    $totalTargetAkumulasi = 0;
    $totalRealisasiAkumulasi = 0;

    $validTwCount = 0; // untuk menghitung TW yang valid

    for ($i = 1; $i <= 4; $i++) {
        $targetRaw = trim($data['target_tw'.$i] ?? '');
        $realisasiRaw = trim($data['realisasi_tw'.$i] ?? '');

        // skip TW kosong
        if ($targetRaw === '' || $realisasiRaw === '') {
            $data['persen_tw'.$i] = null;
            continue;
        }

        $target = floatval(str_replace(['%',','],'',$targetRaw));
        $realisasi = floatval(str_replace(['%',','],'',$realisasiRaw));

        // skip target <= 0
        if ($target <= 0) {
            $data['persen_tw'.$i] = null;
            continue;
        }

        // Persen TW
        $data['persen_tw'.$i] = round(($realisasi / $target) * 100, 2);

        // Akumulasi hanya TW valid
        $totalTargetTriwulan += $target;
        $totalRealisasiTriwulan += $realisasi;

        $totalTargetAkumulasi += $target;
        $totalRealisasiAkumulasi += $realisasi;

        $validTwCount++;
    }

    // Persen capaian triwulan = total realisasi / total target TW valid
    $data['persen_capaian'] = $totalTargetTriwulan == 0
        ? null
        : round(($totalRealisasiTriwulan / $totalTargetTriwulan) * 100, 2);

    // Persen capaian akumulasi = total realisasi / total target TW valid
    $data['persen_capaian_akumulasi'] = $totalTargetAkumulasi == 0
        ? null
        : round(($totalRealisasiAkumulasi / $totalTargetAkumulasi) * 100, 2);

    LaporanRenaksi::create($data);

    return redirect()->route('laporan-renaksi.index')
        ->with('success', 'Data berhasil ditambahkan.');
}


public function edit($id)
{
    $laporan = LaporanRenaksi::findOrFail($id);
    $topbarTitle = 'Edit Laporan Renaksi';
    $mode = 'form';
    $showActions = true;
    $categories = Category::all();
    $units = Unit::all();
    $capaianTriwulanByKategori = [];
    $laporanByKategori = [];

    // Panggil view form yang benar
    return view('apps.LaporanRenaksi', compact(
        'laporan',
        'topbarTitle',
        'mode',
        'showActions',
        'categories',
        'units',
        'capaianTriwulanByKategori',
        'laporanByKategori'
    ));
}

public function update(Request $request, $id)
{
    $laporan = LaporanRenaksi::findOrFail($id);

    $request->validate([
        'kategori' => 'required|exists:categories,id',
        'unit_id' => 'required|exists:units,id',
        'sasaran' => 'required|string',
        'indikator' => 'nullable|string',
        'target_tw1' => 'nullable|string',
        'target_tw2' => 'nullable|string',
        'target_tw3' => 'nullable|string',
        'target_tw4' => 'nullable|string',
        'realisasi_tw1' => 'nullable|string',
        'realisasi_tw2' => 'nullable|string',
        'realisasi_tw3' => 'nullable|string',
        'realisasi_tw4' => 'nullable|string',
    ]);

    $data = $request->all();
    $data['category_id'] = $data['kategori'];
    unset($data['kategori']);
    $data['unit_id'] = $request->unit_id;

    $totalTargetTriwulan = 0;
    $totalRealisasiTriwulan = 0;
    $totalTargetAkumulasi = 0;
    $totalRealisasiAkumulasi = 0;

    for ($i = 1; $i <= 4; $i++) {
        $targetRaw = trim($data['target_tw'.$i] ?? '');
        $realisasiRaw = trim($data['realisasi_tw'.$i] ?? '');

        if ($targetRaw === '' || $realisasiRaw === '') {
            $data['persen_tw'.$i] = null;
            continue;
        }

        $target = floatval(str_replace(['%',','],'',$targetRaw));
        $realisasi = floatval(str_replace(['%',','],'',$realisasiRaw));

        if ($target <= 0) {
            $data['persen_tw'.$i] = null;
            continue;
        }

        $data['persen_tw'.$i] = round(($realisasi / $target) * 100, 2);

        $totalTargetTriwulan += $target;
        $totalRealisasiTriwulan += $realisasi;
        $totalTargetAkumulasi += $target;
        $totalRealisasiAkumulasi += $realisasi;
    }

    $data['persen_capaian'] = $totalTargetTriwulan == 0
        ? null
        : round(($totalRealisasiTriwulan / $totalTargetTriwulan) * 100, 2);

    $data['persen_capaian_akumulasi'] = $totalTargetAkumulasi == 0
        ? null
        : round(($totalRealisasiAkumulasi / $totalTargetAkumulasi) * 100, 2);

    $laporan->update($data);

    return redirect()->route('laporan-renaksi.index')
        ->with('success', 'Data berhasil diperbarui.');
}


    public function destroy($id)
    {
        $laporan = LaporanRenaksi::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan-renaksi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
