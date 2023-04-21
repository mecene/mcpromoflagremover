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



if (!defined('_PS_VERSION_')) exit;



class McPromoFlagRemover extends Module

{

	public function __construct()

	{

		$this->initializeModule();

	}



	public function install()

	{

		return

			parent::install()

			&& $this->registerHook('displayAdminProductsFlagRemove')

		;

	}



	public function uninstall()

	{

		return

			parent::uninstall()

			&& $this->unregisterHook('displayAdminProductsFlagRemove')

		;

	}

	

	



	/** Module configuration page */

	public function getContent()

	{

		//return 'Mc Label promo destructeur configuration page !';

		// Create a new instance of the Product class

		$product = new Product();

		// Get all products for the selected language

		$products_all = $product->getProducts($this->context->language->id, 0, 0, 'name', 'ASC', 0, true);

		$flagged_products = array();

		foreach ($products_all as $product) {

			if ($product["on_sale"] == "1") { 

				$flagged_products[] = $product;

			}	

		}

		



		$this->context->smarty->assign(array(



			'button_url' => $this->context->link->getAdminLink('AdminMcpromoflagremover', true),

			'button_label' => $this->l('Delete all labels'),

			'message' => Tools::getValue('message'),

			'catalog_products_url' => $this->context->link->getAdminLink('AdminProducts', true),

			'products_all' => $flagged_products,

			

		));



		return $this->display(__FILE__, '/views/templates/admin/config.tpl');

		

	}





	/** Initialize the module declaration */

	private function initializeModule()

	{

		$this->name = 'mcpromoflagremover';

		$this->tab = 'administration';

		$this->version = '0.0.1';

		$this->author = 'Clement brule';

		$this->need_instance = 0;

		$this->ps_versions_compliancy = [

			'min' => '1.7',

			'max' => _PS_VERSION_,

		];

		$this->bootstrap = true;

		

		parent::__construct();



		$this->displayName = $this->l('Mc Label promo destructeur');

		$this->description = $this->l('Retire les labels promo des produits et listes de produits');

		$this->confirmUninstall = $this->l('Au revoir et a bientot?');

	}

}



