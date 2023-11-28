import allColorCombinationsGenerator from './allColorCombinationsGenerator'

export default function bodyFadeOutCurrentPageColortoNextPageColor(allPagesColorsObject, element) {
    let body = document.querySelector('body');

    let {colorCurrentPage, colorPageWeAreGoingTo} = allColorCombinationsGenerator(allPagesColorsObject, body, element);

    // Define la animación
    let animationKeyframes = `
    @keyframes colorCurrentPage_to_colorPageWeAreGoingTo {
        from {
            background-color: ${colorCurrentPage};
        }
        to {
            background-color: ${colorPageWeAreGoingTo};
        }
    }
    `;

    // Agrega la regla de animación al estilo
    var styleElement = document.createElement('style');
    styleElement.innerHTML = animationKeyframes;
    document.head.appendChild(styleElement);

    // Agrega la clase con la animación al elemento
    body.classList.add('colorCurrentPage-to-colorPageWeAreGoingTo');

}