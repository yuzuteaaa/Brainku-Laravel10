@extends('layoutDashboard')

@section('content')
    <div class="container-fluid h-screen w-screen py-4 flex items-stretch">
        <div class="w-full">
            <div class="card z-index-2 h-full w-full">
                <div class="card-header pb-0">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

