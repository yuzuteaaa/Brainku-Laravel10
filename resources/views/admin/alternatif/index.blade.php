@extends('layoutDashboard')

@section('content')
    <div class="container-fluid">
        <div class="w-full py-4">
            <div class="card h-full w-full">
                <div class="card-header pb-0">
                    <h1 class="text-2xl mb-4 font-semibold text-gray-800">Daftar Alternatif</h1>
                    <div class="mt-6">
                        <a href="{{ route('alternatif.create') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            <button class="btn btn-primary" type="button">Tambah Alternatif</button>
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 px-4 py-3 rounded mb-4">
                            <strong class="font-bold">Success alert! Changed successfully</strong>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <strong class="font-bold">Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="p-4 text-sm font-semibold tracking-wide text-center">No</th>
                                    <th class="p-4 text-sm font-semibold tracking-wide text-center">Nama Alternatif</th>
                                    @foreach ($kriteria as $item)
                                        <th class="p-4 text-sm font-semibold tracking-wide text-center">
                                            {{ $item->nama_kriteria }}</th>
                                    @endforeach
                                    <th class="p-4 text-sm font-semibold tracking-wide text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($alternatives as $key => $item)
                                    <tr>
                                        <td class="border text-center px-4 py-2">{{ $no++ }}</td>
                                        <td class="border text-center px-4 py-2">{{ $item->nama_alternative }}</td>
                                        <td class="border text-center px-4 py-2">{{ $item->C1 }}</td>
                                        <td class="border text-center px-4 py-2">{{ $item->C2 }}</td>
                                        <td class="border text-center px-4 py-2">{{ $item->C3 }}</td>
                                        <td class="border text-center px-4 py-2">{{ $item->C4 }}</td>
                                        <td class="border text-center px-4 py-2">{{ $item->C5 }}</td>
                                        {{-- <td class="border text-center px-4 py-2">{{ $item->C6 }}</td> --}}
                                        <td class="border text-center px-4 py-2">
                                            <div class="flex justify-center gap-6">
                                                <a href="{{ route('alternatif.edit', $item->id) }}"
                                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('alternatif.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
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
@endsection
