<?php

namespace App\Http\Controllers;

use App\Models\KoiDetection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KoiDetectionController extends Controller
{
    public function showForm()
    {
        return view('detect_koi', [
            'title' => 'Deteksi Jenis Ikan Koi'
        ]);
    }

    public function detect(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'fish_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar ke dalam folder storage atau proses deteksi jenis ikan koi
        if ($request->hasFile('fish_image')) {
            // Menyimpan gambar
            $path = $request->file('fish_image')->store('koi_images', 'public');

            // Misalnya, jika Anda menggunakan machine learning, Anda dapat memproses gambar di sini.
            // Contoh proses deteksi (sesuaikan dengan logika deteksi jenis ikan koi Anda)
            // $result = $this->detectKoiType($path);

            // Simpan hasil deteksi ke database jika diperlukan
            $detection = new KoiDetection();
            $detection->image_path = $path;
            // $detection->type = $result['type']; // Hasil dari deteksi jika ada
            $detection->save();

            return redirect()->back()->with('success', 'Deteksi jenis ikan koi berhasil.');
        }

        return redirect()->back()->with('error', 'Gagal mendeteksi jenis ikan koi.');
    }

    // Contoh fungsi untuk mendeteksi jenis ikan koi dengan machine learning (opsional)
    // private function detectKoiType($imagePath)
    // {
    //     // Logika untuk deteksi menggunakan model machine learning
    //     // Kirim gambar ke model dan dapatkan hasil
    //     return [
    //         'type' => 'Contoh Jenis Koi',
    //     ];
    // }
}