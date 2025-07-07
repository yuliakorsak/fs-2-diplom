function openPopup(id) {
  const target = document.getElementById(id);
  if (!target) {
    throw new Error('Форма не найдена');
  }
  if (!target.classList.contains('active')) {
    target.classList.add('active');
  }
}

function closePopup(id) {
  const target = document.getElementById(id);
  if (!target) {
    throw new Error('Форма не найдена');
  }
  target.classList.remove('active');
}

popups = [
  `<div class="popup" id="newHallPopup">
    <div class="popup__content">
      <div class="popup__header">
        <div class="popup__title">
          Создание зала
          <div class="popup__dismiss" onclick="closePopup('newHallPopup');">
            <img src="i/ui/cross.png" alt="Закрыть">
          </div>
        </div>
      </div>
      <form class="popup__wrapper" method="POST" action="">
        <p class="conf-step__paragraph">Укажите название зала: </p>
        <label class="conf-step__label-fullsize"><input type="text" class="conf-step__input" placeholder="Зал №"></label>
        <p class="conf-step__paragraph">Укажите количество рядов и максимальное количество кресел в ряду:</p>
        <div class="conf-step__legend">
          <label class="conf-step__label">Рядов, шт<input type="text" class="conf-step__input" placeholder="10"></label>
          <span class="multiplier">x</span>
          <label class="conf-step__label">Мест, шт<input type="text" class="conf-step__input" placeholder="8"></label>
        </div>
        <p class="conf-step__paragraph">Установите цены для типов кресел:</p>
        <div class="conf-step__legend">
          <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input" placeholder="0"></label>
          за <span class="conf-step__chair conf-step__chair_standart"></span> обычные кресла
        </div>
        <div class="conf-step__legend">
          <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input" placeholder="0"></label>
          за <span class="conf-step__chair conf-step__chair_vip"></span> VIP кресла
        </div>
        <button class="conf-step__button conf-step__button-accent" type="submit">Создать зал</button>
      </form>
     </div>
  </div>`,

];

popups.forEach(popup => document.body.insertAdjacentHTML('beforeend', popup));