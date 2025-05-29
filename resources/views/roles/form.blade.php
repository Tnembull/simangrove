@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Nama Role</label>
        <input type="text" name="name" class="form-control"
            placeholder="Masukkan nama role, contoh: Admin"
            value="{{ old('name', $role->name ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="permissions">Daftar Permission</label>
        <div class="row">
            @foreach ($permissions as $permission)
                <div class="col-md-4 mb-2">
                    <div class="form-check">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                            class="form-check-input"
                            id="perm_{{ $permission->id }}"
                            {{ (isset($role) && $role->permissions->contains('name', $permission->name)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="perm_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if ($isEdit && isset($role))
        <div class="form-group">
            <label>Pengguna yang Memiliki Role Ini:</label>
            @forelse($role->users as $user)
                <div class="badge badge-secondary mr-1">{{ $user->full_name }}</div>
            @empty
                <p><i>Belum ada pengguna dengan role ini.</i></p>
            @endforelse
        </div>
    @endif

    <div class="text-right">
        <button type="submit" class="btn btn-primary">💾 Simpan</button>
    </div>
</form>
