<?php

class MemoryGamePageMemoryGameModuleFrontController extends ModuleFrontController{

    // public $auth = true;
    // public $guestAllowed = false;

    public function __construct(){
        parent::__construct();
    }

    public function initContent(){
        parent::initContent();
        //On va chercher toutes les images en BDD
        $idImages = Image::getAllImages();
        //Avec les id on construit un tableau répertoriant les chemin des images
        $arrayPath = MemoryGamePageMemoryGameModuleFrontController::arrayImagePath($idImages);
        //On récupère aléatoirement des paires dans le tableau précédent
        $randomArray = MemoryGamePageMemoryGameModuleFrontController::randomArrayForCards($arrayPath);
        //On assigne des valeurs au tableau pour les utiliser dans le fichier tpl
        $tpl_vars = [
            'randomArray' => $randomArray,
            'code' => '',
            ];
        //Si il y a la condition de victoire dans la query string on crée un objet CartRule que l'on sauvegarde en BDD
        if(isset($_GET['victory']) && $_GET['victory'] == 1){
            $cartRule = new CartRule();
            $cartRule->name[1] = 'Réduction Memory Game';
            $cartRule->code = $this->codeGenerator();
            $cartRule->date_from = '2023-01-01 00:00:00';
            $cartRule->date_to = '2023-12-31 00:00:00';
            $cartRule->reduction_percent = Configuration::get('MEMORY_PROMOTION');
            $cartRule->save();
            $tpl_vars['code'] = $cartRule->code;
        }
        //On fait le lien avec la variable tpl_vars et la page tpl
        $this->context->smarty->assign($tpl_vars);
        $this->setTemplate('module:memorygame/views/template/front/front.tpl');
    }

    //Ecriture des chemins d'images depuis un tableau possédant les id des images
    public static function arrayImagePath($idImages){
        $arrayImagePath = [];
        foreach($idImages as $idImage){
            $image = new Image();
            $image->id = $idImage['id_image'];
            $path = __PS_BASE_URI__.'img/p/'.$image->getExistingImgPath().'-home_default.jpg';
            $arrayImagePath[] = $path;
        }
        return $arrayImagePath;
    }

    //Alimente un tableau avec des paires de chemin d'image aléatoire, hormis la dernière
    public static function randomArrayForCards($arrayImagePath){
        $randomArray = [];
        $counter = count($arrayImagePath)-1;
        for($i=0; $i<9; $i=$i+2){
            $randomIndex = rand(0,$counter);
            while(in_array($arrayImagePath[$randomIndex],$randomArray)) {
                $randomIndex = rand(0,$counter);
            }
             $randomArray[$i] = $arrayImagePath[$randomIndex];
             if ($i < 8) {
                $randomArray[$i+1] = $arrayImagePath[$randomIndex];
             }
        }
        shuffle($randomArray);
        return $randomArray;
    }

    //Générateur de code aléatoire
    public function codeGenerator(){
        $string = 'AZERTYUIOPQSDFGHJKLMWXCVBN1234567890';
        $code = '';
        for($i = 0; $i < 11; $i++){
            $num = rand(0,strlen($string)-1);
            $code.=$string[$num];
        }
        return $code;
    }
}