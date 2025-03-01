document.addEventListener("DOMContentLoaded", function() {
    // Стартовые стили для звезды
    const styles = {
        width: '0',
        height: '0',
        transform: 'rotate(45deg)',
        position: 'absolute'
    };

    // Функция создания звезды, в случайных координатах
    function createStar() {
        // Получаем случайный цвет, для звезды:
        let randomColorForStars = RandColorForStars();

        const star = document.createElement('div');
        star.classList.add('star');
        Object.assign(star.style, styles);

        // Задание случайного размера для заезды:
        let randSizeBord = (Math.random() * 2.99) + 0.01; // От 0.01 до 3.0
        star.style.border = `${randSizeBord}px solid transparent`;

        // Применяем случайный цвет к звезде:
        star.style.borderTopColor = randomColorForStars;
        star.style.borderRightColor = randomColorForStars;
        star.style.borderBottomColor = randomColorForStars;
        star.style.borderLeftColor = randomColorForStars;

        // Задаём случайное положение на странице:
        const {x, y} = getRandomPosition();
        star.style.left = `${x}px`;
        star.style.top = `${y}px`;

        // Добавляем на страницу:
        document.body.appendChild(star);
        return star;
    }

    // Возвращает случайный цвет для звезды
    function RandColorForStars() {
        let whiteColor = 'rgba(255, 255, 255, 1)';       // Оригинальный, белый
        let lightBlueColor = 'rgba(174, 225, 255, 1)';   // Светло-голубой
        let lightOrangeColor = 'rgba(255, 243, 209, 1)'; // Светло-оранжевый

        // Сначала вычисляем, к какому цвету результирующий будет ближе:
        let rand1 = Math.random();
        if(rand1 > 0 && rand1 < 0.5) {          // светло-голубой
            // Смешиваем белый и светло-голубой цвет, в случайных %
            return(blendColors(whiteColor, lightBlueColor, Math.random()));

        } else if(rand1 > 0.5 && rand1 < 0.8) { // светло-оранжевый
            return(blendColors(whiteColor, lightOrangeColor, Math.random()));

        } else {                                
            return whiteColor;                  // классический белый
        }

        // Функция смешивания двух цветов
        // значение ratio - это в % то, насколько первый цвет будет приближен ко второму
        function blendColors(color1, color2, ratio) {
            // Функция для извлечения значений rgba из строки
            function getRgbaValues(color) {
                const rgba = color.match(/rgba?\((\d+),\s*(\d+),\s*(\d+),\s*([\d.]+)\)/);
                return rgba ? rgba.slice(1, 5).map(Number) : [];
            }

            const [r1, g1, b1, a1] = getRgbaValues(color1);
            const [r2, g2, b2, a2] = getRgbaValues(color2);

            const r = Math.round(r1 * (1 - ratio) + r2 * ratio);
            const g = Math.round(g1 * (1 - ratio) + g2 * ratio);
            const b = Math.round(b1 * (1 - ratio) + b2 * ratio);
            const a = a1 * (1 - ratio) + a2 * ratio;

            return `rgba(${r}, ${g}, ${b}, ${a})`;
        }
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
















