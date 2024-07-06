@extends('layoutDashboard')
@section('content')
<div class="container mx-auto p-5 min-h-screen bg-gray-100">
    <h1 class="text-2xl mb-4 font-semibold text-gray-800">Edit Alternatif</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alternatif.update', $alternatives->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_supplier" class="block text-gray-700 text-sm font-bold mb-2">Nama Supplier:</label>
            <input type="text" name="nama_supplier" id="nama_supplier" value="{{ $alternatives->nama_supplier }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="C1" class="block text-gray-700 text-sm font-bold mb-2">C1:</label>
            <input type="text" name="C1" id="C1" value="{{ $alternatives->C1 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="C2" class="block text-gray-700 text-sm font-bold mb-2">C2:</label>
            <input type="text" name="C2" id="C2" value="{{ $alternatives->C2 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="C3" class="block text-gray-700 text-sm font-bold mb-2">C3:</label>
            <input type="text" name="C3" id="C3" value="{{ $alternatives->C3 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="C4" class="block text-gray-700 text-sm font-bold mb-2">C4:</label>
            <input type="text" name="C4" id="C4" value="{{ $alternatives->C4 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="C5" class="block text-gray-700 text-sm font-bold mb-2">C5:</label>
            <input type="text" name="C5" id="C5" value="{{ $alternatives->C5 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update
            </button>
        </div>
    </form>
</div>  
@endsection
