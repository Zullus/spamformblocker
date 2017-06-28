<?php
$s = filter_input(INPUT_GET, "s", FILTER_SANITIZE_NUMBER_INT);
$r = filter_input(INPUT_GET, "r", FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Spam Form Blocker V1.1.1 by XS Informática">
    <meta name="author" content="XS Informática">

    <title>Spam Form Blocker V1.1.1 by XS Informática</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/sb-admin-2.min.css">

    <link rel="shortcut icon" href="xsinformatica.ico">

</head>
<body>

    <div id="wrapper">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <img src="images/logoxs.png" alt="XS Informática" src="XS Informática">
                            Spam Form Blocker V1.1.1 by XS Informática
                        </h1>

                        <?php
                        if($s == 3){
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                E-mail foi bloqueado com sucesso.
                            </div>
                            <?php
                        }

                        if($s != 3 && $s != ''){
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                E-mail não pode ser bloqueado. Motivo: <?php echo $r;?>.
                            </div>
                            <?php
                        }
                        ?>

                        <p>O <strong>Spam Form Blocker by XS Informática</strong> é um sistema de blacklist para evitar que spammers enviem e-mail pelo formulário de contato dos sites.</p>

                        <form action="adicionaremail.php" class="col-lg-6">
                        <!--<form action="bloqueia" method="post">-->
                            <div class="form-group">
                                <label>Adicionoe o e-mail que está fazendo spam</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                            </div>

                            <button type="submit" class="btn btn-warning">
                                <i class="fa fa-lock"></i>
                                Bloquear!
                            </button>
                        </form>

                        <p class="col-lg-6">.</p>

                        <p class="col-lg-12">
                            <br>
                            <br>
                            <br>
                            Copyright <i class="fa fa-copyright"></i> 2016 - <?php echo date("Y");?>
                            XS Informática - https://xsinformatica.com.br -
                            <a href="mailto:spamformblocker@xsinformatica.com.br">
                                <i class="fa fa-envelope"></i> spamformblocker@xsinformatica.com.br
                            </a>
                        </p>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/metisMenu.min.js"></script>
    <script type="text/javascript" src="js/sb-admin-2.min.js"></script>

</body>
</html>
