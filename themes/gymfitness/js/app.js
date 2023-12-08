const swiperGymFitness = () => {
    if (document.querySelector('.swiper')) {
        const opc = {
            autoplay: {
                delay: 2000,
            },
        }
        new Swiper('.swiper', opc)
    }

}
document.addEventListener('DOMContentLoaded', swiperGymFitness)

/* Animacion */
const textWrapper = document.querySelector('.ml2');
if (textWrapper) {
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({ loop: true })
        .add({
            targets: '.ml2 .letter',
            scale: [4, 1],
            opacity: [0, 1],
            translateZ: 0,
            easing: "easeOutExpo",
            duration: 950,
            delay: (el, i) => 70 * i
        }).add({
            targets: '.ml2',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
}

window.onscroll = () => {
    const scroll = window.scrollY
    const barraNav = document.querySelector('.barra_navegacion')
    
    if(scroll > 300) {
        barraNav.classList.add('fixed-top')
    }else {
        barraNav.classList.remove('fixed-top')
    }
}

/* BURGER MENU */
const burgerMenu = document.querySelector('.burger-menu');
burgerMenu.addEventListener('click', () => 
   document.querySelector('.barra-nav').classList.toggle('mostrar')
) 

