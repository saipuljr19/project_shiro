@extends('dashboard.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5>Deteksi Jenis Ikan Koi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('detect-koi.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="fish_image" class="form-label">Unggah Foto Ikan Koi</label>
                    <input type="file" class="form-control" name="fish_image" id="fish_image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Deteksi</button>
            </form>
        </div>
    </div>
</div>
@endsection