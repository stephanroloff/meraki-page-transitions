import {fadeInAnimation} from '../variables/variables'

export default function elementsFadeIn() {
    let mainContainer = document.querySelector('.wp-site-blocks .entry-content');
    mainContainer.classList.add(fadeInAnimation);
}