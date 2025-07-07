<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Hall;
use App\Models\Movie;

class Index extends Component
{
    public $movies;
    public $halls;

    public function mount() {
        $this->halls = Hall::all();
        $this->movies = Movie::all();
    }

    public function render()
    {
        return view('livewire.client.index');
    }
}
