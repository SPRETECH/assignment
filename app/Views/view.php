<ul>
    <?php foreach ($users as $key => $user) : ?>

        <li><?= ($user->email) ?>
        
        <form action="/tets/delete">
            <?= csrf_field() ?>
            <input type="hidden" value="<?= $user->id ?>" name="user_id">
        <div class="btn btn-primary">Delete</div>

        </form>
        </li>

    <?php endforeach ?>
</ul>