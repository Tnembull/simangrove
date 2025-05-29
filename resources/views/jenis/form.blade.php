@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($jenis) ? 'Edit Jenis' : 'Tambah Jenis' }}
</h1>

<form action="{{ isset($jenis) ? route('jenis.update', $jenis->id) : route('jenis.store') }}" method="POST">
    @csrf
    @if(isset($jenis))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Jenis</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $jenis->nama ?? '') }}"
               placeholder="Masukkan nama jenis" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($jenis) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
