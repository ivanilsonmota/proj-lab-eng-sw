<?php $v->layout("_theme"); ?>

<div>
    <?php
    foreach ($users as $user) :
        var_dump($user);
        ?>
        <article class="users_user">
            <h3><?= $user->first_name, " ", $user->last_name, "<br/> ", $user->email, "<br/>", $user->pwd; ?></h3>

        </article>
    <?php
    endforeach;
    ?>
</div>