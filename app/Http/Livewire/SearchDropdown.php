<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public
    $search = null,
    $searchResults = [];

    public function updatedSearch()
    {
        if (strlen($this->search) > 2) {

            $response = Http::get("https://itunes.apple.com/search?term=". "$this->search" . "&limit=25");

            $this->searchResults = $response->json()['results'];
        }
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
