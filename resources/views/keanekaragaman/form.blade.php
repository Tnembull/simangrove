@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($keanekaragaman) ? 'Edit Keanekaragaman' : 'Tambah Keanekaragaman' }}
</h1>

<form action="{{ isset($keanekaragaman) ? route('keanekaragaman.update', $keanekaragaman->id) : route('keanekaragaman.store') }}" method="POST">
    @csrf
    @if(isset($keanekaragaman))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Keanekaragaman</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $keanekaragaman->nama ?? '') }}"
               placeholder="Masukkan nama keanekaragaman" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($keanekaragaman) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('keanekaragaman.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
