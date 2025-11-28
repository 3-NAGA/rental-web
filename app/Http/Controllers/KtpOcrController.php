<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Http\Request;

class KtpOcrController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'ktp' => 'required|image|max:5000',
        ]);

        // Simpan file sementara
        $path = $request->file('ktp')->store('ktp_uploads');

        // Google Vision OCR
        $imageAnnotator = new ImageAnnotatorClient([
            'credentials' => base_path(env('GOOGLE_APPLICATION_CREDENTIALS')),
        ]);

        $image = file_get_contents(storage_path('app/' . $path));
        $response = $imageAnnotator->textDetection($image);
        $text = $response->getTextAnnotations()[0]?->getDescription() ?? '';

        $imageAnnotator->close();

        // Parsing hasil OCR
        $parsed = $this->parseKtp($text);

        return response()->json([
            'raw_text' => $text,
            'parsed' => $parsed
        ]);
    }

    private function parseKtp($text)
    {
        $clean = strtoupper($text);

        // NIK
        preg_match('/\b\d{16}\b/', $clean, $nik);

        // Nama
        preg_match('/NAMA\s*:?([A-Z ]+)/', $clean, $nama);
        // Fallback Nama (baris setelah kata NIK)
        if (!isset($nama[1])) {
            preg_match('/\bNIK\b.*?\n([A-Z ]+)/', $clean, $nama);
        }

        // Tempat & Tanggal Lahir
        preg_match('/TEMPAT\/TGL LAHIR\s*:?([A-Z ]+),\s*(\d{2}-\d{2}-\d{4})/', $clean, $ttl);

        // Jenis Kelamin
        preg_match('/JENIS KELAMIN\s*:?([A-Z ]+)/', $clean, $gender);

        // Alamat
        preg_match('/ALAMAT\s*:?([A-Z0-9 .,\/-]+)/', $clean, $alamat);

        // RT/RW
        preg_match('/RT\/RW\s*:?([0-9]{3}\/[0-9]{3})/', $clean, $rtrw);

        return [
            'nik' => $nik[0] ?? null,
            'nama' => trim($nama[1] ?? null),
            'tempat_lahir' => trim($ttl[1] ?? null),
            'tanggal_lahir' => $ttl[2] ?? null,
            'jenis_kelamin' => trim($gender[1] ?? null),
            'alamat' => trim($alamat[1] ?? null),
            'rt_rw' => $rtrw[1] ?? null,
        ];
    }
}