//On déclare une variable correspondant à l'élément card
const cards = document.querySelectorAll('.cardMemo');

console.log(cards.className);
//On déclenche au click de l'élément la rotation
cards.forEach(card => card.addEventListener('click',()=>{
    card.classList.toggle('rotated');
    console.log(card.className);
}))