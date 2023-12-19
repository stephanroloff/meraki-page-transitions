import elementsFadeOut from './elements-fade-out'
import redirection from './redirection'
import bodyFadeOutCurrentPageColortoNextPageColor from './bodyFadeOutCurrentPageColortoNextPageColor'
import {allPagesColorsObject} from '../otherFuntions/generateAllPagesColorsObject'
import {
menuLiClass,
timeToWaitBeforeRedirect,
menuItemActiveColor,
} from '../variables/variables'

/*
transition page:
1-fade out effect
2-fade in effect
3-time to wait before redirect

transition elements inside the page
1-fade out effect
2-fade in effect
*/

setTimeout(function(){ 
    let AllAnchorElements = [];
    allPagesColorsObject.forEach( color =>{
        let listAnchorElements = document.querySelectorAll(`a.${color.menuClassName}`);
        if(listAnchorElements){
            listAnchorElements.forEach( item => {
                AllAnchorElements.push(item);
            })
        }
    })  

    AllAnchorElements.forEach(element => {
        element.addEventListener('click',(e)=>{
            e.preventDefault();
    
            bodyFadeOutCurrentPageColortoNextPageColor(allPagesColorsObject, element)
            elementsFadeOut();
            redirection(element, timeToWaitBeforeRedirect);
        })
    });
}, 100)

//Esto hace que el item clickeado del menu si marca inmediatamente y no recien cuando cargue la nueva pagina.
let menuHeader = document.querySelectorAll(menuLiClass);
menuHeader.forEach(element =>{
    element.addEventListener('click', ()=>{
        menuHeader.forEach(el =>{
            if(el.classList.contains('current-menu-item')){
                el.classList.remove('current_page_item');
                el.classList.remove('current-menu-item');
            }
        })
        element.childNodes[0].style.color = menuItemActiveColor;
    })
})