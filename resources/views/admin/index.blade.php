@extends('layouts.main')
@section('title', 'Dashboard')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon purple">
                            <i class="iconly-boldLocation"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Wisata</h6>
                        <h6 class="font-extrabold mb-0"><a href="{{ route('place.index') }}" class="badge bg-{{ ($places < 1 ) ? 'danger' : (($places < 5) ? 'warning' : 'primary') }}">{{ $places }} Wisata</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="iconly-boldDiscovery"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Paket Wisata</h6>
                        <h6 class="font-extrabold mb-0"><a href="{{ route('paket.index') }}" class="badge bg-success">{{ count($pakets) }} Paket</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon green">
                            <i class="iconly-boldDocument"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Paket Terjual</h6>
                        <h6 class="font-extrabold mb-0"><span class="badge bg-secondary">{{ $invoices }} Paket</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Wisata berdasarkan paket</h4>
            </div>
            <div class="card-body">
                <!-- <div id="chart-profile-visit"></div> -->
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Paket Wisata</th>
                            <th>Lokasi</th>
                            <th>Wisata</th>
                            <th>Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($pakets as $p)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td><a href="{{ route('paket.show', $p->id) }}">{{ $p->nama }}</a></td>
                            <td><span>{{ count($p->places) }} Lokasi</span></td>
                            <td>
                                @if(count($p->places) == 0)
                                    <i>Tidak ada wisata</i>
                                @else
                                <ul class="ulcustom">
                                    @foreach($p->places as $r)
                                        <li>
                                            <a href="{{ route('place.show', $r->id) }}">{{ $r->nama }}</a>
                                        </li>
                                        @if( $loop->iteration == 3)
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ (count($p->invoices) < 1) ? 'danger' : ((count($p->invoices) < 3) ? 'warning' : 'success') }}">{{ count($p->invoices) }} Paket</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('utils')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection