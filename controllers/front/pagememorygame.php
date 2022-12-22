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
        $tpl_vars = [
                    'link' => 'page normal',
                 ];
        $this->context->smarty->assign($tpl_vars);
        $this->setTemplate('module:memorygame/views/template/front/front.tpl');
    }

    public static function randomNumber(){
        return rand(0,Configuration::get('MEMORY_PROMOTION'));
    }

    public static function codeGenerator(){
        $string = 'AZERRTYSDPKDFBCVKLBCVWXLCMVSDFLSFSDFJSLD23146468';
        $code = '';
        for($i = 0; $i < 9; $i++){
            $num = rand(0,strlen($string)-1);
            $code.=$string[$num];
        }
        return $code;
    }
}