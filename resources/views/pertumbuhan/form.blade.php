@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($pertumbuhan) ? 'Edit Pertumbuhan' : 'Tambah Pertumbuhan' }}
</h1>

<form action="{{ isset($pertumbuhan) ? route('pertumbuhan.update', $pertumbuhan->id) : route('pertumbuhan.store') }}" method="POST">
    @csrf
    @if(isset($pertumbuhan))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Pertumbuhan</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $pertumbuhan->nama ?? '') }}"
               placeholder="Masukkan nama pertumbuhan" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($pertumbuhan) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('pertumbuhan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
