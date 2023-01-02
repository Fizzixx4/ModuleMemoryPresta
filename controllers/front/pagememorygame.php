<?php

class MemoryGamePageMemoryGameModuleFrontController extends ModuleFrontController{

    // public $auth = true;
    // public $guestAllowed = false;

    public function __construct(){
        parent::__construct();
    }

    public function initContent(){
        parent::initContent();
        $idImages = Image::getAllImages();
        $arrayPath = MemoryGamePageMemoryGameModuleFrontController::arrayImagePath($idImages);
        $randomArray = MemoryGamePageMemoryGameModuleFrontController::randomArrayForCards($arrayPath);
        $tpl_vars = [
                    'randomArray' => $randomArray,
                 ];
        $this->context->smarty->assign($tpl_vars);
        $this->setTemplate('module:memorygame/views/template/front/front.tpl');
    }

    // public static function codeGenerator(){
    //     $string = 'AZERTYUIOPQSDFGHJKLMWXCVBN1234567890';
    //     $code = '';
    //     for($i = 0; $i < 9; $i++){
    //         $num = rand(0,strlen($string)-1);
    //         $code.=$string[$num];
    //     }
    //     return $code;
    // }

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
        $initialArray = [];
        $counter = count($arrayImagePath)-1;
        for($i=0; $i<9; $i=$i+2){
            $randomIndex1 = rand(0,$counter);
            while(in_array($arrayImagePath[$randomIndex1],$initialArray)) {
                $randomIndex1 = rand(0,$counter);
            }
             $initialArray[$i] = $arrayImagePath[$randomIndex1];
             if ($i < 8) {
                $initialArray[$i+1] = $arrayImagePath[$randomIndex1];
             }
        }
        shuffle($initialArray);
        return $initialArray;
    }
}