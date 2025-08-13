<?php
namespace App\Http\Controllers;

use App\Models\LaporanRenaksi;
use Illuminate\Http\Request;
use App\Services\LaporanRenaksiService;

class LaporanRenaksiController extends Controller
{
    public function index(Request $request)
    {
        if (
            $request->has('show_actions') &&
            filter_var($request->get('show_actions'), FILTER_VALIDATE_BOOLEAN) === false
        ) {
            return redirect()->route('root'); 
        }

        $mode = $request->get('mode', 'list');
        $showActions = true; 

        $topbarTitle = $mode === 'form' ? 'Tambah Laporan Renaksi' : 'Laporan Renaksi';

        if ($mode === 'form') {
            $laporan = new LaporanRenaksi();
            $capaianTriwulanByKategori = [];
            $laporanByKategori = [];
        } else {
            extract(LaporanRenaksiService::getDataByKategori());
            $laporan = collect();
        }

        return view('layouts-eg.horizontal', compact(
            'laporan',
            'topbarTitle',
            'mode',
            'capaianTriwulanByKategori',
            'laporanByKategori',
            'showActions'
        ));
    }

    public function create()
    {
        $topbarTitle = 'Tambah Laporan Renaksi';
        $mode = 'form';
        $showActions = true;

        $laporan = new LaporanRenaksi();
        $capaianTriwulanByKategori = [];
        $laporanByKategori = [];

        return view('layouts-eg.horizontal', compact(
            'laporan',
            'topbarTitle',
            'mode',
            'capaianTriwulanByKategori',
            'laporanByKategori',
            'showActions'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:A,B,C,D',
            'sasaran' => 'required|string',
            'indikator' => 'nullable|string',
        ]);

        LaporanRenaksi::create($request->all());

        return redirect()->route('laporan-renaksi.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laporan = LaporanRenaksi::findOrFail($id);
        $topbarTitle = 'Edit Laporan Renaksi';
        $mode = 'form';
        $showActions = true;
        $capaianTriwulanByKategori = [];
        $laporanByKategori = [];

        return view('layouts-eg.horizontal', compact(
            'laporan',
            'topbarTitle',
            'mode',
            'capaianTriwulanByKategori',
            'laporanByKategori',
            'showActions'
        ));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanRenaksi::findOrFail($id);
        $laporan->update($request->all());

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

