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
    @if ($isEdit) @method('PUT') @endif

    <div class="form-group">
        <label for="measurement_number">Measurement Number</label>
        <input type="number" name="measurement_number" class="form-control" required value="{{ old('measurement_number') }}">
    </div>

    <div class="form-group">
        <label for="observer_name">Observer Name</label>
        <input type="text" name="observer_name" class="form-control" required value="{{ old('observer_name') }}">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" name="category" class="form-control" required value="{{ old('category') }}">
    </div>

    <div class="form-group">
        <label for="measurement_year">Measurement Year</label>
        <input type="date" name="measurement_year" class="form-control" required value="{{ old('measurement_year') }}">
    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-primary">💾 Save</button>
    </div>
</form>
