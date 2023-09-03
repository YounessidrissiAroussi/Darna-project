<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Publication;
use App\Models\Ville;


class DisplayPublication extends Component
{
    public $search = '';
    public function show(){}
    public function render()
    {
        return view('livewire.display-publication' , ['publications'=>Publication::where('show' ,'=',1)
        ->where('city', 'like', '%' . $this->search . '%')
       ->orderByDesc('published_at')->get() , 'cities' => Ville::all()]);
    }
}
