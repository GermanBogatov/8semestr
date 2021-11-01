<? require_once DIR_PATH_APP . '/views/admin/header.php' ?>
<?if ( count($this->arResult["ITEMS"])>0):?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Код</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Доступность</th>
            <th>Активность</th>
            <th>Описание</th>
            <th>АК</th>
            <th>ДК</th>
            <th>К</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<? foreach ($this->arResult["ITEMS"] as $product):?>
        <tr>
   
            <td><?=$product["id"]?></td>
            <td><?=$product["name"]?></td>
            <td><?=$product["code"]?></td>
            <td><?=$product["sections_id"]?></td>
            <td><?=$product["price"]?></td>
            <td><?=$product["amount"]?></td>
            <td><?=$product["active"]?></td>
            <td><?=$product["description"]?></td>
            <td><?=strlen($product["p_img"]) > 0 ? "<img src='".MAIN_PREFIX."/upload/{$product["p_img"]}' width='50px'/>": ""?></td>
            <td><?=strlen($product["d_img"]) > 0 ? "<img src='".MAIN_PREFIX."/upload/{$product["d_img"]}' width='50px'/>": ""?></td>
            <td><?
            $imgs = json_decode($product["imgs"]);
            if (is_array($imgs) && count($imgs) > 0 ){
                foreach ($imgs as $img){
                    echo "<img src='".MAIN_PREFIX."/upload/$img' width='50px'/>" ;
                }
            }
            
                    ?></td>
            <td>
                
                <button onclick="sectionDelete(<?=$product["id"]?>, '<?=$product["name"]?>')" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
    <tfoot></tfoot>
</table>
<?else:?>
<div class="alert alert-danger error_danger"  role="alert">
                     Нет продуктов по вашему запросу!
                    </div>
<?endif?>
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn-primary" data-toggle="modal" data-target="#new_product_modal">
            Добавить Товар
        </button>
    </div>
</div>



<div class="modal fade" id="new_product_modal" tabindex="-1" role="dialog" aria-labelledby="new_product_modal_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_product_modal_title">Добавление товара</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form_new_product" name="form_new_product" method="post" action="<?= ADMIN_PREFIX ?>/product/add/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none;" role="alert">
                        Произошла ошибка!!!ssss
                    </div>
                    <div class="mx-auto">


                        <div class="form-group">
                            <label for="product_name">Название товара</label>
                            <input type="text" required class="form-control" name="product_name" id="product_name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="product_code">Код товара</label>
                            <input type="text" required class="form-control" name="product_code" id="product_code" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="parent_section">категория</label>
                            <select class="form-control" name="parent_section" id="parent_section">
                                <option value="0" data-depth-level="-1">.</option>
                                <?
                                foreach ($this->sections as $section) {
                                    echo '<option value ="' . $section['id'] . '">' . $section['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Цена</label>
                            <input type="text" required class="form-control" name="product_price" id="product_price" placeholder="">
                        </div>
                        <div class ="checkbox">
                            <label>
                                <input name="product_amount" type="checkbox" value="Y">В наличии
                            </label>
                        </div>
                        <div class ="checkbox">
                            <label>
                                <input name="product_active" type="checkbox" value="Y">Активный
                            </label>
                        </div>
                        <label for="">Описание</label>
                        <textarea name="product_description" class="form-control" rows="3"></textarea>
                        
                        <div class="form-group">
                            <label for="">Картинка анонса</label>
                            <input type="file" class="form-control" name="product_p_img"  >
                        </div>
                        <div class="form-group">
                            <label for="">Детальная картинка</label>
                            <input type="file"class="form-control" name="product_d_img"  >
                        </div>
                        <div class="form-group">
                            <label for="">Дополнительные изображения</label>
                            <input type="file"  class="form-control" name="product_imgs[]" multiple  >
                        </div>
                        

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="add_new_section" >Добавить</button>
                </div>
            </form>
        </div>

    </div> 
</div>

<? require_once DIR_PATH_APP . '/views/admin/footer.php' ?>