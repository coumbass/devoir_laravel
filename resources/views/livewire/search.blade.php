<div class="inline-block" x-data="{ open:true}"  >
    <input @click.away="{ open=false; @this.resetIndex();}" @click="{open=true}"  class="bg-pink-200 text-pink-700 border-2 focus:outline-none px-2 py-1 rounded-full" placeholder="search"
    wire:model="query"
    wire:keydown.arrow-down.prevent="incrementIndex"
    wire:keydown.arrow-up.prevent="decrementIndex"
    wire:keydown.backspace="resetIndex"
    wire:keydown.enter.prevent="showJob">




    @if (strlen($query) >= 2)
        <div class="z-10 bg-white border border-gray-400 rounded w-56 px-2 py-1 mt-10 flex flex-col absolute" 
        x-show="open">
        @if (count($jobs) > 0)
            @foreach ($jobs as $index =>  $job)
               <p class="p-1 {{ $index === $selectedIndex ? 'text-pink-500' :''}}"> {{ $job['title'] }}</p>
            @endforeach 
        @else
        <span class="text-gray-500">0 résultat pour "{{ $query }}"</span>
        @endif
        </div>
    @endif

</div>
