<?= $this->extend('main') ?>

<?= $this->section('body-content') ?>

<?= $this->include('Components/header') ?>
<!-- 
<?php

if(session()->get('success')){

    ?>
    <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
    </div>
    <?php

}else{

    ?>
    <div class="alert alert-danger" role="alert">
    <?= session()->get('fail') ?>
    </div>

    <?php
}

?> -->


<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <h1 class="text-center">Login</h1>
            <br>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="/user-login" method="post">
                <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

