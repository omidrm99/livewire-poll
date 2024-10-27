<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll Title: {{ $title }}</label>

        <input type="text" wire:model.live="title"/>

        <div>
            <button class="btn m-4" wire:click.prevent="addOption">
                Add Option
            </button>
        </div>

        <div class="mb-4">
            @foreach($options as $index => $option)
                <div class="m-4">
                    <label for="">Option {{ $index + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model="options. {{ $index }}"/>
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn" type="submit">create poll</button>
    </form>
</div>
