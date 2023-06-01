<?= $this->extend('main') ?>

<?= $this->section('body-content') ?>

<?= $this->include('Components/header') ?>


<?php

if(session()->get('success')){

    ?>
    <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
    </div>
    <?php

}
if(session()->get('fail'))
{

    ?>
    <div class="alert alert-danger" role="alert">
    <?= session()->get('fail') ?>
    </div>

    <?php
}

?>

<?php 
if(isset($asset)){
    if(count($asset) > 0){
        ?>



<div class="container-fluid">
    <div class="row justify-content-center text-center">
        <h2>EDIT ASSET</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-sm-12">
            <form action="/save-edit" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Name</label>
                    <input type="text" placeholder="Name of Asset" name="name" class="form-control" id="InputForName" value="<?= $asset['name'] ?? "" ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" placeholder="description.." class="form-control" id="description" value="<?= $asset['description'] ?? "" ?>">
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="installation-year" class="form-label">Installation Year</label>
                            <input type="number" placeholder="Example: 1980" minlength="4" maxlength="4" name="installation_year" value="<?= $asset['installationYear'] ?? "" ?>" class="form-control" id="installation-year">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="expected-useful-life" class="form-label">Ecpected useful Life</label>
                            <input type="number" placeholder="In yearsExample: 50" name="expected_useful_life" value="<?= $asset['expectedUsefulLife'] ?? "" ?>" class="form-control" id="expected-useful-life">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="renewable-year" class="form-label">Renewable Year</label>
                            <input type="number" placeholder="Example: 2040" name="renewable_year" value="<?= $asset['renewableYear'] ?? "" ?>" class="form-control" id="renewable-year">
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="condition" class="form-label">Condition</label>
                    <input type="text" name="condition" placeholder="Example: No Significant deficiencies were observed..." value="<?= $asset['condition'] ?? "" ?>" class="form-control" id="condition">
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" value="<?= $asset['quantity'] ?? "" ?>" placeholder="In numbers Example: 2" class="form-control" id="quantity">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="unit-cost" class="form-label">unit Cost</label>
                            <input type="number" placeholder="Example: 70" value="<?= $asset['unitCost'] ?? "" ?>" name="unit_cost" class="form-control" id="unit-cost">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="estimated-cost" class="form-label">Estimated Cost</label>
                            <input type="number" placeholder="Example: 80" name="estimated_cost" value="<?= $asset['estimatedCost'] ?? "" ?>" class="form-control" id="estimated-cost">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="asset_id" id="asset-id" value="<?= $asset['id'] ?? "" ?>">

                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="/dashboard" class="btn btn-secondary shadow-sm">Go back</a>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php
    }else{
        echo "Record not found";
    }
}
?>


<?= $this->endSection() ?>