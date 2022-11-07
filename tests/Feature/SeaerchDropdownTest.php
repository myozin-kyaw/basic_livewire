<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SeaerchDropdownTest extends TestCase
{
    /** @test  */
    public function search_dropdown_searchs_correctly_if_song_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->assertDontSee('Adele')
            ->set('search', 'hello')
            ->assertSee('Adele');
    }

    /** @test  */
    public function search_dropdown_show_message_if_song_not_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->set('search', 'dfadsfasdfasgasgqdzfa')
            ->assertSee('No results found for');
    }
}
