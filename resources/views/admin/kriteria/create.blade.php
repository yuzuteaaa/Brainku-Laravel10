@extends('layoutDashboard')
@section('content')
    <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
        <div class="w-full">
            <div class="card z-index-2 h-full w-full">
                <div class="card-header pb-0">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                                    <form action="{{ route('kriteria.store') }}" method="POST" class="space-y-4">
                                        @csrf

                                        <div>
                                            <label for="kode_kriteria" class="block font-medium text-sm text-gray-700">Kode
                                                Kriteria</label>
                                            <input type="text" name="kode_kriteria" id="kode_kriteria"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                                        </div>

                                        <div>
                                            <label for="nama_kriteria" class="block font-medium text-sm text-gray-700">Nama
                                                Kriteria</label>
                                            <input type="text" name="nama_kriteria" id="nama_kriteria"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                                        </div>

                                        <div>
                                            <label for="bobot_kriteria" class="block font-medium text-sm text-gray-700">Bobot Kriteria</label>
                                            <input type="number" step="0.01" name="bobot_kriteria" id="bobot_kriteria"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                                        </div>

                                        <div>
                                            <label for="type"
                                                class="block font-medium text-sm text-gray-700">Type</label>
                                            <select name="type" id="type"
                                                class="text-gray-700 text-sm rounded-lg block w-full p-2.5" required>
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="Benefit">Benefit</option>
                                                <option value="Const">Const</option>
                                            </select>
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Tambah Kriteria
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
