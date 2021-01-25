<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>CANDONGUEIRO DIGITAL</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo dirVENDOR ."/images/apple-touch-icon.png"?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo dirVENDOR ."/images/favicon-32x32.png"?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo dirVENDOR ."/images/favicon-16x16.png"?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo dirVENDOR ."/styles/core.css"?>">
    <link rel="stylesheet" type="text/css" href="<?php echo dirVENDOR ."/styles/icon-font.min.css"?>">
    <link rel="stylesheet" type="text/css" href="<?php echo dirVENDOR ."/styles/style.css"?>">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="#">
                    <h4>CANDONGUEIRO DIGITAL</h4>
                </a> </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?php echo dirIMG ."/portfolio-2.jpeg"?>" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login</h2>
                        </div>
                        <form action="login" method="POST">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="nomeProvincia" id="nomeProvincia" placeholder="Nome de uma Provincia">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="senha"  class="form-control form-control-lg" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block">Logar</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?php echo dirVENDOR ."/scripts/core.js"?>"></script>
    <script src="<?php echo dirVENDOR ."/scripts/script.min.js"?>"></script>
    <script src="<?php echo dirVENDOR ."/scripts/process.js"?>"></script>
    <script src="<?php echo dirVENDOR ."/scripts/layout-settings.js"?>"></script>
</body>

</html>