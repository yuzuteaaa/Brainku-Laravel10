@extends('layoutDashboard')
@section('content')
    <div class="container mx-auto p-5 min-h-screen bg-gray-100">
        <h1 class="text-2xl mb-4 font-semibold text-gray-800">Edit Kriteria</h1>

        <div class="bg-white rounded-lg shadow-md p-6">

            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="kode_kriteria" class="block text-gray-700 font-bold mb-2">Kode Kriteria:</label>
                    <input type="text" name="kode_kriteria" id="kode_kriteria" value="{{ $kriteria->kode_kriteria }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="nama_kriteria" class="block text-gray-700 font-bold mb-2">Nama Kriteria:</label>
                    <input type="text" name="nama_kriteria" id="nama_kriteria" value="{{ $kriteria->nama_kriteria }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="bobot_kriteria" class="block text-gray-700 font-bold mb-2">Bobot Kriteria:</label>
                    <input type="number" step="any" name="bobot_kriteria" id="bobot_kriteria"
                        value="{{ $kriteria->bobot_kriteria }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-gray-700 font-bold mb-2">Type:</label>
                    <select name="type" id="type"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Benefit" {{ $kriteria->type == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="Cost" {{ $kriteria->type == 'Cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update
                    </button>
                    <a href="{{ route('kriteria.index') }}"
                        class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
