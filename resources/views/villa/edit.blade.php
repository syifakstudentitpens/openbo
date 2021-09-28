@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('villa.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit villa <b>{{$data->nama_villa}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('nama_villa') ? ' has-error' : '' }}">
                            <label for="nama_villa" class="col-md-4 control-label">nama_villa</label>
                            <div class="col-md-6">
                                <input id="nama_villa" type="text" class="form-control" name="nama_villa" value="{{ $data->nama_villa }}" required>
                                @if ($errors->has('nama_villa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_villa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('npm') ? ' has-error' : '' }}">
                            <label for="kode_villa" class="col-md-4 control-label">kode_villa</label>
                            <div class="col-md-6">
                                <input id="kode_villa" type="text" class="form-control" name="kode_villa" value="{{ $data->kode_villa }}" required>
                                @if ($errors->has('kode_villa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_villa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fasilitas') ? ' has-error' : '' }}">
                            <label for="fasilitas" class="col-md-4 control-label">fasilitas</label>
                            <div class="col-md-6">
                                <input id="fasilitas" type="text" class="form-control" name="fasilitas" value="{{ $data->fasilitas }}" required>
                                @if ($errors->has('fasilitas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fasilitas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                            <label for="harga" class="col-md-4 control-label">Harga</label>
                            <div class="col-md-6">
                                <input id="harga" type="number" maxlength="4" class="form-control" name="harga" value="{{ $data->harga }}" required>
                                @if ($errors->has('harga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jumlah_kamar') ? ' has-error' : '' }}">
                            <label for="jumlah_kamar" class="col-md-4 control-label">Jumlah villa</label>
                            <div class="col-md-6">
                                <input id="jumlah_kamar" type="number" maxlength="4" class="form-control" name="jumlah_kamar" value="{{ $data->jumlah_kamar }}" required>
                                @if ($errors->has('jumlah_kamar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_kamar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-12">
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" >
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>
                            <div class="col-md-6">
                            <select class="form-control" name="type" required="">
                                <option value="seri1" {{$data->type === "seri1" ? "selected" : ""}}>seri1</option>
                                <option value="seri2" {{$data->type === "seri2" ? "selected" : ""}}>seri2</option>
                                <option value="seri3" {{$data->type === "seri3" ? "selected" : ""}}>seri3</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gambar</label>
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->cover) src="{{ asset('images/villa/'.$data->cover) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('villa.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection