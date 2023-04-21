<?php

# /modules/mcpromoflagremover/mcpromoflagremover.php


/**

 * Mc Label promo destructeur - A Prestashop Module

 * 

 * Retire les labels promo des produits et listes de produits

 * 

 * @author Clement brule <>

 * @version 0.0.1

 */



 class AdminMcpromoflagremoverController extends ModuleAdminController

{

    public function __construct()

    {

        parent::__construct();

        $this->bootstrap = true;

        $this->id_lang = $this->context->language->id;

        $this->default_form_language = $this->context->language->id;



        parent::__construct();

    }

    public function initContent()

    {

        parent::initContent();

        $message = 'success';

        $sql = 'UPDATE '._DB_PREFIX_.'product SET on_sale=0 WHERE on_sale=1';

        if (!Db::getInstance()->execute($sql))

        	$mesage = 'error';

        $sql = 'UPDATE '._DB_PREFIX_.'product_shop SET on_sale=0 WHERE on_sale=1';

        if (!Db::getInstance()->execute($sql))

            $mesage = 'error';

        return Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules').'&configure=mcpromoflagremover&message=' . urlencode($message));

    } 

}













