<?php $this->extend('template') ?>

<?php $this->section('content') ?>
<div class = container>
    <div class = row>
        <div class=" offset-3 col-6 text-center row_space">
            <h1>Error</h1>
            <hr>
            <div class="alert alert-danger" role="alert">
                <?php echo $config->errorPageMessage ?>
                <br>
                <br>
                <a href='<?=site_url($config->errorBackPage)?>' class ='btn btn-warning'><?php echo $config->errorButton ?></a>
            </div>
            <hr>
            <br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>
</div>



<?php $this->endSection() ?>