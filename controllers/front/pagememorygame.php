<?php

class MemoryGamePageMemoryGameModuleFrontController extends ModuleFrontController{

    // public $auth = true;
    // public $guestAllowed = false;

    public function __construct(){
        parent::__construct();
    }

    public function initContent(){
        parent::initContent();
        // if (isset($_GET['generate']) && $_GET['generate']== 0) {
        //     $tpl_vars = [
        //         'link' => 'page get'
        //     ];
        //     $this->context->smarty->assign($tpl_vars);
        //     $this->setTemplate('module:zloterie/views/template/front/front.tpl');
        // } else {
        //     $number = ZLoteriePagezloterieModuleFrontController::randomNumber();
        //     $code = ZLoteriePagezloterieModuleFrontController::codeGenerator();
        //     $tpl_vars = [
        //         'link' => 'page normal',
        //         'number' => $number,
        //         'code' => $code
        //     ];
        //     $this->context->smarty->assign($tpl_vars);
        //     $this->setTemplate('module:zloterie/views/template/front/coupon.tpl');
        //}
        $idImages = Image::getAllImages();
        $arrayPath = MemoryGamePageMemoryGameModuleFrontController::arrayImagePath($idImages);
        $tpl_vars = [
                    //'idImages' => var_dump($idImages),
                 ];
        $this->context->smarty->assign($tpl_vars);
        $this->setTemplate('module:memorygame/views/template/front/front.tpl');
    }

    public static function randomNumber(){
        return rand(0,Configuration::get('MEMORY_PROMOTION'));
    }

    public static function codeGenerator(){
        $string = 'AZERTYUIOPQSDFGHJKLMWXCVBN1234567890';
        $code = '';
        for($i = 0; $i < 9; $i++){
            $num = rand(0,strlen($string)-1);
            $code.=$string[$num];
        }
        return $code;
    }

    //Ecriture des chemins d'images depuis un tableau possédant les id des images
    public static function arrayImagePath($idImages){
        //"http://localhost:8888/Prestashop/prestashop/img/p/1/0/10-home_default.jpg"
        $arrayImagePath = [];
        $pathPrefix = "http://localhost:8888/Prestashop/prestashop/img/p/";
        $pathSufix = "-home_default.jpg";
        foreach($idImages as $idImage){
            //Pour éviter les images des produits par défaut
            if($idImage['id_image']> 9){
                $id = $idImage['id_image'];
                $idPrefix = substr($id, 0, -1);
                $idSufix = substr($id, -1);
                $path = $pathPrefix.$idPrefix.'/'.$idSufix.'/'.$id.$pathSufix;
                $arrayImagePath[] = $path;
            }
        }
        return $arrayImagePath;
    }
}