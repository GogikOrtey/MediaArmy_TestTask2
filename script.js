document.addEventListener("DOMContentLoaded", function() {
    const diamond = document.createElement('div');
    diamond.id = 'diamond';
    document.body.appendChild(diamond);

    // Стартовые стили для создаваемого объекта
    const styles = {
        width: '0',
        height: '0',
        border: '2px solid transparent',
        borderTopColor: 'rgba(255, 255, 255, 1)',
        borderRightColor: 'rgba(255, 255, 255, 1)',
        borderBottomColor: 'rgba(255, 255, 255, 1)',
        borderLeftColor: 'rgba(255, 255, 255, 1)',
        transform: 'rotate(45deg)',
        position: 'absolute'
    };

    // Применяем стили для объекта
    Object.assign(diamond.style, styles);

    // Генерация случайных координат
    function getRandomPosition() {
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;
        return {x, y};
    }

    // Установка объекта в случайное место
    const {x, y} = getRandomPosition();
    diamond.style.left = `${x}px`;
    diamond.style.top = `${y}px`;

    // Функция для изменения альфа-канала
    let step = 0;
    const steps = [1, 0.9, 0.8, 0.7, 0.6, 0.7, 0.8, 0.9, 1];
    const interval = 200; // 200 миллисекунд

    // Изменяет видимость звезды, в зависимости от № шага 
    function changeOpacity() {
        const alpha = steps[step];
        diamond.style.borderTopColor = `rgba(255, 255, 255, ${alpha})`;
        diamond.style.borderRightColor = `rgba(255, 255, 255, ${alpha})`;
        diamond.style.borderBottomColor = `rgba(255, 255, 255, ${alpha})`;
        diamond.style.borderLeftColor = `rgba(255, 255, 255, ${alpha})`;
        step = (step + 1) % steps.length;
    }

    // Устанавливаем таймер
    setInterval(changeOpacity, interval);
});
















