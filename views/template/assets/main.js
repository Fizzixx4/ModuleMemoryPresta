//On déclare une variable correspondant à l'élément card
const card = document.querySelector('.cardMemo');

console.log(card.className);
//On déclenche au click de l'élément la rotation
card.addEventListener('click',(e)=>{
    card.classList.toggle('rotated');
    console.log(card.className);
})