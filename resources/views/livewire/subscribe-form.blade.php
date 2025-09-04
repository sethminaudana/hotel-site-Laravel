<form wire:submit.prevent="subscribe">
    <div class="bd-footer-newsletter__input is-black">
        <input type="email" wire:model.lazy="email" placeholder="Your Email" required>
        <button type="submit">subscribe now <i class="fa-regular fa-arrow-right-long"></i></button>
    </div>

    @error('email')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif
</form>
