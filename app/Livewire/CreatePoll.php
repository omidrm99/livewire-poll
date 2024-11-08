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

    public $options = [''];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:4',
        'options.*' => 'required|min:1|max:255'
    ];
    protected $messages = [
        'options.*' => "The option can't be empty.",
    ];

    public function render(): Application|Factory|ViewAlias|View
    {
        return view('livewire.create-poll');
    }

    public function addOption(): void
    {
        $this->options[] = '';
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function removeOption($index): void
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll(): void
    {
        $this->validate();
        Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)->map(fn($option) => ['name' => $option])->all()
        );
//        $poll = Poll::create([
//            'title' => $this->title,
//        ]);
//        foreach ($this->options as $optionName) {
//            $poll->options()->create([
//                'name' => $optionName,
//            ]);
//        }
        $this->reset('title', 'options');
        $this->dispatch('pollCreated');
    }
}
