<?php $v->layout("_theme"); ?>
<div class="users">
    <?php if (!$users) :
        foreach ($users as $user) :

            ?>
            <article class="users_user">
                <h3><?= $user->email, " ", $user->cpf; ?></h3>
            </article>

        <?php

            endforeach;
        else :
            ?>
        <h4>Não existem usuários cadastrados!;
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, eligendi.</p>

        <?php

        endif; ?>
</div>

<?= $v->start("scripts"); ?>
<script type="text/javascript">
    /* var json = {
        "data": [{
            "first_name": "Usuário",
            "last_name": "Sobrenome",
            "email": "email@gmail.com",
            "pwd": "senha"
        }]
    }

    console.log(json.data[0].last_name); */
</script>

<?= $v->end(); ?>