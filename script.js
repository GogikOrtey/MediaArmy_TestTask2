document.addEventListener("DOMContentLoaded", function() {
    const diamond = document.createElement('div');
    diamond.id = 'diamond';
    document.body.appendChild(diamond);

    const styles = {
        width: '0',
        height: '0',
        border: '2px solid transparent',
        borderTopColor: 'white',
        borderRightColor: 'white',
        borderBottomColor: 'white',
        borderLeftColor: 'white',
        transform: 'rotate(45deg)',
        position: 'absolute',
        top: '50%',
        left: '50%',
        marginLeft: '-2px', /* Половина ширины */
        marginTop: '-2px' /* Половина высоты */
    };

    Object.assign(diamond.style, styles);
});
