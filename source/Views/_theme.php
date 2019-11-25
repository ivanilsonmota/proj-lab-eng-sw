<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title><?= $title; ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?= url("Views/Assets/css/main.css"); ?>" />
    <style type="text/css">
        body {
            background-color: #000;
            color: #FFF;
        }
    </style>
</head>

<body>
    <nav class="main-nav">
        <?php if ($v->section("sidebar")) :
            echo $v->section("sidebar");
        else :
            ?>
            <a title="" href="<?= url(); ?>">Home</a>
            <a title="" href="<?= url("contato"); ?>">Contato</a>
            <a title="" href="<?= url("concessionarias"); ?>">Concessionárias</a>
            <a title="" href="<?= url("pedidos"); ?>">Pedidos</a>
            <a title="" href="<?= url("login"); ?>">Login</a>
            <a title="" href="<?= url("api/v1/usuarios"); ?>">API</a>
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
    <?= $v->section("scripts"); ?>
</body>

</html>