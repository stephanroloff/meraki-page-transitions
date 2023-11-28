import {fadeOutAnimation} from '../variables/variables'

export default function elementsFadeOut() {
    let mainContainer = document.querySelector('.main-container');
    mainContainer.classList.add(fadeOutAnimation);
}