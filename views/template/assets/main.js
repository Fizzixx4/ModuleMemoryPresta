//On déclare une variable correspondant à l'élément card
const cards = document.querySelectorAll('.cardMemo');

//On déclare le nombre de paires trouvées et le nombre d'erreur
let success = 0;
let error = 0;

//On déclare deux éléments ainsi que la variable des deux chemins d'image pour pouvoir les comparer par la suite
let card1 = null;
let pathImg1 = '';
let card2 = null;
let pathImg2 = '';

//On déclare un compteur de carte retournée
let flippedCard = 0;

//On déclenche au click de l'élément la rotation
cards.forEach(card => card.addEventListener('click', ()=>{
    if(!(card.classList.contains('rotated'))){
        //Si le compteur est inférieur à 2 alors on peut retourner des cartes
        if(flippedCard < 2){
            card.classList.add('rotated');
            //Initialisation des cards et pathImg pour comparaison
            if(pathImg1 === ''){
                card1 = card;
                pathImg1 = card.children[1].children[0].currentSrc;
            }
            else{
                card2 = card;
                pathImg2 = card.children[1].children[0].currentSrc;
            }
            flippedCard++;
            //Quand deux cartes sont retournées après un délai ça les compare et les re-retourne en cas d'erreur
            if(flippedCard === 2){
                if(pathImg1 === pathImg2){
                    success ++;
                }
                else{
                    setTimeout(twoMaxFlippedCard, 2000, card1, card2);
                    error ++;
                }
                reset();
            }
        }
    }
}));

/**
 * Check que deux cartes maximum soient retournées 
 */
function twoMaxFlippedCard(card1,card2){
    card1.classList.remove('rotated');
    card2.classList.remove('rotated');
}

/**
 * Reset des valeurs path, card et compteur
 */
function reset(){
    pathImg1 = '';
    card1 = null;
    pathImg2 = '';
    card2 = null;
    flippedCard = 0;
}