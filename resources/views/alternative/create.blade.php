@extends('layoutDashboard')

@section('content')
    <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
        <div class="w-full">
            <div class="card z-index-2 h-full w-full">
                <div class="card-header pb-0">
                    <h1 class="mb-0">Add Alternatif</h1>
                    <hr />
                    <form action="{{ route('alternative.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="code_alternative" class="form-control"
                                    placeholder="Kode Alternatif">
                            </div>
                            <div class="col">
                                <input type="text" name="nama" class="form-control" placeholder="Nama">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body p-3 flex items-center justify-center">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas h-full w-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
