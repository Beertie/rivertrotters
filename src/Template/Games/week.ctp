<div class="add-order-page">

    <div id="page-title">
        <h1><?= __('Wedstrijden') ?></h1>
    </div>

    <nav id="actions">
        <div class="text-center">
            <a href="#" class="btn btn-default add-product"> <?php echo __("Week <br> 1"); ?></a>
            <a href="#" class="btn btn-default add-product"> <?php echo __("Week <br> 2"); ?></a>
            <a href="#" class="btn btn-default add-product"> <?php echo __("Week <br> 3"); ?></a>
            <a href="#" class="btn btn-default add-product"> <?php echo __("Week <br> 4"); ?></a>
            <a href="#" class="btn btn-default add-product"> <?php echo __("Week <br> 5"); ?></a>
            <a href="#" class="btn btn-default add-product"> <?php echo __("Week <br> 6"); ?></a>
            <a href="#" class="btn btn-default add-product"> <?php echo __("Week <br> 7"); ?></a>
        </div>


    </nav>



    <div class="row add-order mb-0">

        <div class="col-md-12">

            <?php
            foreach ($week as $value){

                ?>

            <div class="col-md-3 col-md-offset-2 game">

                <div class="col-md-4 text-center">
                <?= $value->thuis_ploeg ?>
                </div>
                <div class="col-md-4 text-center">
                    <h4><?php echo date("H:i", strtotime($value->datum));?></h4>
                    <br>
                    <?php echo date("Y-m-d", strtotime($value->datum));?>
                </div>
                <div class="col-md-4 text-center">
                <?= $value->uit_ploeg?>
                </div>
            </div>

            <?php } ?>

        </div>

    </div>



</div>