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
        $tpl_vars = [
                    'arrayPath' => $arrayPath,
                 ];
        $this->context->smarty->assign($tpl_vars);
        $this->setTemplate('module:memorygame/views/template/front/front.tpl');
    }

    // public static function randomNumber(){
    //     return rand(0,Configuration::get('MEMORY_PROMOTION'));
    // }

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
}