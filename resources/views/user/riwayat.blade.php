@extends('layouts.user.main')
@section('title', 'Riwayat Pembelian')

@section('subtitle')
  <p class="text-subtitle text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora labore ducimus pariatur, at modi sit voluptatibus fuga neque quo doloremque!</p>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
    <div class="col-4">Data @yield('title')</div>
    </div>
  </div>
  <div class="card-body">
      <table class="table table-striped" id="table1">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Nama Paket</th>
                  <th>Harga</th>
                  <th>Tanggal Beli</th>
              </tr>
          </thead>
          <tbody>
              @php $no=1; @endphp
              @foreach($riwayat as $p)
              <tr>
                  <td class="text-center">{{ $no++ }}</td>
                  <td>{{ $p->inv_name }}</td>
                  <td>{{ $p->pakets->nama }}</td>
                  <td>{{ rupiah($p->total) }}</td>
                  <td>{{ $p->created_at }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection