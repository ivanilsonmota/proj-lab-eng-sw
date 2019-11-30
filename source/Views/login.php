<?php $v->layout("_theme"); ?>
<?= $err; ?>

<?php if (!isset($_SESSION["login"])) : ?>
    <div class="login">
        <form action="<?= url("login"); ?>" method="post" ?>
            <input type="email" name="email" placeholder="Informe seu email" /><br />
            <input type="password" name="pass" placeholder="Senha" />
            <button type="submit" name="submit">Entrar</button>
        </form>
    </div>
<?php
    else:
        header("Location: " . url(""));
    endif;
?>