const menus1 = document.querySelectorAll('.menu1');
const menu2 = document.querySelectorAll('.menu2');
const menu3 = document.querySelectorAll('.menu3');
const menu4 = document.querySelectorAll('.menu4');
const text1 = document.querySelector('#text1');
const text2 = document.querySelector('#text2');
const text3 = document.querySelector('#text3');
const text4 = document.querySelector('#text4');

menus1.forEach(menu => {
    menu.addEventListener('mouseover', () => {
        console.log('Menu 1 hovered');
        text1.classList.remove('hidden');
    });
    menu.addEventListener('mouseout', () => {
        text1.classList.add('hidden');
    });
});
menu2.forEach(menu => {
    menu.addEventListener('mouseover', () => {
        console.log('Menu 2 hovered');
        text2.classList.remove('hidden');
    });
    menu.addEventListener('mouseout', () => {
        text2.classList.add('hidden');
    });
});
menu3.forEach(menu => {
    menu.addEventListener('mouseover', () => {
        console.log('Menu 3 hovered');
        text3.classList.remove('hidden');
    });
    menu.addEventListener('mouseout', () => {
        text3.classList.add('hidden');
    });
});
menu4.forEach(menu => {
    menu.addEventListener('mouseover', () => {
        console.log('Menu 4 hovered');
        text4.classList.remove('hidden');
    });
    menu.addEventListener('mouseout', () => {
        text4.classList.add('hidden');
    });
});
