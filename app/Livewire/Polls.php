<?php

namespace App\Livewire;

use App\Models\Poll;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render'
    ];


    public function render(): Application|Factory|ViewAlias|View
    {
        $polls = Poll::with('options.votes')
            ->latest()->get();
        return view('livewire.polls', ['polls' => $polls]);
    }
}
