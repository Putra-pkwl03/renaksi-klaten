<div class="card">
    @if($showActions)
        <div class="m-3 d-flex justify-content-end align-items-center">
            <a href="{{ route('laporan-renaksi.index', ['mode' => 'form']) }}" class="btn btn-primary rounded-pill">
                <i class="bi bi-plus-circle me-2"></i> Add
            </a>
        </div>
    @else
        <div class="pt-3"></div>
    @endif

    <div class="mx-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="table-responsive">
            @foreach($laporanByKategori as $kategori => $laporans)
                <table class="table mb-4 align-middle table-bordered table-hover">
                    <thead>
                        <tr style="background-color:#efd684; font-weight:bold;">
                            <th colspan="{{ $showActions ? 19 : 18 }}" style="font-size:14px; color: black;">
                                {{ $kategori }}
                            </th>
                        </tr>
                        <tr style="text-align:center; font-size: 11px;">
                            <th rowspan="2">NO.</th>
                            <th rowspan="2">SASARAN</th>
                            <th rowspan="2">INDIKATOR</th>
                            <th colspan="4">TARGET SASARAN</th>
                            <th colspan="4">REALISASI</th>
                            <th style="background-color:#fffd6e;">% Capaian</th>
                            <th style="background-color:#fffd6e;">% Capaian</th>
                            <th rowspan="2">CATATAN HASIL MONITORING<br>RENCANA AKSI</th>
                            <th rowspan="2">TINDAK LANJUT</th>
                            @if($showActions)
                                <th rowspan="2" style="width: 70px;">Aksi</th>
                            @endif
                        </tr>
                        <tr style="text-align:center; font-size: 11px;">
                            <th>TW I</th>
                            <th>TW II</th>
                            <th>TW III</th>
                            <th>TW IV</th>
                            <th>TW I</th>
                            <th>TW II</th>
                            <th>TW III</th>
                            <th>TW IV</th>
                            <th style="background-color:#fffd6e;">
                                Triwulan <span style="color: red;">{{ $capaianTriwulanByKategori[$kategori] ?? '' }}</span>
                            </th>
                            <th style="background-color:#fffd6e;">
                                Akumulasi S/D Triwulan <span style="color: red;">{{ $capaianTriwulanByKategori[$kategori] ?? '' }}</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporans as $index => $row)
                            <tr style="font-size: 11px;">
                                <td>{{ ($laporans->currentPage() - 1) * $laporans->perPage() + $index + 1 }}</td>
                                <td style="background-color:#a5d39b;">{{ $row->sasaran }}</td>
                                <td style="background-color:#a7d0f3;">{{ $row->indikator }}</td>
                                <td style="background-color:#a7d0f3;">{{ $row->target_tw1 }}</td>
                                <td style="background-color:#a7d0f3;">{{ $row->target_tw2 }}</td>
                                <td style="background-color:#a7d0f3;">{{ $row->target_tw3 }}</td>
                                <td style="background-color:#a7d0f3;">{{ $row->target_tw4 }}</td>
                                <td style="background-color:#b59cc7;">{{ $row->realisasi_tw1 }}</td>
                                <td style="background-color:#b59cc7;">{{ $row->realisasi_tw2 }}</td>
                                <td style="background-color:#b59cc7;">{{ $row->realisasi_tw3 }}</td>
                                <td style="background-color:#b59cc7;">{{ $row->realisasi_tw4 }}</td>
                                <td style="background-color:#fffd6e;">{{ $row->persen_capaian }}%</td>
                                <td style="background-color:#fffd6e;">{{ $row->persen_capaian_akumulasi }}%</td>

                                <td>{{ $row->catatan_hasil_monitoring }}</td>
                                <td>{{ $row->tindak_lanjut }}</td>
                                @if($showActions)
                                    <td class="text-center">
                                        <a href="{{ route('laporan-renaksi.edit', $row->id) }}" class="btn btn-warning btn-sm me-1 mb-1" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm me-1" title="Delete"
                                           data-bs-toggle="modal"
                                           data-bs-target="#deleteModal"
                                           data-url="{{ route('laporan-renaksi.destroy', $row->id) }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $showActions ? 19 : 18 }}" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-2 d-flex justify-content-end align-items-center">
                    {{ $laporans->links('pagination::bootstrap-5') }}
                </div>
            @endforeach
        </div>
    </div>
</div>
