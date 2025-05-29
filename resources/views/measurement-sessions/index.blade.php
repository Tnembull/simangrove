@extends('layouts.admin')

@section('main-content')
<div class="d-flex justify-content-between mb-3">
    <h1 class="h3 text-gray-800">Measurement Sessions</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#createSessionModal">+ Add Session</button>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sessionTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Observer</th>
                        <th>Category</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sessions as $session)
                    <tr>
                        <td>{{ $session->measurement_number }}</td>
                        <td>{{ $session->observer_name }}</td>
                        <td>{{ $session->category }}</td>
                        <td>{{ $session->measurement_year }}</td>
                        <td>
                            <form action="{{ route('measurement-sessions.destroy', $session->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this session?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Create Modal --}}
<div class="modal fade" id="createSessionModal" tabindex="-1" role="dialog" aria-labelledby="createSessionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Measurement Session</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                @include('measurement-sessions.form', ['action' => route('measurement-sessions.store'), 'isEdit' => false])
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
        $('#sessionTable').DataTable({ responsive: true });
    });
</script>
@endsection
