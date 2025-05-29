@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Daftar Klaster Plot Ukur</h1>

    <!-- Flash Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('klaster.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Tambah Klaster
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Petani</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Tahun Tanam</th>
                        <th>Umur</th>
                        <th>Luas (Ha)</th>
                        <th>Jenis Tanah</th>
                        <th>Koordinat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($klasters as $index => $klaster)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $klaster->nama_petani }}</td>
                            <td>{{ $klaster->desa }}</td>
                            <td>{{ $klaster->kecamatan }}</td>
                            <td>{{ $klaster->tahun_tanam }}</td>
                            <td>{{ $klaster->umur }}</td>
                            <td>{{ $klaster->luas_ha }}</td>
                            <td>{{ ucfirst($klaster->jenis_tanah) }}</td>
                            <td><span class="badge badge-info">{{ $klaster->koordinat }}</span></td>
                            <td>
                                <a href="https://www.google.com/maps?q={{ $klaster->koordinat }}" target="_blank"
                                    class="btn btn-sm btn-info">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>

                                <a href="{{ route('klaster.edit', $klaster->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('klaster.destroy', $klaster->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus klaster ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Belum ada data klaster.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
