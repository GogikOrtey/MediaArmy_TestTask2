document.addEventListener("DOMContentLoaded", function() {
    // Стартовые стили для создаваемого объекта
    const styles = {
        width: '0',
        height: '0',
        // border: '2px solid transparent',
        borderTopColor: 'rgba(255, 255, 255, 1)',
        borderRightColor: 'rgba(255, 255, 255, 1)',
        borderBottomColor: 'rgba(255, 255, 255, 1)',
        borderLeftColor: 'rgba(255, 255, 255, 1)',
        transform: 'rotate(45deg)',
        position: 'absolute'
    };

    // Функция создания звезды, в случайных координатах
    function createStar() {
        const star = document.createElement('div');
        star.classList.add('star');
        Object.assign(star.style, styles);

        // Задание случайного размера для заезды:
        let randSizeBord = (Math.random() * 2.99) + 0.01; // От 0.01 до 3.0
        star.style.border = `${randSizeBord}px solid transparent`;

        const {x, y} = getRandomPosition();
        star.style.left = `${x}px`;
        star.style.top = `${y}px`;
        document.body.appendChild(star);
        return star;
    }

    // Получение случайных координат
    function getRandomPosition() {
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;
        return {x, y};
    }

    // Создание звёзд
    function initializeStars(count) {
        const stars = [];
        for (let i = 0; i < count; i++) {
            stars.push(createStar());
        }
        return stars;
    }

    // Функция, изменяющая видимость у звезды
    function changeOpacity(star, step, steps) {
        const alpha = steps[step];
        star.style.borderTopColor = `rgba(255, 255, 255, ${alpha})`;
        star.style.borderRightColor = `rgba(255, 255, 255, ${alpha})`;
        star.style.borderBottomColor = `rgba(255, 255, 255, ${alpha})`;
        star.style.borderLeftColor = `rgba(255, 255, 255, ${alpha})`;
    }

    // Таймер, вызывающийся 5 раз в секунду
    function startTwinkling(stars) {
        let step = 0;
        const steps = [1, 0.9, 0.8, 0.7, 0.6, 0.7, 0.8, 0.9, 1];
        const interval = 200; // 200 миллисекунд

        setInterval(() => {
            stars.forEach(star => changeOpacity(star, step, steps));
            step = (step + 1) % steps.length;
        }, interval);
    }

    // Вычисляет необходимое количество звёзд, которое нужно сгенерировать на экране
    // Она нужна, что бы на разных экранах количество звёзд было одинаковым
    function calculateStars(screenWidth, screenHeight) {
        const screenArea = screenWidth * screenHeight;
        const baseNumberOfStars = 35; // Количество звёзд для экрана 1920x1080
        const baseScreenArea = 1920 * 1080;
        
        return Math.round((screenArea / baseScreenArea) * baseNumberOfStars);
    }
    const starCount = calculateStars(window.innerWidth, window.innerHeight);
    
    console.log('Количество звёзд:', starCount);    

    // Инициализируем звёзды и запускаем мерцание
    // const starCount = 35;
    const stars = initializeStars(starCount);
    startTwinkling(stars);
});
















