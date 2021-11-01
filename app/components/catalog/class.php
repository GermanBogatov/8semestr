<?php

namespace Components;
use Libs\App;

class catalog extends \Libs\Components {

    public function executComponent() {
        
//       if ($section = App::getController('sections')) {
//           $sections = $section->getList();
//           $this->arResult["SECTIONS"] = $section->getList();
//       }
       if ($product = App::getController('products')) {
           // здесь где-то по середине var_dump($product);
           $products = $product->getList();
           $this->arResult["PRODUCTS"] = $product->getList();
       }
      // Здесь мы уже в конце подключения var_dump($this->arResult["PRODUCTS"]);
        $this->includeTemplate();
        
    }
}
