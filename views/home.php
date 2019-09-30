<div class="row">
<?php foreach($list as $product_item): ?>
    <div class="col-sm-4">
        <?php $this->loadView('product_item', $product_item); ?>
    </div>  
<?php endforeach; ?>
</div>

<div class="paginationArea">
<?php for($q=1;$q<=$numberOfPages;$q++): ?>
    <div class="paginationItem <?php echo ($currentPage===$q)?'pag_active':''; ?>">
        <a href="<?php echo BASE_URL ?>?p=<?php echo $q; ?>">
            <?php echo $q; ?>
        </a>
    </div>    
<?php endfor; ?>
</div>
