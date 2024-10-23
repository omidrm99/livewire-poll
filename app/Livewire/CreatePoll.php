<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;

    public $options = [''];

    public function render(): Application|Factory|ViewAlias|View
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

//    public function mount()
//    {
//
//    }

}
