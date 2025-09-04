@extends('admin.dashboard')
@section('content')

{{-- <form action="{{ route('admin.aboutus.updateimg') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="mb-3">
        <label>Welcome Image</label>
        <input type="file" name="welcome_image" class="form-control">
    </div>

    <div class="mb-3">
        <label>Background Image</label>
        <input type="file" name="background_image" class="form-control">
    </div>

    <button type="submit" class="btn btn-dark">Save Images</button>
</form> --}}
 @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm mt-4" style="max-width: 600px; margin: auto;">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Update Homepage Images</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.aboutus.updateimg') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="form-label fw-bold">Welcome Image</label>
                <input type="file" name="welcome_image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Background Image</label>
                <input type="file" name="background_image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Update Images</button>
            <button type="reset" class="btn btn-secondary ms-2">Clear</button>
        </form>
    </div>
</div>
@endsection
