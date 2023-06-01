<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">Navbar</a>

            <div>

                <?php
                if (session()->get('id')) {
                ?>
                    <a href="/create-asset" class="btn btn-primary btn-sm">Create Asset</a>
                    <a href="/logout" class="btn btn-primary btn-sm">Logout</a>
                <?php
                } else {
                ?>

                    <a href="/register" class="btn btn-primary btn-sm">Register</a>

                    <a href="/" class="btn btn-primary btn-sm">Login</a>
                <?php
                }
                ?>
            </div>
        </div>

    </nav>
</div>