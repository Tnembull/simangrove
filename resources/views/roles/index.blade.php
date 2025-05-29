@extends('layouts.admin')

@section('main-content')
<div class="d-flex justify-content-between mb-3">
    <h1 class="h3 text-gray-800">Manajemen Role</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#createRoleModal">+ Tambah Role</button>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="roleTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Role</th>
                        <th>Permission</th>
                        <th>Jumlah Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                            <td>{{ $role->users_count }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editRoleModal{{ $role->id }}">Edit</button>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus role ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Role</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @include('roles.form', [
                                            'action' => route('roles.update', $role->id),
                                            'isEdit' => true,
                                            'role' => $role,
                                            'permissions' => $permissions,
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah Role --}}
<div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('roles.form', [
                    'action' => route('roles.store'),
                    'isEdit' => false,
                    'permissions' => $permissions,
                ])
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#roleTable').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                    zeroRecords: "Tidak ada hasil ditemukan"
                }
            });
        });
    </script>
@endsection
