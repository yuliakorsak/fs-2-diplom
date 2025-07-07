<div @class(['popup', 'active'=> $active])>
  <div class="popup__content">
    <div class="popup__header">
      <div class="popup__title">
        Новый фильм
        <div class="popup__dismiss" wire:click="$set('active', false)">
          <img src="i/ui/cross.png" alt="Закрыть">
        </div>
      </div>
    </div>
    <form class="popup__wrapper" wire:submit="save">
      <div class="popup__container">
        <label class="conf-step__label conf-step__label-fullsize">
          Название<input type="text" class="conf-step__input" required wire:model.blur="title">
          @error('title')<p class="conf-step__error"> {{ $message }} </p>@enderror</label>
      </div>
      <div class="popup__container">
        <label class="conf-step__label conf-step__label-fullsize">Длительность, мин<input type="text" class="conf-step__input" required wire:model.blur="duration">
          @error('duration')<p class="conf-step__error"> {{ $message }} </p>@enderror</label>
      </div>
      <div class="popup__container">
        <label class="conf-step__label conf-step__label-fullsize">Страна<input type="text" class="conf-step__input" required wire:model.blur="country">
          @error('country')<p class="conf-step__error"> {{ $message }} </p>@enderror</label>
      </div>
      <div class="popup__container">
        <label class="conf-step__label conf-step__label-fullsize">Описание<textarea type="text" class="conf-step__input" required wire:model.blur="description"></textarea>
          @error('description')<p class="conf-step__error"> {{ $message }} </p>@enderror</label>
      </div>
      <div class="popup__container">
        <label class="conf-step__label conf-step__label-fullsize">Постер<input type="file" class="conf-step__input" required wire:model.blur="poster">
          @error('poster')<p class="conf-step__error"> {{ $message }} </p>@enderror</label>
      </div>
      <fieldset class="conf-step__buttons text-center">
        <button class="conf-step__button conf-step__button-regular" type="button" wire:click="discard">Отмена</button>
        <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent">
      </fieldset>
    </form>
  </div>
</div>