@extends('../../layouts.main')
@section('title', 'Paket')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
@endsection

@section('subtitle')
  <p class="text-subtitle text-muted">Data seluruh @yield('title')</p>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row justify-content-between">
    <div class="col-4">Data @yield('title')</div>
    <div class="col-4">
        <button class="btn btn-outline-success float-end" id="addProd" data-bs-toggle="modal" data-bs-target="#tambahPaket">Tambah @yield('title')</button>
    </div>
    </div>
  </div>
  <div class="card-body">
      <table class="table table-striped" id="table1">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Paket</th>
                  <th>Harga</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @php $no=1; @endphp
              @foreach($pakets as $p)
              <tr>
                  <td class="text-center">{{ $no++ }}</td>
                  <td>{{ $p->nama }}</td>
                  <td>{{ rupiah($p->harga) }}</td>
                  <td class="text-center">
                    <form method="POST" action="{{ route('paket.destroy', $p->id) }}" data-name="{{$p->nama}}" id="formDelete">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <a href="{{ route('paket.show', $p->id) }}" class="btn iconcustom btn-success"><i class="bi bi-info-circle-fill"></i></a>
                      <button type="button" id="editProd" class="btn iconcustom btn-primary" data-id="{{$p->id}}" data-bs-toggle="modal" data-bs-target="#editPaket"><i class="bi bi-pencil-square"></i></button>
                      <button type="button" id="deleteProd" class="btn iconcustom btn-danger" data-toggle="tooltip" title='Delete'><i class="bi bi-trash-fill"></i></button>
                    </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
<!-- Modal Tambah Paket -->
<div class="modal fade text-left" id="tambahPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Add New Paket</h5>
            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <form class="form form-horizontal" id="formAddPaket" action="{{route('paket.store')}}" method="POST">
          @csrf
            <div class="modal-body">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Nama paket</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" name="nama" class="form-control" placeholder="Nama paket" autocomplete="off" required/>
                  </div>
                  <div class="col-md-4">
                    <label>Harga</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="number" name="harga" class="form-control" placeholder="Harga" autocomplete="off" required/>
                  </div>
                  <div class="col-md-4">
                    <label>Deskripsi</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <textarea style="resize: none;" rows="5" name="deskripsi" class="form-control" placeholder="Deskripsi paket" autocomplete="off" required ></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Batal</span>
              </button>
              <button type="submit" class="btn btn-primary ml-1" id="btnTambah">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Tambah</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

<!-- Modal Edit Paket -->
<div class="modal fade text-left" id="editPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Edit Paket</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form class="form form-horizontal" id="formEditPaket" method="POST">
        @csrf
        @method('PUT')
          <div class="modal-body">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <label>Nama paket</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" id="editNamaPaket" name="nama" class="form-control" placeholder="Nama paket" autocomplete="off" required/>
                </div>
                <div class="col-md-4">
                  <label>Harga</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="number" id="editHargaPaket" name="harga" class="form-control" placeholder="Harga" autocomplete="off" required/>
                </div>
                <div class="col-md-4">
                  <label>Deskripsi</label>
                </div>
                <div class="col-md-8 form-group">
                  <textarea style="resize: none;" id="editDeskripsi" rows="5" name="deskripsi" class="form-control" placeholder="Deskripsi paket" autocomplete="off" required ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Batal</span>
            </button>
            <button type="submit" class="btn btn-primary ml-1" id="btnTambah">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Simpan</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('utils')
<script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>

<script>
  $(document).ready(function () {

    $('table').on('click', '#deleteProd', function(e){
        Swal.fire({
          title: 'Yakin?',
          html: `Apakah anda yakin akan menghapus paket <b>${e.currentTarget.parentNode.getAttribute("data-name")}</b>?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, hapus paket!'
        }).then((result) => {
          if (result.isConfirmed) {
            e.currentTarget.parentNode.submit()
          }
        })
    })

  $('body').on('click', '#editProd', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
  
    $.get('/admin/paket/' + id + '/edit', function (data) {
      $("#formEditPaket").attr('action', 'http://127.0.0.1:8000/admin/paket/' + id)
        $('#editNamaPaket').val(data[0].nama)//.prop('disabled', true);
        $('#editHargaPaket').val(data[0].harga);
        $('#editDeskripsi').val(data[0].deskripsi);
    })

  });

}); 
</script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<script>

  document.getElementById('formAddPaket').addEventListener('submit', (e) => {
    const btn = document.querySelector('#btnTambah');
    btn.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Processing...`;
    btn.setAttribute('disabled', '');
  });

</script>

@if(session()->has('success'))
<script>
  Toastify({
      text: "{{ session()->get('success') }}",
      duration: 3000,
      backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
  }).showToast();
</script>
@elseif(session()->has('error'))
<script>
  Toastify({
      text: "{{ session()->get('error') }}",
      duration: 3000,
      backgroundColor: "linear-gradient(to right, #de0b0b, #e6c732)",
  }).showToast();
</script>
@endif

@endsection