let btnChoiseAllCheckboxJS = document.querySelector('#btnChoiseAllCheckboxJS');
let searchedResult = document.getElementById('searchedResult');


checked = false; // Проверка чекбоксов
btnChoiseAllCheckboxJS.addEventListener('click', e => {
   console.log('Выбранные кнопки');
   if (checked == false) {
      checked = true
      btnChoiseAllCheckboxJS.textContent = 'Отменить?';
   }
   else {
      checked = false
      btnChoiseAllCheckboxJS.textContent = 'Выбрать всё?';
   }
   for (let i = 0; i < searchedResult.elements.length; i++) {
      searchedResult.elements[i].checked = checked;
   }
});



