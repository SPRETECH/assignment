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


<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6 col-lg-6 col-sm-12">
            <h1 class="text-center">Register</h1>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="/register-user" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="InputForName" value="<?= set_value('name') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword">
                </div>
                <div class="mb-3">
                    <label for="InputForConfPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>