@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($mortalitas) ? 'Edit Mortalitas' : 'Tambah Mortalitas' }}
</h1>

<form action="{{ isset($mortalitas) ? route('mortalitas.update', $mortalitas->id) : route('mortalitas.store') }}" method="POST">
    @csrf
    @if(isset($mortalitas))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Mortalitas</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $mortalitas->nama ?? '') }}"
               placeholder="Masukkan nama mortalitas" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($mortalitas) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('mortalitas.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
