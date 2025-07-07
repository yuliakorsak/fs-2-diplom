<section class="conf-step">
  <header class="conf-step__header conf-step__header_opened">
    <h2 class="conf-step__title">Управление залами</h2>
  </header>
  <div class="conf-step__wrapper">
    @if(count($halls) > 0)
    <p class="conf-step__paragraph">Доступные залы:</p>
    <ul class="conf-step__list">
      @foreach ($halls as $hall)
      <livewire:admin.halls-item :hall="$hall" :key="$hall->id" />
      @endforeach
    </ul>
    @else
    <p class="conf-step__paragraph">Залов нет.</p>
    @endif
    <button
      class="conf-step__button conf-step__button-accent"
      id="create-hall"
      type="button"
      wire:click="$dispatch('new-hall')">Создать зал</button>
  </div>
</section>