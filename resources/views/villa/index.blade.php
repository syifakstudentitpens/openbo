@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('villa.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Villa</a>
  </div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data Villa</h4>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama Villa
                          </th>
                          <th>
                            Kode Villa
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            harga
                          </th>
                          <th>
                            Stok kamar
                          </th>
                          <th>
                            komplek Villa
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          @if($data->cover)
                            <img src="{{url('images/villa/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/villa/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          <a href="{{route('villa.show', $data->id)}}"> 
                            {{$data->nama_villa}}
                          </a>
                          </td>
                          <td>
                          
                            {{$data->kode_villa}}
                          
                          </td>

                          <td>
                            {{$data->alamat}}
                          </td>
                          <td>
                            {{$data->harga}}
                          </td>
                          <td>
                            {{$data->jumlah_kamar}}
                          </td>
                          <td>
                            {{$data->type}}
                          </td>
                          <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('villa.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('villa.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection