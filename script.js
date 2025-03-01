document.addEventListener("DOMContentLoaded", function() {
    const diamond = document.createElement('div');
    diamond.id = 'diamond';
    document.body.appendChild(diamond);

    const styles = {
        width: '0',
        height: '0',
        border: '2px solid transparent',
        borderTopColor: 'rgba(255, 255, 255, 1)',
        borderRightColor: 'rgba(255, 255, 255, 1)',
        borderBottomColor: 'rgba(255, 255, 255, 1)',
        borderLeftColor: 'rgba(255, 255, 255, 1)',
        transform: 'rotate(45deg)',
        position: 'absolute',
        top: '50%',
        left: '50%',
        marginLeft: '-2px', /* Половина ширины */
        marginTop: '-2px' /* Половина высоты */
    };

    Object.assign(diamond.style, styles);

    // Функция для изменения альфа-канала
    let step = 0;
    const steps = [1, 0.9, 0.8, 0.7, 0.6, 0.7, 0.8, 0.9, 1];
    const interval = 200; // 200 миллисекунд

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
