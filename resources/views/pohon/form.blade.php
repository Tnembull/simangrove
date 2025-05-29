@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($pohon) ? 'Edit Pohon' : 'Tambah Pohon' }}
</h1>

<form action="{{ isset($pohon) ? route('pohon.update', $pohon->id) : route('pohon.store') }}" method="POST">
    @csrf
    @if(isset($pohon))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Pohon</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $pohon->nama ?? '') }}"
               placeholder="Masukkan nama pohon" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($pohon) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('pohon.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
