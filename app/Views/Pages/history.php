<?= $this->extend('main') ?>

<?= $this->section('body-content') ?>
<?= $this->include('Components/header') ?>

<?php

use App\Models\AssetHistoryModel;
use App\Models\UserModel;

if (session()->get('success')) {
?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php

}
if (session()->get('fail')) {

?>
    <div class="alert alert-danger" role="alert">
        <?= session()->get('fail') ?>
    </div>

<?php
}

?>


<div class="container overflow-auto">
    <div class="row">
        <?php
        if (isset($history)) {
            if (count($history) > 0) {
                // foreach ($assets as $key => $asset) {
        ?>
                <table class="table table-hover  overflow-hidden">
                    <thead>
                        <tr>
                            <th >Asset Name</th>
                            <th >Action</th>
                            <th >User</th>
                            <th >Time</th>
                         
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($history as $key => $hist) {
                        ?>
                            <tr>
                                
                                <td >  
                                    <?php 
                                    if(isset($asset)){
                                        if(count($asset) > 0){
                                            ?>

<?= $asset['name'] ?? "" ?>
                                            <?php
                                        }
                                    }
                                    ?> 
                                
                            
                                </td>
                                <td ><?= $hist['action'] ?? "" ?></td>
                                <td >
                                <?php
                                $historyModel = new AssetHistoryModel();

                                $user = $historyModel->getUser($hist['userId']);
                                ?>
                                
                                <?= $user['name'] ?? "" ?>
                                
                                </td>
                                <td ><?= $hist['createdAt'] ?? "" ?></td>
                               
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>

        <?php
            }
        }
        ?>
    </div>

    <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <a href="/dashboard" class="btn btn-secondary shadow-sm">Go back</a>

                    </div>
                </div>
</div>


<?= $this->endSection() ?>