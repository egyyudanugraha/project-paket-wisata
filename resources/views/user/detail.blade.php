@extends('layouts.user.main')
@section('title', 'Detail paket')

@section('subtitle')
  <p class="text-subtitle text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora labore ducimus pariatur, at modi sit voluptatibus fuga neque quo doloremque!</p>
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
                    <th class="text-bold-500" style="width: 200px;">Lokasi wisata</th>
                    <td>: {{ count($paket[0]->places)}} Lokasi</td>
                </tr>
                <tr>
                    <th class="text-bold-500" style="width: 200px;">Harga</th>
                    <td>: {{rupiah($paket[0]->harga)}}</td>
                </tr>
                <tr>
                    <th class="text-bold-500" style="width: 200px;">Deskripsi paket</th>
                    <td>: {{$paket[0]->deskripsi}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-center">
          <button id="btnBeli" class="btn btn-primary btn-beli">BELI TIKET</button>
      </div>
  </div>
</div>

<form action="{{ route('beli') }}" method="post" hidden>
    @csrf
    <input type="text" id="inv_name" name="inv_name" value=""/>
    <input type="text" id="user_id" name="user_id" value="{{ auth()->user()->id }}"/>
    <input type="text" id="paket_id" name="paket_id" value="{{$paket[0]->id}}"/>
    <input type="text" id="total" name="total" value="{{$paket[0]->harga}}"/>
</form>

<div class="page-heading">
    <h3>Wisata yang akan dikunjungi</h3>
</div>
<div class="row">
@foreach($paket[0]->places as $p)
<div class="col-xl-4 col-md-6 col-sm-12">
    <div class="card">
        <div class="card-content">
        
        <img src="{{asset('assets/images/samples')}}/@php echo rand(1,5) @endphp.jpg" class="card-img-top img-fluid" alt="singleminded">
            <div class="card-body">
                <h5 class="card-title">{{ $p->nama }}</h5>
                <p class="card-text">{{ $p->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        $('.card-body').on('click', '#btnBeli', function(e){
            Swal.fire({
            title: 'Yakin?',
            html: `Kamu yakin akan beli paket ini?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, beli paket!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#inv_name').val(`INV/${+new Date()}`)
                $('form').submit()
                Swal.fire({
                    icon: 'success',
                    title: 'Paket berhasil dibeli!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            })
        })
    })
</script> 
@endsection