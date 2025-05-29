@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($kerusakan) ? 'Edit Kerusakan' : 'Tambah Kerusakan' }}
</h1>

<form action="{{ isset($kerusakan) ? route('kerusakan.update', $kerusakan->id) : route('kerusakan.store') }}" method="POST">
    @csrf
    @if(isset($kerusakan))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Kerusakan</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $kerusakan->nama ?? '') }}"
               placeholder="Masukkan nama kerusakan" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($kerusakan) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('kerusakan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
