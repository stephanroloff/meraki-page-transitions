export default function allColorCombinationsGenerator(allPagesColorsObject, body, element) {
    let colorCurrentPage;
    let colorPageWeAreGoingTo;

    allPagesColorsObject.forEach(colorObj => {
        if(body.classList.contains(colorObj.bodyClassName)){
            colorCurrentPage = colorObj.backgroundColor;

            allPagesColorsObject.forEach(colorObj => {
                if(element.classList.contains(colorObj.menuClassName)){
                    colorPageWeAreGoingTo = colorObj.backgroundColor;
                }
            })
        }
    });

    return {colorCurrentPage, colorPageWeAreGoingTo}
}