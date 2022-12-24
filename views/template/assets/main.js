//On déclare une variable correspondant aux éléments card
const cards = document.querySelectorAll('.cardMemo');

//On déclare une variable correspondant à la div où sera affiché si l'utilisateur a gagné ou perdu
const displayVictoryLoose = document.querySelector('.displayVictoryLoose');

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

//On déclare la variable qui indiquera si la partie est finie
let isFinished = false;

    //On déclenche au click de l'élément la rotation
    cards.forEach(card => card.addEventListener('click', ()=>{
        //On regarde si la partie est fini ou pas
        if(isFinished !== true){
            //On regarde si une carte n'est pas déjà retourné pou éviter les double clic sur une carte
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
                    //Comparaison des deux cartes retournées, incrémentation des points error ou success. En cas d'erreur, après un délai les cartes se re-retournent, sinon elles restent face visible.
                    if(flippedCard === 2){
                        if(pathImg1 === pathImg2){
                            success ++;
                        }
                        else{
                            setTimeout(removeRotated, 1000, card1, card2);
                            error ++;
                        }
                        resetValues();
                    }
                }
            
            }
        finsihGame();
        }
    }))


/**
 * Check que deux cartes maximum soient retournées 
 */
function removeRotated(card1,card2){
    card1.classList.remove('rotated');
    card2.classList.remove('rotated');
}

/**
 * Reset des valeurs path, card et compteur
 */
function resetValues(){
    pathImg1 = '';
    card1 = null;
    pathImg2 = '';
    card2 = null;
    flippedCard = 0;
}

/**
 * Si le nombre d'erreur ou de paire atteint le nombre return vrai pour indiquer que la partie est finie
 */
function finsihGame(){
    if(error === 3){
        displayVictoryLoose.textContent = 'Perdu';
        isFinished = true;
    }
    if(success === 4){
        displayVictoryLoose.textContent = 'Gagné';
        isFinished = true;
    }
}