@extends('admin.dashboard')
@section('content')

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-content">
            <h1 class="header-title">Manage Offers</h1>
        </div>
    </header>

<div class="container">
    <h2>Create New Offer</h2>

    <form action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Offer Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Discount (%)</label>
            <input type="number" name="discount" class="form-control" min="1" max="100" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" required onchange="validateFileSize(this)">
            <small id="image-error" style="color: red"></small>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label>Valid Until</label>
            <input type="date" name="valid_until" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Save Offer</button>
    </form>
</div>
<br>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Discount</th>
                <th>Valid Until</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $offer)
                <tr>
                    <td>
                        @if($offer->image)
                            <img src="{{ asset($offer->image) }}" width="80">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $offer->title }}</td>
                    <td>{{ $offer->discount }}%</td>
                    <td>{{ $offer->valid_until ?? 'Unlimited' }}</td>
                    <td>
                        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this offer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        {{-- <span class="badge bg-{{ $offer->is_active ? 'success' : 'secondary' }}">
                            {{ $offer->is_active ? 'Active' : 'Inactive' }}
                        </span> --}}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
        function validateFileSize(input){
            const errorEl = document.getElementById("image-error");

            if(!input.files || input.files.length === 0){
                errorEl.textContent = "No file selected";
                return;
            }

            const file = input.files[0];


            if(file && file.size > 3 * 1024 * 1024){ //3MB
                errorEl.textContent = "Image must be less than 3MB";
                input.value = ""; // reset input
            }
            else{
                errorEl.textContent = "";
            }
        }
</script>
@endsection
