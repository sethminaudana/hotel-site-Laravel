<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class OffersSlider extends Component
{
     use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Optional

    public function goToNextPage()
    {
        $this->nextPage();
        $this->dispatch('pageChanged');
    }

    public function goToPreviousPage()
    {
        $this->previousPage();
        $this->dispatch('pageChanged');
    }
    public function render()
    {
        $offers = Offer::paginate(4); // 1 offer per page
        return view('livewire.offers-slider',compact('offers'));
    }
}
