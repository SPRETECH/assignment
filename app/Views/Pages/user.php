<?= $this->extend('main') ?>

<?= $this->section('body-content') ?>


<?php

if(session()->get('success')){

    ?>
    <div class="alert alert-primary" role="alert">
    <?= session()->get('success') ?>
    </div>
    <?php

}else{

    ?>
    <div class="alert alert-primary" role="alert">
    <?= session()->get('fail') ?>
    </div>

    <?php
}

?>

<?php
if (isset($data)) {

    if (count($data) > 0) {
        foreach ($data as $key => $user) {
?>
            <ul>
                <li><?= $user['name'] ?> => <?= $user['email'] ?>

                    <form action="/delete-user" method="post" enctype="multipart/form-data">

                        <input type="hidden" value="<?= $user['id'] ?>" name="user_id">
                        <button type="submit"> delete</button>
                    </form>

                    <a href="/update-user/<?= $user['id'] ?>" class="btn">Update</a>
                  
                </li>
            </ul>
<?php
        }
    }
}

if(!isset($updateUser)){


?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <form action="/test" enctype="multipart/form-data" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input name="name" type="text" class="form-control" id="name" value="<?= set_value('name') ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= set_value('email') ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="<?= set_value('password') ?>">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="confirm">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php 
}
if(isset($updateUser)){
    if(count($updateUser) > 0){
        ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <form action="/update-user" enctype="multipart/form-data" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input name="name" type="text" class="form-control" id="name" value="<?= $updateUser['name'] ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $updateUser['email'] ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="confirm">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <input type="hidden" value="<?= $updateUser['id'] ?>" name="user_id">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
        <?php
    }
}
?>

<?= $this->endSection() ?>