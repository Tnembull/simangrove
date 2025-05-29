@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">
    {{ isset($tajuk) ? 'Edit Tajuk' : 'Tambah Tajuk' }}
</h1>

<form action="{{ isset($tajuk) ? route('tajuk.update', $tajuk->id) : route('tajuk.store') }}" method="POST">
    @csrf
    @if(isset($tajuk))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama">Nama Tajuk</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama', $tajuk->nama ?? '') }}"
               placeholder="Masukkan nama tajuk" required>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($tajuk) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('tajuk.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
