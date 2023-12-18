import {fadeOutAnimation} from '../variables/variables'

export default function elementsFadeOut() {
    let mainContainer = document.querySelector('.wp-site-blocks .entry-content');
    mainContainer.classList.add(fadeOutAnimation);
}