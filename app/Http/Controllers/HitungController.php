<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function SAWGANK(Request $request)
    {
        // Mendapatkan bobot dari kriteria
        $kriterias = Kriteria::orderby('id', 'asc')->get();

        // Mendapatkan semua alternatif
        $alternatifs = Alternative::orderBy('nama_alternative', 'asc')->get();

        // Mendapatkan nilai minimal dan maksimal untuk setiap kriteria
        $minMaxValues = [];
        foreach ($kriterias as $kriteria) {
            $kode = $kriteria->kode_kriteria;
            $minMaxValues[$kode]['min'] = Alternative::min($kode);
            $minMaxValues[$kode]['max'] = Alternative::max($kode);
        }

        // Mendapatkan nilai normalisasi dari semua kriteria untuk setiap alternatif
        $alternatifValues = [];
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $kode = $kriteria->kode_kriteria;
                $type = $kriteria->type;
                $min = $minMaxValues[$kode]['min'];
                $max = $minMaxValues[$kode]['max'];
        
                if ($type == 'Benefit') {
                    $alternatifValues[$alternatif->id][$kode] = $max != 0 ? $alternatif->$kode / $max : 0;
                } else if ($type == 'Const') {
                    $alternatifValues[$alternatif->id][$kode] = $min != 0 ? $min / $alternatif->$kode : 0;
                }
            }
        }
        


        // Normalisasi bobot kriteria
        $totalBobot = $kriterias->sum('bobot_kriteria');
        $normalizedWeights = $kriterias->mapWithKeys(function ($item) use ($totalBobot) {
            return [$item->kode_kriteria => $item->bobot_kriteria / $totalBobot];
        });

        // Mendapatkan nilai WP untuk setiap alternatif
        $ValueSAW = [];
        foreach ($alternatifs as $alternatif) {
            $wp = 1;
            foreach ($kriterias as $kriteria) {
                $kode = $kriteria->kode_kriteria;
                $wp *= pow($alternatifValues[$alternatif->id][$kode], $normalizedWeights[$kode]);
            }
            $ValueSAW[$alternatif->id] = $wp;
        }

        // Mengurutkan alternatif berdasarkan nilai WP tertinggi ke terendah
        arsort($ValueSAW);

        // Kirim data ke view
        return view('admin.hitung', compact('ValueSAW', 'alternatifs', 'kriterias', 'alternatifValues'));
    }
}
