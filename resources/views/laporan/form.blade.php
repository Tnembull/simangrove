@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($laporan) ? 'Edit Laporan' : 'Tambah Laporan' }}
</h1>

<form action="{{ isset($laporan) ? route('laporan.update', $laporan->id) : route('laporan.store') }}" method="POST">
    @csrf
    @if(isset($laporan))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Laporan</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $laporan->nama ?? '') }}"
               placeholder="Masukkan nama laporan" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($laporan) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
