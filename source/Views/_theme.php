<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <title><?= $title; ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?= url("source/Views/Assets/css/style.css"); ?>" />
</head>

<body>
    <nav class="main-nav">
        <?php if ($v->section("sidebar")) :
            echo $v->section("sidebar");
        else :
            ?>
            <a href="<?= url(); ?>" title="">Home</a>
            <a href="<?= url("contato"); ?>" title="">Contato</a>
            <a href="<?= url("concessionarias"); ?>" title="">Concessionárias</a>
            <a href="<?= url("pedidos"); ?>" title="">Pedidos</a>

            <!-- <a href="<?= url("api/v1/usuarios"); ?>" title="">API</a> -->
            <?php
                if (isset($_SESSION["login"])) :
                    ?>
                <label>Bem vindo, </label><?= $_SESSION["login"]["user"]; ?>
                <a href="<?= url("logout"); ?>" title="">Logout</a>
            <?php
                else :
                    ?>
                <a href="<?= url("login"); ?>" title="">Login</a>
            <?php
                endif;
                ?>
        <?php
        endif;
        ?>

    </nav>
    <main class="main-content">
        <?= $v->section("content"); ?>
    </main>
    <footer class="main-footer">
        <?= SITE; ?> - Todos os Direitos Reservados
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="<?= url("/source/Views/Assets/js/script.css"); ?>"></script>
    <?= $v->section("scripts"); ?>
</body>

</html>