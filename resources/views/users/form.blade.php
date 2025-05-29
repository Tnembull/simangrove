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

    <div class="form-row">
        <div class="form-group col-md-6 mb-3">
            <label for="name">Nama Depan</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama depan"
                value="{{ old('name', $user->name ?? '') }}" required>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label for="last_name">Nama Belakang</label>
            <input type="text" name="last_name" class="form-control" placeholder="Masukkan nama belakang"
                value="{{ old('last_name', $user->last_name ?? '') }}">
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukkan email pengguna"
            value="{{ old('email', $user->email ?? '') }}" required>
    </div>

    @if (!$isEdit)
        <div class="form-row">
            <div class="form-group col-md-6 mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="passwordInput" class="form-control"
                        placeholder="Masukkan password awal" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary toggle-password" type="button"
                            data-target="#passwordInput">👁</button>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="password_confirmation">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="passwordConfirmInput" class="form-control"
                        placeholder="Ulangi password" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary toggle-password" type="button"
                            data-target="#passwordConfirmInput">👁</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="form-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="toggleResetPassword">
                <label class="form-check-label" for="toggleResetPassword">
                    Reset Password <small class="text-muted">(Centang untuk reset)</small>
                </label>
            </div>
        </div>
        <div class="form-row" id="resetPasswordRow" style="display: none;">
            <div class="form-group col-md-6 mb-3">
                <label for="password">Password Baru</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="passwordInputReset"
                        placeholder="Masukkan password baru">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary toggle-password" type="button"
                            data-target="#passwordInputReset">Open</button>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="password_confirmation">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" class="form-control"
                        id="passwordConfirmInputReset" placeholder="Ulangi password baru">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary toggle-password" type="button"
                            data-target="#passwordConfirmInputReset">Open</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="form-row">
        <div class="form-group col-md-6 mb-3">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="" disabled {{ !isset($user) ? 'selected' : '' }}>Pilih peran pengguna</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}"
                        {{ isset($user) && $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6 mb-3">
            <label for="status">Status Pengguna</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status', $user->status ?? 1) == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status', $user->status ?? 1) == 0 ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
    </div>
</form>

@section('scripts')
<script>
    function initTogglePassword(modal) {
        const toggle = modal.querySelector('#toggleResetPassword');
        const row = modal.querySelector('#resetPasswordRow');

        if (toggle && row) {
            toggle.addEventListener('change', function () {
                row.style.display = this.checked ? 'flex' : 'none';
                row.querySelectorAll('input').forEach(input => {
                    if (this.checked) {
                        input.setAttribute('required', true);
                    } else {
                        input.removeAttribute('required');
                        input.value = '';
                    }
                });
            });
        }

        modal.querySelectorAll('.toggle-password').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const input = modal.querySelector(this.dataset.target);
                if (input.type === 'password') {
                    input.type = 'text';
                    this.innerText = 'Close';
                } else {
                    input.type = 'password';
                    this.innerText = 'Open';
                }
            });
        });
    }

    // Jalankan ketika modal edit ditampilkan
    $(document).on('shown.bs.modal', '.modal', function () {
        initTogglePassword(this);
    });
</script>
@endsection

