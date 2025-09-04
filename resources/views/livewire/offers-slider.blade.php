<section class="bd-offer-area pt-150 pb-150 theme-bg-2">
            <div class="container">
                <div class="row align-items-center wow fadeInUp" data-wow-delay=".5s">
                <div class="col-md-8">
                    <div class="bd-section__title-wrapper">
                        <p class="bd-section__subtitle mb-20">Offers</p>
                        <h2 class="bd-section__title mb-55  mmb-30">The Nisala Hotel Limited Period Offer</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bd-offer-slider-nav mb-50 d-flex justify-content-md-end">
                        <div class="bd-offer-slider-prev square-nav"  wire:click="goToPreviousPage"><i class="fa-light fa-angle-left"></i></div>
                        <div class="bd-offer-slider-next square-nav" wire:click="goToNextPage"><i class="fa-light fa-angle-right"></i></div>
                    </div>
                </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                <div class="col-12">
                    <div class="swiper-container bd-offer-active mmt-20">
                        <div class="swiper-wrapper">
                            @foreach($offers as $offer)
                           {{-- {{ dd($offers->all());}} --}}
                            <div class="swiper-slide">
                            <div class="bd-offer" >
                                <div class="bd-offer__thumb p-relative" >
                                    <img src="{{asset( $offer->image ?? 'img/offer/sale1.jpg')}}" alt="image not found">
                                    <div class="bd-offer__meta">
                                        <span>{{ $offer->discount }}</span>
                                    </div>
                                    <div class="bd-offer__content-visble mb-3">
                                        <h4 class="bd-offer__title-2">{{ $offer->title }}</h4>
                                    </div>
                                    <div class="bd-offer__content">
                                        {{-- <h4 class="bd-offer__title">{{ $offer->title }}</h4> --}}
                                        <p>{{ Str::words($offer->description, 20, '...') }}
                                        </p>
                                        <div class="bd-offer__btn">
                                        <a href="{{url('/room')}}">Book Now<i class="fa-regular fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            @endforeach
  </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
@push('scripts')
<script>
    Livewire.on('pageChanged', () => {
        if (window.offerSwiper) {
            window.offerSwiper.destroy(true, true);
        }

        setTimeout(() => {
            window.offerSwiper = new Swiper('.bd-offer-active', {
                slidesPerView: 4,
                spaceBetween: 30,
                loop: false,
                navigation: false
            });
        }, 100);
    });
</script>
@endpush
