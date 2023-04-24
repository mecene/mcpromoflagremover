{if isset($message) && $message == 'success'}

  <div class="alert alert-success">{l s='All "on sale" labels have been destroyed' mod='mcpromoflagremover'}</div>

{/if}

{if isset($message) && $message == 'error'}

  <div class="alert alert-danger">{l s='The SQL request has failed' mod='mcpromoflagremover'} </div>

{/if}


{if $products_all}



  <div 

  class="btn btn-default " 

  data-toggle="pstooltip" 

  data-placement="bottom" 

  data-original-title={l s='Remove "on sale" labels from products and products list' mod='mcpromoflagremover'}

  >

    <a href="{$button_url}" 

        title="supprimer" >

        {$button_label}

    </a>

  </div>

  <h4>{l s='List of the products with the label "on sale"' mod='mcpromoflagremover'}</h4>

  <ul class="list-group" style="margin-top:20px">

  {foreach from=$products_all item=product}

    <li class="list-group-item">{$product['name']}</li>

  {/foreach}

  </ul>

  {else}

    <b>{l s='There are no products with "on sale" label' mod='mcpromoflagremover'}</b>
    <a style="margin-left:20px" href="{$catalog_products_url}">{l s='Go to products page' mod='mcpromoflagremover'}</a>

{/if}

