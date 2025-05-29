@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tentang Aplikasi') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow mb-4">

                <div class="card-profile-image mt-4 text-center">
                    <img src="{{ asset('img/favicon.png') }}" class="rounded-circle" alt="user-image" width="100">
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Sistem Manajemen Kesehatan Ekosistem Pohon Mangrove</h5>
                            <p>Aplikasi ini dikembangkan sebagai bagian dari penelitian skripsi yang bertujuan untuk mempermudah pengelolaan dan pemantauan data kesehatan pohon mangrove berdasarkan hasil pengukuran lapangan.</p>
                            <p>Fitur-fitur utama dalam aplikasi ini meliputi pengelolaan data plot ukur, pengamatan pertumbuhan pohon, kondisi tanah, mortalitas dan regenerasi, kerusakan pohon, serta penilaian kondisi tajuk pohon. Data diinput melalui form ataupun unggahan file Excel hasil tally sheet.</p>
                            <p>Aplikasi ini dibangun menggunakan framework Laravel dan dilengkapi dengan tampilan antarmuka yang responsif untuk memudahkan penggunaan di berbagai perangkat.</p>
                            <p>Pengembangan aplikasi ini diharapkan dapat memberikan kontribusi nyata dalam mendukung konservasi dan monitoring ekosistem mangrove secara lebih efisien dan terdigitalisasi.</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Teknologi yang Digunakan</h5>
                            <ul>
                                <li><a href="https://laravel.com" target="_blank">Laravel</a> – Framework PHP modern untuk pengembangan aplikasi web.</li>
                                <li><a href="https://startbootstrap.com/theme/sb-admin-2" target="_blank">SB Admin 2</a> – Template UI yang digunakan sebagai dasar tampilan admin.</li>
                                <li>MySQL / MariaDB – Basis data relasional untuk menyimpan data pengukuran dan pohon.</li>
                                <li>Excel Import – Fitur unggah data dari format Excel untuk mendukung data lapangan.</li>
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <div class="text-center">
                        <p>Untuk informasi lebih lanjut mengenai sistem ini, silakan hubungi pengembang atau dosen pembimbing.</p>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
