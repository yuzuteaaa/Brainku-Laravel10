@extends('layoutDashboard')

@section('content')
    <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
        <div class="w-full">
            <div class="card z-index-2 h-full w-full">
                <div class="card-header pb-0">
                    {{-- <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Alternatif</h1>
                        <a href="{{route('alternative.create')}}" class="btn btn-primary"
                            style="background-color: #526D82">add Alternatif</a>
                    </div> --}}
                    <hr />
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table text-white" style="background-color: #526D82">
                            <tr>
                                <th>No</th>
                                <th>Kode Criteria</th>
                                <th>Nama Criteria</th>
                                <th>Bobot</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($criteria  ->count() > 0)
                                @foreach ($criteria  as $rs)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $rs->code_criteria }}</td>
                                        <td class="align-middle">{{ $rs->criteria }}</td>
                                        <td class="align-middle">{{ $rs->weight }}</td>
                                        <td class="align-middle">{{ $rs->type }}</td>
                                        {{-- <td class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="#" type="button" class="btn text-white"
                                                    style="background-color: rgb(92, 105, 188)">Detail</a>
                                                <a href="#" type="button" class="btn text-white"
                                                    style="background-color: mediumslateblue">Edit</a>
                                                {{-- <form action="#" method="POST" type="button" class="btn p-0"
                                                    style="background-color: burlywood"
                                                    onsubmit="return confirm('Delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger m-0">Delete</button>
                                                </form> --}}
                                            {{-- </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">Alternatif not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
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
