@extends('dashboard.layouts.main')

@section('container')
    <style>
        .text-custom-red {
            color: #B8001F;
        }

        .icon-custom-red {
            color: #B8001F;
        }
    </style>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-temperature-low fa-2xl icon-custom-red"></i>
                    <div class="ms-3">
                        <p class="mb-2">Suhu Air</p>
                        <h6 class="mb-0"><span id="suhu">0</span> °C</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-water fa-2xl icon-custom-red"></i>
                    <div class="ms-3">
                        <p class="mb-2">TDS</p>
                        <h6 class="mb-0"><span id="kekeruhan">0</span> PPM</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-hand-holding-droplet fa-2xl icon-custom-red"></i>
                    <div class="ms-3">
                        <p class="mb-2">pH Air</p>
                        <h6 id="ph" class="mb-0">0</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Riwayat Monitoring Terbaru</h6>
                <a href="/dashboard/controls" class="text-custom-red">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-custom-red">
                            <th scope="col">Tanggal</th>
                            <th scope="col">Pukul</th>
                            <th scope="col">Suhu Air</th>
                            <th scope="col">TDS</th>
                            <th scope="col">pH Air</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($controls as $control)
                            <tr>
                                <td>{{ $control->created_at->format('d M Y') }}</td>
                                <td>{{ $control->created_at->format('H:i') }}</td>
                                <td>{{ $control->temperature }} °C</td>
                                <td>{{ $control->turbidity }} PPM</td>
                                <td>{{ $control->ph }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('dashboard.realtime')
@endsection
