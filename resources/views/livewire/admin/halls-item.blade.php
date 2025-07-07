<li>{{ $hall->title }}
  <button
    class="conf-step__button conf-step__button-trash"
    data-id="{{ $hall->id }}"
    wire:click="deleteHall"
    wire:confirm="Удалить зал?"
  ></button>
</li>