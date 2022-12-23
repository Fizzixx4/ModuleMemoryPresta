//On déclare une variable correspondant à l'élément card
const cards = document.querySelectorAll('.cardMemo');
console.log(cards[0].children[1].children[0].currentSrc);

//On déclare la variable de deux chemins d'image pour pouvoir les comparer par la suite
let pathImg1 = '';
let pathImg2 = '';

//On déclare un compteur de carte retournée
let flippedCard = 0;

//On déclenche au click de l'élément la rotation
cards.forEach(card => card.addEventListener('click',()=>{
    //Si le compteur est inférieur à 2 alors on peut retourner des cartes
    if(flippedCard < 2){
        card.classList.add('rotated');
        flippedCard++;
        //Quand deux cartes sont retournées après un délai ça les re-retourne
        if(flippedCard === 2){
            setTimeout(twoMaxFlippedCard,2000);
        }
    }
}));

//Check que deux cartes maximum soient retournées
function twoMaxFlippedCard(){
    cards.forEach(card => card.classList.remove('rotated'));
    flippedCard = 0;
}