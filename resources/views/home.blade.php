@extends('layouts.admin')

@section('main-content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Selamat datang, {{ Auth::user()->full_name ?? Auth::user()->name }}.</h6>
    </div>
    <div class="card-body">
        <p><strong>Sistem Informasi Pengukuran Kesehatan Mangrove</strong> adalah aplikasi untuk mencatat, menyimpan, dan menilai data pengukuran ekosistem pohon mangrove secara digital.</p>
        <p>Data yang tersimpan akan digunakan oleh pengelola kawasan mangrove untuk mengambil keputusan berbasis bukti dalam menjaga dan merehabilitasi lingkungan.</p>

        <p><strong>Berikut adalah file penting yang dibutuhkan untuk menggunakan sistem:</strong></p>
        <ul>
            <li>📘 <strong>Panduan penggunaan</strong> dapat diunduh <a href="#">di sini</a>.</li>
            <li>📁 <strong>Panduan import</strong> data pengukuran kesehatan mangrove dapat diunduh <a href="#">di sini</a>.</li>
            <li>📄 <strong>Format Tally Sheet</strong> Klaster Plot dapat diunduh <a href="#">di sini</a>.</li>
        </ul>

        <p>Terima kasih telah menggunakan Sistem Informasi Pengukuran Kesehatan Mangrove. Jika ada kritik dan saran, silakan hubungi kami di <strong>admin@mangrovehealth.ac.id</strong></p>

        <p class="text-danger">Jika ada masalah dengan sistem, hubungi administrator <strong>(support@mangrovehealth.ac.id)</strong>.</p>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Lokasi Klaster Plot Penilaian dan atau Pemantauan Kesehatan Mangrove</h6>
    </div>
    <div class="card-body">
        {{-- Input hidden untuk koordinat (agar JavaScript bisa menangkap) --}}
        <input type="hidden" id="titik_koordinat" value="-5.446389, 105.266667">
        <div id="map" style="height: 400px; width: 100%;"></div>
    </div>
</div>

@endsection

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const inputKoordinat = document.getElementById('titik_koordinat');
        const defaultLatLng = inputKoordinat && inputKoordinat.value
            ? inputKoordinat.value.split(',').map(parseFloat)
            : [-5.446389, 105.266667]; // fallback jika tidak ada input

        const map = L.map('map').setView(defaultLatLng, 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        let marker = L.marker(defaultLatLng, { draggable: true }).addTo(map);

        if (inputKoordinat) {
            marker.on('dragend', function (e) {
                const latlng = e.target.getLatLng();
                inputKoordinat.value = `${latlng.lat.toFixed(6)}, ${latlng.lng.toFixed(6)}`;
            });

            map.on('click', function (e) {
                marker.setLatLng(e.latlng);
                inputKoordinat.value = `${e.latlng.lat.toFixed(6)}, ${e.latlng.lng.toFixed(6)}`;
            });
        }
    </script>
@endsection
