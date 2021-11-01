<h1>
    CATALOG
</h1>


   

<?if (is_array($arResult['PRODUCTS'])):?>
        
        
        
       
            <?
            foreach ( $arResult['PRODUCTS'] as $product){
               ?>
           
<div class="row align-items-start">
               <div class="col-md-7 ">
             
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          
          <h3 class="mb-0 text-white"  ><?=$product["name"]?></h3>
          <div class="mb-1 text-muted text-white"><?=$product["price"]?> рублей</div>
          <p class="card-text mb-auto text-white">Описание: <br> <?=$product["description"]?></p>
          <? if ($product["amount"] == 1) :?>
          <p class="card-text mb-auto text-white">Товар в наличии</p>
          <?else:?> 
          <p class="card-text mb-auto text-white">Товар отсутсвует</p>
          <? endif;?>
          
          <button type="submit" class="btn btn-primary" onclick="window.location.href='<?= MAIN_PREFIX ?>/news/'">купить</button>
        </div>
        <div class="col-auto d-none d-lg-block">
           <?=strlen($product["p_img"]) > 0 ? "<img src='".MAIN_PREFIX."/upload/{$product["p_img"]} ' width='300px'/>": ""?>
             
        </div>
     
    </div>
                  </div>
         </div>
            
                   <? 
            }
            ?>
        




<? endif;?>

 







