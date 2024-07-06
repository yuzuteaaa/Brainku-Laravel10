@extends('layoutDashboard')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('alternatif.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="nama_alternative" class="block font-medium text-sm text-gray-700">Nama
                                Alternatif</label>
                            <input type="text" name="nama_alternative" id="nama_alternative"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <!-- <div>
                            <label for="C1" class="block font-medium text-sm text-gray-700">C1</label>
                            <input type="number" name="C1" id="C1"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div>
                            <label for="C2" class="block font-medium text-sm text-gray-700">C2</label>
                            <input type="number" name="C2" id="C2"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div>
                            <label for="C3" class="block font-medium text-sm text-gray-700">C3</label>
                            <input type="number" name="C3" id="C3"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div>
                            <label for="C4" class="block font-medium text-sm text-gray-700">C4</label>
                            <input type="number" name="C4" id="C4"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div>
                            <label for="C5" class="block font-medium text-sm text-gray-700">C5</label>
                            <input type="number" name="C5" id="C5"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div> -->

                        @foreach ($kriteria as $k)
                            <div>
                                <label for="{{ $k->kode_kriteria }}" class="block font-medium text-sm text-gray-700">
                                    {{ 'C' . $loop->index + 1 . '-' . $k->nama_kriteria }}
                                </label>
                                <input type="text" name="{{ 'C' . $loop->index + 1 }}" id="{{ 'C' . $loop->index + 1 }}"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>
                        @endforeach


                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Tambah Alternatif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
