@extends('layoutDashboard')

@section('content')
    <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
        <div class="w-full">
            <div class="card z-index-2 h-full w-full">
                <div class="card-header pb-0">
                    <!-- Tabel Utama -->
                    <div class="bg-white mb-6 shadow-md overflow-hidden sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">NO</th>
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">NAMA ALTERNATIF</th>
                                        @foreach ($kriterias as $kriteria)
                                            <th class="p-4 text-sm font-semibold tracking-wide text-center">
                                                {{ $kriteria->nama_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($alternatifs as $key => $item)
                                        <tr x-data="{ showModal: false }">
                                            <td class="border text-center px-4 py-2">{{ $no++ }}</td>
                                            <td class="border text-center px-4 py-2">{{ $item->nama_alternative }}</td>
                                            <td class="border text-center px-4 py-2">{{ $item->C1 }}</td>
                                            <td class="border text-center px-4 py-2">{{ $item->C2 }}</td>
                                            <td class="border text-center px-4 py-2">{{ $item->C3 }}</td>
                                            <td class="border text-center px-4 py-2">{{ $item->C4 }}</td>
                                            <td class="border text-center px-4 py-2">{{ $item->C5 }}</td>
                                            <td class="border text-center px-4 py-2">{{ $item->C6 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
        <div class="w-full">
            <div class="card z-index-2 h-full w-full">
                <div class="card-header pb-0">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Bobot -->
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 overflow-y-auto">
                                <h3 class="text-xl font-semibold text-gray-800 leading-tight mb-4">Bobot</h3>
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            @foreach ($kriterias as $kriteria)
                                                <th class="p-4 text-sm font-semibold tracking-wide text-center">
                                                    {{ $kriteria->nama_kriteria }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($kriterias as $kriteria)
                                                <td class="border text-center px-4 py-2">{{ $kriteria->bobot_kriteria }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
            <div class="w-full">
                <div class="card z-index-2 h-full w-full">
                    <div class="card-header pb-0">
                        <!-- Normalisasi -->
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 overflow-x-auto">
                                <h3 class="text-xl font-semibold text-gray-800 leading-tight mb-4">Normalisasi</h3>
                                <div class="bg-white mb-6 shadow-md overflow-hidden sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">
                                        <table class="w-full table-auto">
                                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                                <tr>
                                                    <th class="p-4 text-sm font-semibold tracking-wide text-center">NAMA ALTERNATIF</th>
                                                    @foreach ($kriterias as $kriteria)
                                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">
                                                            {{ $kriteria->nama_kriteria }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($alternatifs as $alternatif)
                                                    <tr>
                                                        <td class="border text-center px-4 py-2">
                                                            {{ $alternatif->nama_alternative }}</td>
                                                        @foreach ($kriterias as $kriteria)
                                                            <td class="border text-center px-4 py-2">
                                                                {{ $alternatifValues[$alternatif->id][$kriteria->kode_kriteria] }}
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
            <div class="w-full">
                <div class="card z-index-2 h-full w-full">
                    <div class="card-header pb-0">
                        <!-- Hasil Perhitungan SAW -->
                        <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
                            <div class="w-full">
                                <div
                                    class="card z-index-2 h-full w-full bg-white mb-6 shadow-md overflow-hidden sm:rounded-lg">
                                    <div class="card-header pb-0 p-6 bg-white border-b border-gray-200 overflow-x-auto">
                                        <!-- Hasil Perhitungan SAW -->
                                        <h3 class="text-xl font-semibold text-gray-800 leading-tight mb-4">Hasil Perhitungan
                                            SAW</h3>
                                        <table class="w-full table-auto">
                                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                                <tr>
                                                    <th class="p-4 text-sm font-semibold tracking-wide text-center">Nama
                                                        Alternatif</th>
                                                    <th class="p-4 text-sm font-semibold tracking-wide text-center">Nilai
                                                        SAW</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ValueSAW as $id => $nilaiSAW)
                                                    <tr>
                                                        <td class="border text-center px-4 py-2">
                                                            {{ $alternatifs->find($id)->nama_alternative }}</td>
                                                        <td class="border text-center px-4 py-2">{{ $nilaiSAW }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
