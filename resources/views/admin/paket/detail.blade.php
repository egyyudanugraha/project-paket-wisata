@extends('layouts.main')
@section('title', 'Detail Paket')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('subtitle')
  <p class="text-subtitle text-muted">@yield('title')</p>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
      <table class="table mb-0 table-lg">
            <tbody>
                <tr>
                    <th class="text-bold-500" style="width: 200px;">Nama Paket</th>
                    <td>: {{$paket[0]->nama}}</td>
                </tr>
                <tr>
                    <th class="text-bold-500" style="width: 200px;">Harga</th>
                    <td>: {{rupiah($paket[0]->harga)}}</td>
                </tr>
                <tr>
                    <th class="text-bold-500" style="width: 200px;">Deskripsi</th>
                    <td>: {{$paket[0]->deskripsi}}</td>
                </tr>
            </tbody>
        </table>
  </div>
  <div class="card-body">
      <table class="table table-striped" id="table1">
          <thead>
              <tr>
                  <th style="width: 50px;">No</th>
                  <th>Wisata</th>
                  <th>Deskripsi</th>
              </tr>
          </thead>
          <tbody>
              @php $no=1; @endphp
              @foreach($paket[0]->places as $i)
              <tr>
                  <td class="text-center">{{ $no++ }}</td>
                  <td><a href="{{ route('place.show', $i->id) }}">{{ $i->nama }}</a></td>
                  <td>{{ $i->deskripsi }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
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
