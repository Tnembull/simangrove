@extends('layouts.admin')

@section('main-content')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 text-gray-800">Manajemen Pengguna</h1>
        <button class="btn btn-success" data-toggle="modal" data-target="#createUserModal">
            <i class="fas fa-plus"></i> Tambah Pengguna
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="userTable" class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->id !== Auth::id())
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                    <td>
                                        <span class="badge {{ $user->is_online ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $user->is_online ? 'Online' : 'Offline' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editUserModal{{ $user->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin hapus pengguna ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-white">
                                                <h5 class="modal-title">Edit Pengguna</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @include('users.form', [
                                                    'action' => route('users.update', $user->id),
                                                    'isEdit' => true,
                                                    'user' => $user,
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah Pengguna --}}
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Tambah Pengguna</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('users.form', [
                        'action' => route('users.store'),
                        'isEdit' => false,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
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

            $('#createUserModal').on('show.bs.modal', function () {
                const form = $(this).find('form');
                form.trigger('reset');
                form.find('select').val('').trigger('change');
            });
        });
    </script>
@endsection
