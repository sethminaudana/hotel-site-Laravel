@extends('admin.dashboard')
@section('content')

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-content">
            <h1 class="header-title">Manage Contacts</h1>
        </div>
    </header>

   {{-- map update --}}
   @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm mt-4" style="max-width: 600px; margin: auto;">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Update Google Maps Embed URL</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.update.map') }}" id="mapForm">
            @csrf
            <div class="mb-3">
                <label for="map_url" class="form-label">Google Maps <h3><span style="font-weight: bold">Embed URL<span></h3></label>
                <textarea name="map_url" id="map_url" rows="4" class="form-control" required>{{ \App\Models\Setting::get('map_url') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Map</button>
            <button type="reset" class="btn btn-secondary ms-2">Clear</button>
        </form>
    </div>
</div>



@endsection
