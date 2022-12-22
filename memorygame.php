<?php

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class Memorygame extends Module implements WidgetInterface{

    private $templateFile;

    public function __construct(){
        $this->name = 'memorygame';
        $this->tab; 
        $this->version = '1.0.0';
        $this->author = 'GK';
        $this->need_instance = 1;
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Memory Game', [],'Module.Memorygame.Admin');
        $this->description = $this->trans('Jeu de mémoire permettant de gagner un code promo', [],'Module.Memorygame.Admin');
        $this->confirmUninstall = 'Vous allez désinstaller Memory Game. Êtes-vous sûr?';

        $this->templateFile = 'module:memorygame/views/template/front.tpl';
    }

    public function install(){
        return parent::install()
        && $this->registerHook('displayHome')
        && $this->registerHook('header')
        && Configuration::updateValue('MEMORY_PROMOTION', 0);
    }

    public function uninstall(){
        return parent::uninstall()
        && $this->unregisterHook('displayHome');
    }

    public function hookHeader(){
        $this->context->controller->registerStylesheet(
            'module-memorygame-style',
            'modules/'.$this->name.'/views/template/assets/main.css',
            [
                'media' => 'all',
                'priority' => 200
            ]
        );
    }

    public function getWidgetVariables($hookName, array $configuration){
        return [
            'number' => Configuration::get('MEMORY_PROMOTION'),
            'link' => Context::getContext()->link->getModuleLink('memorygame','pagememorygame',['generate'=>0])
        ];
    }

    public function renderWidget($hookName, array $configuration){
        $templateVars = $this->getWidgetVariables($hookName, $configuration);
        $this->smarty->assign($templateVars);
        return $this->fetch($this->templateFile);
    }

    public function getContent(){
        $output = $this->post_validate();
        return $output.$this->renderForm();
    }

    private function post_validate(){
        $output = '';
        $errors = [];
        if(Tools::isSubmit('submitMemo')){
            $number = Tools::getValue('percentagePromotion');
            if((!Validate::isInt($number)) || $number<0 || $number>100){
                $errors[] = 'Il faut que la saisie soit un entier positif compris entre 0 et 100';
            }
            if(count($errors) > 0){
                $output = $this->displayError(implode('<br>',$errors));
            }
            else{
                Configuration::updateValue('MEMORY_PROMOTION',$number);
                $output = $this->displayConfirmation("La valeur maximum de promotion sera de $number%");
            }
        }
        return $output;
    }

    private function renderForm(){
        $fields_form = [
            'form' =>[
                'legend' => [
                    'title' => $this->trans('Settings', [], 'Admin.Global'),
                    'icon' => 'icon.org'
                ],
                'description' => $this->trans('Promotion Randomizer',[], 'Modules.Memorygame.Admin'),
                'input' => [
                    [
                        'type' => 'text',
                        'name' => 'percentagePromotion',
                        'label' => $this->trans('Number for the promotion in %', [], 'Modules.Memorygame.Admin'),
                        'required' => 1
                    ],
                ],
                'submit' => [
                    'title' => $this->trans('Save',[],'Admin.Actions'),
                ]
            ]
        ];

        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitMemo';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = [
            'fields_value' => $this->getConfigFieldsValue(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        ];

        return $helper->generateForm([$fields_form]);
    }

    public function getConfigFieldsValue(){
        return [
            'percentagePromotion' => Tools::getValue('percentagePromotion', Configuration::get('MEMORY_PROMOTION'))
        ];
    }
}