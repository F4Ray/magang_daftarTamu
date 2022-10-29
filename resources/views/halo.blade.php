@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Daftar Tamu
                </div>
                <div class="card-body">
                    <h5 class="card-title">Selamat datang di Pustipada </h5>
                    <h6 class="card-title mb-2">silahkan isi daftar tamu dibawah ini</h6>
                    <form method="POST" action="{{ route('visitor_create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" required autocomplete="off" autofocus>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIP / NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror"
                                    name="nim" required autocomplete="off">

                                @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="keperluan"
                                class="col-md-4 col-form-label text-md-right">{{ __('Keperluan') }}</label>

                            <div class="col-md-6">
                                <input id="keperluan" type="text"
                                    class="form-control @error('keperluan') is-invalid @enderror" name="keperluan"
                                    value="{{ old('keperluan') }}" required autocomplete="off" autofocus>

                                @error('keperluan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="keterangan"
                                class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text"
                                    class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                    value="{{ old('keterangan') }}" autocomplete="off" autofocus>
                                <small id="keteranganHelp" class="form-text text-muted">Kosongkan jika tidak
                                    perlu.</small>

                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection