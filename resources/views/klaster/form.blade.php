@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold">
        {{ $isEdit ? 'Edit Klaster Plot Ukur' : 'Tambah Klaster Plot Ukur' }}
    </h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ $isEdit ? route('klaster.update', $klaster->id) : route('klaster.store') }}" method="POST">
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="pengukuran_ke">Pengukuran Ke-</label>
                    <input type="number" class="form-control @error('pengukuran_ke') is-invalid @enderror" name="pengukuran_ke" value="{{ old('pengukuran_ke', $klaster->pengukuran_ke ?? 1) }}" required>
                    @error('pengukuran_ke')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="nama_petani">Nama Petani</label>
                    <input type="text" class="form-control @error('nama_petani') is-invalid @enderror" name="nama_petani" value="{{ old('nama_petani', $klaster->nama_petani ?? '') }}" required>
                    @error('nama_petani')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="desa">Desa</label>
                    <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa" value="{{ old('desa', $klaster->desa ?? '') }}" required>
                    @error('desa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ old('kecamatan', $klaster->kecamatan ?? '') }}" required>
                    @error('kecamatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" value="{{ old('kabupaten', $klaster->kabupaten ?? '') }}">
                    @error('kabupaten')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="tahun_tanam">Tahun Tanam</label>
                    <input type="number" class="form-control @error('tahun_tanam') is-invalid @enderror" name="tahun_tanam" value="{{ old('tahun_tanam', $klaster->tahun_tanam ?? '') }}" required>
                    @error('tahun_tanam')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="umur">Umur (Tahun)</label>
                    <input type="number" step="0.1" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur', $klaster->umur ?? '') }}" required>
                    @error('umur')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="luas_ha">Luas (Ha)</label>
                    <input type="number" step="0.01" class="form-control @error('luas_ha') is-invalid @enderror" name="luas_ha" value="{{ old('luas_ha', $klaster->luas_ha ?? '') }}" required>
                    @error('luas_ha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="titik_koordinat">Titik Koordinat (Lat, Long)</label>
                    <input type="text" class="form-control @error('titik_koordinat') is-invalid @enderror" name="titik_koordinat" id="titik_koordinat" value="{{ old('titik_koordinat', $klaster->titik_koordinat ?? '-5.45, 105.26') }}" required>
                    @error('titik_koordinat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="peta">Pilih Titik dari Peta</label>
                    <div id="map" style="height: 400px;"></div>
                </div>

                <div class="form-group">
                    <label for="altitude">Altitude (m)</label>
                    <input type="number" class="form-control @error('altitude') is-invalid @enderror" name="altitude" value="{{ old('altitude', $klaster->altitude ?? '') }}">
                    @error('altitude')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="bentuk_lahan">Bentuk Lahan</label>
                    <select name="bentuk_lahan" class="form-control @error('bentuk_lahan') is-invalid @enderror">
                        <option value="">-- Pilih Bentuk Lahan --</option>
                        @foreach (['darat', 'rawa', 'tergenang'] as $bentuk)
                            <option value="{{ $bentuk }}" {{ old('bentuk_lahan', $klaster->bentuk_lahan ?? '') == $bentuk ? 'selected' : '' }}>{{ ucfirst($bentuk) }}</option>
                        @endforeach
                    </select>
                    @error('bentuk_lahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="jarak_tanam">Jarak Tanam (m)</label>
                    <input type="number" class="form-control @error('jarak_tanam') is-invalid @enderror" name="jarak_tanam" value="{{ old('jarak_tanam', $klaster->jarak_tanam ?? '') }}">
                    @error('jarak_tanam')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="pola_tanam">Pola Tanam</label>
                    <select name="pola_tanam" class="form-control @error('pola_tanam') is-invalid @enderror">
                        <option value="">-- Pilih Pola Tanam --</option>
                        @foreach (['baris', 'zigzag', 'acak'] as $pola)
                            <option value="{{ $pola }}" {{ old('pola_tanam', $klaster->pola_tanam ?? '') == $pola ? 'selected' : '' }}>{{ ucfirst($pola) }}</option>
                        @endforeach
                    </select>
                    @error('pola_tanam')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="jenis_tanaman">Jenis Tanaman</label>
                    <input type="text" class="form-control @error('jenis_tanaman') is-invalid @enderror" name="jenis_tanaman" value="{{ old('jenis_tanaman', $klaster->jenis_tanaman ?? '') }}">
                    @error('jenis_tanaman')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('klaster.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const inputKoordinat = document.getElementById('titik_koordinat');
        const defaultLatLng = inputKoordinat.value.split(',').map(parseFloat);
        const map = L.map('map').setView(defaultLatLng, 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        let marker = L.marker(defaultLatLng, { draggable: true }).addTo(map);

        marker.on('dragend', function(e) {
            const latlng = e.target.getLatLng();
            inputKoordinat.value = `${latlng.lat.toFixed(6)}, ${latlng.lng.toFixed(6)}`;
        });

        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            inputKoordinat.value = `${e.latlng.lat.toFixed(6)}, ${e.latlng.lng.toFixed(6)}`;
        });
    </script>
@endsection
