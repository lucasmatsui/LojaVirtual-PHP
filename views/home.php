<div class="row">
<?php foreach($list as $product_item): ?>
    <div class="col-sm-4">
        <?php $this->loadView('product_item', $product_item); ?>
    </div>  
<?php endforeach; ?>
</div>
