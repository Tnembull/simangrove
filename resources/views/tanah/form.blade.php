@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($tanah) ? 'Edit Tanah' : 'Tambah Tanah' }}
</h1>

<form action="{{ isset($tanah) ? route('tanah.update', $tanah->id) : route('tanah.store') }}" method="POST">
    @csrf
    @if(isset($tanah))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Tanah</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $tanah->nama ?? '') }}"
               placeholder="Masukkan nama tanah" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($tanah) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('tanah.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
