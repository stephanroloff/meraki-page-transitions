//Viene del Backend, enviado desde php
// console.log(allBackgroundColors);

let allObjects=[];

allBackgroundColors.forEach(color =>{

    var strWithHashtag = color.background_color;

    // Utilizar replace para quitar el carácter #
    var strWithoutHashtag = strWithHashtag.replace(/#/g, '');
    
    allObjects.push({
        menuClassName: `next-page-${strWithoutHashtag}`,
        bodyClassName: `body-bg-${strWithoutHashtag}`,
        backgroundColor: `${strWithHashtag}`
    })
});

export let allPagesColorsObject = allObjects;