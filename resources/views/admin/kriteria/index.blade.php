@extends('layoutDashboard')

@section('content')
    <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
        <div class="w-full">
            <div class="card z-index-2 h-full w-full">
                <div class="card-header pb-0">
                    <div class="container mx-auto p-5 min-h-screen bg-gray-100">
                        <h1 class="text-2xl mb-4 font-semibold text-gray-800">Daftar Kriteria</h1>
                        <div class="mt-6">
                            <a href="{{route('kriteria.create')}}"
                                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                 <button class="btn btn-primary" type="button">Tambah Kriteria</button>
                            </a>
                        </div>
                        @if (session('success'))
                            <div class="bg-green-100 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Success alert! Changed successfully</strong>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                role="alert">
                                <strong class="font-bold">Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mt-6 bg-white rounded-lg shadow-md overflow-y-auto">
                            <table class="w-full min-w-full table-auto">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">Kode kriteria</th>
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">Nama kriteria</th>
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">Bobot kriteria</th>
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">Type</th>
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $kriterias)
                                        <tr class="bg-white even:bg-gray-50" x-data="{ showModal: false }">
                                            <td class="p-4 text-sm border text-gray-700">{{ $kriterias->kode_kriteria }}
                                            </td>
                                            <td class="p-4 text-sm border text-gray-700">{{ $kriterias->nama_kriteria }}
                                            </td>
                                            <td class="p-4 text-sm border text-gray-700">{{ $kriterias->bobot_kriteria }}
                                            </td>
                                            <td class="p-4 text-sm border text-gray-700">{{ $kriterias->type }}</td>
                                            <td class="p-4 text-sm border text-gray-700">
                                                <div class="flex justify-center gap-4">
                                                    <a href="{{ route('kriteria.edit', $kriterias->id) }}"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    <button @click="showModal"=true
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                    <div x-show="showModal" x-cloak
                                                        class="fixed z-10 inset-0 overflow-y-auto"
                                                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                        <div
                                                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                                aria-hidden="true"></div>
                                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                                aria-hidden="true">&#8203;</span>
                                                            <div x-show="showModal" x-cloak
                                                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                                                role="dialog" aria-modal="true"
                                                                aria-labelledby="modal-headline">
                                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                    <div class="sm:flex sm:items-start">
                                                                        <div
                                                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                            <svg class="h-6 w-6 text-red-600"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke="currentColor" aria-hidden="true">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M12 9v2m0 4h.01m-6.938-7.276a2.5 2.5 0 110 3.536 2.5 2.5 0 010-3.536zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                            </svg>
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                            <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                                                id="modal-headline">
                                                                                Hapus Kriteria
                                                                            </h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">
                                                                                    Apakah Anda yakin ingin menghapus
                                                                                    Kriteria ini?
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-4">
                                                                    <form
                                                                        action="{{ route('kriteria.destroy', $kriterias->id) }}"
                                                                        method="POST" class="inline-block">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                                            Hapus
                                                                        </button>
                                                                    </form>
                                                                    <button
                                                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded ml-2 sm:ml-0">
                                                                        Batal
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
@endsection


