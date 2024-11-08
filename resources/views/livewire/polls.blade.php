<div>
    @forelse($polls as $poll)
        <div class="mb-4">
            <h3 class="m-4 text-1xl">
                {{ $poll->title }}
            </h3>
        </div>
        @foreach($poll->options as $option)
            <div class="mb-2">
                <button class="btn" >Votes</button>
                {{ $option->name }} ( {{ $option->votes->count() }} )
            </div>
        @endforeach
    @empty
        <div class="text-blue-500">
            No Polls Available
        </div>
    @endforelse
</div>
