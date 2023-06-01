<?= $this->extend('main') ?>

<?= $this->section('body-content') ?>
<?= $this->include('Components/header') ?>

<?php

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


<div class="container">
    <div class="row">
        <?php
        if (isset($assets)) {
            if (count($assets) > 0) {
                // foreach ($assets as $key => $asset) {
        ?>
                <table id="asset-table">
                    <thead>
                        <tr>
                            <th >Name</th>
                            <th >description</th>
                            <th >installationYear</th>
                            <th >expectedUsefulLife</th>
                            <th >renewableYear</th>
                            <th >condition</th>
                            <th >quantity</th>
                            <th >created by</th>
                            <th >unitCost</th>
                            <th >estimatedCost</th>
                            <th >createdAt</th>
                            <th >updatedAt</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($assets as $key => $asset) {
                        ?>
                            <tr>
                                <td >

                                <a class="text-decoration-none" href="/history/<?= $asset['id'] ?? "" ?>">
                                <?= $asset['name'] ?? "" ?>
                                </a>
                                </td>
                                <td ><?= $asset['description'] ?? "" ?></td>
                                <td ><?= $asset['installationYear'] ?? "" ?></td>
                                <td ><?= $asset['expectedUsefulLife'] ?? "" ?></td>
                                <td ><?= $asset['renewableYear'] ?? "" ?></td>
                                <td ><?= $asset['condition'] ?? "" ?></td>
                                <td ><?= $asset['quantity'] ?? "" ?></td>
                                <td ><?php
                                                $userModel = new UserModel();
                                                $user = $userModel->find($asset['userId']);
                                                ?>
                                <td ><?= $user['name'] ?></td>
                                <?php
                                ?></td>
                                <td ><?= $asset['unitCost'] ?></td>
                                <td ><?= $asset['estimatedCost'] ?></td>
                                <td ><?= $asset['createdAt'] ?></td>
                                <td ><?= $asset['updatedAt'] ?></td>
                                <td>
                                    <a href="/delete-asset/<?= $asset['id'] ?>" class="btn btn-primary btn-sm">Delete</a>
                                    <a href="/edit-asset/<?= $asset['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>


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
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#asset-table').DataTable();
});
</script>

<?= $this->endSection() ?>