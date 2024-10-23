<div>
    <form>
        <label>
            Poll Title
        </label>
        <input type="text" wire:model.live="title" />

        Current Title : {{ $title }}

        <div>
            <button class="btn" wire:click.prevent="addOption">
                Add Option
            </button>
        </div>

       <div class="mb-4">
           @foreach($options as $index => $option)
               <div class="mb-4">
                   {{ $index }} - {{ $option }}
               </div>
           @endforeach
       </div>

    </form>
</div>
