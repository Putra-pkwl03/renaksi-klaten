<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanRenaksi;
use App\Services\LaporanRenaksiService;

class RoutingController extends Controller
{
    

      public function index(Request $request)
    {
        extract(LaporanRenaksiService::getDataByKategori());

        $topbarTitle = 'Reports Table';
        $laporan = collect();
        $mode = 'list';
        $showActions = false; 

        return view('apps.LaporanRenaksi', compact(
            'laporan',
            'laporanByKategori',
            'capaianTriwulanByKategori',
            'topbarTitle',
            'mode',
            'showActions'
        ));
    }



    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root(Request $request, $first)
    {
        return view($first);
    }

    /**
     * second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {
        return view($first . '.' . $second);
    }

    /**
     * third level route
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {
        return view($first . '.' . $second . '.' . $third);
    }
}
