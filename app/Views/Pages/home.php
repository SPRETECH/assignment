<?= $this->extend('main') ?>

<?= $this->section('body-content') ?>

<?= $this->include('Components/header') ?>

    <div class="container">
        <div class="row">
            <a href="/create-asset" class="btn btn-primary shadow-sm">Create Asset</a>
        </div>
    </div>


<?= $this->endSection() ?>