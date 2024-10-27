<?php

namespace App\Livewire;

use App\Models\Poll;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;

    public $options= [''];

    public function render(): Application|Factory|ViewAlias|View
    {
        return view('livewire.create-poll');
    }

    public function addOption(): void
    {
        $this->options[] = '';
    }

    public function removeOption($index): void
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll(): void
    {
        $poll = Poll::create([
            'title' => $this->title,
        ]);

        // Filter out any options that are either empty or contain only whitespace
        $filteredOptions = array_filter($this->options, function ($option) {
            return trim($option) !== '';
        });

        foreach ($filteredOptions as $optionName) {
            $poll->options()->create([
                'name' => $optionName,
            ]);
        }

        $this->reset('title', 'options');
    }



//    public function mount()
//    {
//
//    }

}
