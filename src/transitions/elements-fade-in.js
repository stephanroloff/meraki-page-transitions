import {fadeInAnimation} from '../variables/variables'

export default function elementsFadeIn() {
    let mainContainer = document.querySelector('.main-container');
    mainContainer.classList.add(fadeInAnimation);
}