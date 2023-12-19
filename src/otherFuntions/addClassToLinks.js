/**
The variable slugColorRelationship comes from the backend of the file slugColorRelationship.php. It is an array that contains information about the background color that each page has.

What will happen in this script is that it will search for all the links within the current page and determine which page each link leads to. Then, based on the array of color-page relationships (slugColorRelationship), a class of "next-page-{color}" will be assigned to the link according to the page it leads to and the corresponding color for that page.

This is done to anticipate the color transition and perform a fade-in effect on the current page before navigating to the next one.
 */

// let allLinks = document.querySelectorAll('body a');
let allLinks = document.querySelectorAll('.wp-site-blocks a');

slugColorRelationship.forEach(element =>{
    
    let slug = element[0].toLowerCase()
    
    allLinks.forEach(link => {
        let url = link.href.toLowerCase();

        if(url == slug){
            let newClass = `next-page-${element[1]}`
            link.classList.add(newClass);
        }
    });
})