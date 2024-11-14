@extends('dashboard.layouts.main')

@section('content')
    <div class="container mt-4">
        <style>
            .custom-red-bg {
                background-color: #B8001F !important;
                color: white !important;
            }

            .custom-red-btn {
                background-color: #B8001F !important;
                border-color: #B8001F !important;
                color: white !important;
            }
        </style>
        <div class="card shadow-sm">
            <div class="card-header custom-red-bg">
                <h5 class="text-white">Deteksi Jenis Ikan Koi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('detect-koi.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="fish_image" class="form-label">Unggah Foto Ikan Koi</label>
                        <input type="file" class="form-control" name="fish_image" id="fish_image" accept="image/*"
                            required>
                    </div>
                    <button type="submit" class="btn custom-red-btn w-100">Deteksi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
