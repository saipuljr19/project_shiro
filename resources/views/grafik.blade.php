@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <h6 class="mb-4">Grafik Monitoring</h6>
            <form action="/dashboard/monitoring" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="col-md-4">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="col-md-4">
                        <label for="submit" class="form-label">&nbsp;</label>
                        <button type="submit" class="btn w-100" style="background-color: #384B70; color: white; border: none;">Tampilkan Grafik</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($monitoringData))
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <h6 class="mb-4">Grafik Monitoring</h6>
                <canvas id="monitoringChart"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('monitoringChart').getContext('2d');

            const labels = @json(array_keys($monitoringData)); // Labels dari data waktu
            const suhuData = @json(array_column($monitoringData, 'temperature'));
            const tdsData = @json(array_column($monitoringData, 'turbidity'));
            const phData = @json(array_column($monitoringData, 'ph'));

            const monitoringChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Suhu Air (°C)',
                            data: suhuData,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            fill: false,
                        },
                        {
                            label: 'TDS (PPM)',
                            data: tdsData,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            fill: false,
                        },
                        {
                            label: 'pH Air',
                            data: phData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: false,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Waktu',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nilai',
                            },
                        },
                    },
                },
            });
        </script>
    @endif
@endsection
