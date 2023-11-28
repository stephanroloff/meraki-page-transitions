let allLinks = document.querySelectorAll('.all-content a');

slugColorRelationship.forEach(element =>{
    
    let slug = element[0].toLowerCase()
    
    allLinks.forEach(link => {
        let url = link.href.toLowerCase();

        if(url.includes(slug)){
            let newClass = `next-page-${element[1]}`
            link.classList.add(newClass);
        }
    });
})