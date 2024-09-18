// Получаем доступ к кнопке и контейнеру для нового изображения
const toggleButton = document.getElementById('toggleButton');
const imageContainer = document.getElementById('imageContainer');

// Флаг для отслеживания состояния изображения
let isImageAdded = false;

// Добавляем событие на кнопку
toggleButton.addEventListener('click', () => {
    if (isImageAdded) {
        // Если изображение добавлено, удаляем его
        imageContainer.innerHTML = '';  // Очищаем содержимое контейнера
        toggleButton.textContent = 'Добавить изображение';  // Меняем текст кнопки
    } else {
        // Если изображение не добавлено, создаем его и добавляем в контейнер
        const newImage = document.createElement('img');
        newImage.src = './image/hacker.png';  // Пример изображения
        newImage.alt = 'Новое изображение';
        newImage.style.width = '300px';  // Размеры картинки
        newImage.style.height = 'auto';
        imageContainer.appendChild(newImage);  // Добавляем изображение в контейнер
        toggleButton.textContent = 'Удалить изображение';  // Меняем текст кнопки
    }
    isImageAdded = !isImageAdded;  // Меняем состояние
});
