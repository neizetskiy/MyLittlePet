function previewFImage(event) {
    var reader = new FileReader();
    reader.onload = function(event) {
        document.getElementById('img').src = event.target.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

let fileInputCounter = 1; // Счетчик для уникальных идентификаторов

// Функция для создания и добавления нового инпута и label
function addFileInput() {
    const fileInputWrapper = document.createElement('div');

    const fileLabel = document.createElement('label');
    fileLabel.textContent = `Выберите файл ${fileInputCounter}`;
    fileLabel.setAttribute('for', `file-input-${fileInputCounter}`);
    fileLabel.setAttribute('class', 'addphoto');

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.id = `file-input-${fileInputCounter}`;
    fileInput.name = 'img[]';
    fileInput.class = 'inputtypefile'
    fileInput.addEventListener('change', handleFileChange);

    fileInputWrapper.appendChild(fileLabel);
    fileInputWrapper.appendChild(fileInput);
    fileInputWrapper.appendChild(document.createElement('br')); // Добавляем разрыв строки
    document.getElementById('file-inputs').appendChild(fileInputWrapper);

    fileInputCounter++;
}

// Функция-обработчик события change для инпута
function handleFileChange(event) {
    const fileInput = event.target;
    if (fileInput.files.length > 0) {
        // Если файл выбран, добавляем новый инпут и label
        addFileInput();
    }
}

// Создаем первый инпут и label при загрузке страницы
addFileInput();
