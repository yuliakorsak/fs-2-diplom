<div @class(['popup', 'active'=> $active]) id="newHallPopup">
    <div class="popup__content">
        <div class="popup__header">
            <div class="popup__title">
                Создание зала
                <div class="popup__dismiss" wire:click="$set('active', false)">
                    <img src="i/ui/cross.png" alt="Закрыть">
                </div>
            </div>
        </div>
        <form class="popup__wrapper" wire:submit="save">
            <p class="conf-step__paragraph">Укажите название зала: </p>
            <label class="conf-step__label conf-step__label-fullsize">
                <input type="text" class="conf-step__input" placeholder="Зал №" required wire:model.blur="title">
                @error('title')<p class="conf-step__error"> {{ $message }} </p>@enderror
            </label>
            <p class="conf-step__paragraph">Укажите количество рядов и максимальное количество кресел в ряду:</p>
            <div class="conf-step__legend">
                <label class="conf-step__label">Рядов, шт<input type="text" class="conf-step__input" placeholder="10" required wire:model.blur="rows_count"></label>
                <span class="multiplier">x</span>
                <label class="conf-step__label">Мест, шт<input type="text" class="conf-step__input" placeholder="8" required wire:model.blur="seats_count"></label>
                @error('*_count')<p class="conf-step__error"> {{ $message }} </p>@enderror
            </div>
            <p class="conf-step__paragraph">Установите цены для типов кресел:</p>
            <div class="conf-step__legend">
                <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input" placeholder="0" required wire:model.blur="price_standart"></label>
                за <span class="conf-step__chair conf-step__chair_standart"></span> обычные кресла
                @error('price_standart')<p class="conf-step__error"> {{ $message }} </p>@enderror</label>
            </div>
            <div class="conf-step__legend">
                <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input" placeholder="0" required wire:model.blur="price_vip"></label>
                за <span class="conf-step__chair conf-step__chair_vip"></span> VIP кресла
                @error('price_vip')<p class="conf-step__error"> {{ $message }} </p>@enderror</label>
            </div>
            <fieldset class="conf-step__buttons text-center">
                <button class="conf-step__button conf-step__button-regular" type="button" wire:click="discard">Отмена</button>
                <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent">
            </fieldset>
        </form>
    </div>
</div>