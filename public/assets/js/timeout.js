let options = {
    rootMargin: '0px',
    threshold: 0.5
}

let goup = document.querySelector('.goup');

if(goup) {
    let coLog = function (entries, observer) {
        if (window.screen.width > 1199) {
            if (entries[0].isIntersecting) {
                goup.style.display = "flex";
            }
        }
    }

    let hidearrow = function (entries, observer) {
        if (window.screen.width > 1199) {
            if (entries[0].isIntersecting) {
                goup.style.display = "none";
            }
        }
    }


    let observer = new IntersectionObserver(coLog, options)
    let hidebtn = new IntersectionObserver(hidearrow, options)
    let about = document.querySelector('.about')
    let product = document.querySelector('.categories')
    observer.observe(about)
    hidebtn.observe(product)
}


