@extends('layouts.app')

@push('cssnya')
<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pengunjung Hari Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <!-- {{$visitor_countToday}} -->
                                                26
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Pengunjung Bulan Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <!-- {{
                                                    $visitor_countMonth
                                                }} -->
                                                286
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <h2>Pengunjung Minggu Ini</h2>
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>

                    <!-- {{ __('You are logged in!') }} -->
                </div>



            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="js/chart.js/Chart.min.js"></script>
<script src="js/chart-area-demo.js"></script>
@endpush