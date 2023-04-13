<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<!-- saved from url=(0097)https://gfcmercado.en.onlinetradingapplications.com/?form_id=153&form_type_%20id=1&form_type_id=1 -->
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--  Meta and Title  -->

    <title>Cuenta Demo </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Global Administration Centre" name="description">

    <!--  Fonts  -->
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/opensans.css">
    <link href="./Cuenta Demo __files/lato.css" rel="stylesheet" type="text/css">

    <link href="./Cuenta Demo __files/opensansall.css" rel="stylesheet" type="text/css">
    <link href="./Cuenta Demo __files/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="./Cuenta Demo __files/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="./Cuenta Demo __files/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./Cuenta Demo __files/uniform.default.css" rel="stylesheet" type="text/css">
    <link href="./Cuenta Demo __files/bootstrap-switch.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/prettify.css">

    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/tagmanager.css">
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/core.css">

    <!--  CSS - theme  -->
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/theme.css">
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/forms.css">

    <!--  Favicon  -->
    <link rel="shortcut icon" href="./Cuenta Demo __files/gfclogo.jpg">

    <!--  IE8 HTML5 support   -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <link rel="stylesheet" href="./Cuenta Demo __files/timeTo.css">
    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/bootstrap-datepicker3.min.css">


    <link rel="stylesheet" type="text/css" href="./Cuenta Demo __files/multiselect.css">

    <!-- <script async="" src="./Cuenta Demo __files/analytics.js.descarga"></script>
    <script async="" src="./Cuenta Demo __files/gtm.js.descarga"></script> -->
    <!-- <script type="text/javascript" async="" src="./Cuenta Demo __files/recaptcha__es.js.descarga"
        crossorigin="anonymous"
        integrity="sha384-l3BXRqavSbSIKNUjUVX+TbOmvcXyI1bI7g7wIxYVM9d9dVg+/NNJzSOrf56Rzy1r"></script>
    <script src="./Cuenta Demo __files/api.js.descarga"></script> -->

    <!-- Google Tag Manager -->
    <!-- <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', '');</script> -->
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!-- END HEAD -->

<?php
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
try {

    $errorDetails = "";
    $dataSent = array();
    $username = "DemoPage";
    $password = "DemoPage1";

    $wsdlUrl = 'https://apiwsdemo.finalto.com:8098/DemoClientAdmin?singleWsdl';

    $soapClientOptions = array(
        'login' => $username,
        'password' => $password,
    );

    $templateId = 1215;
    $brokerId = 227574;
    $clientName = "test";
    $clientEmail = "test@afds.com";
    $clientSoap = new SoapClient($wsdlUrl, $soapClientOptions);

    if (isset($_POST['first_name']) && isset($_POST['middle_name']) && isset($_POST['last_name']) && isset($_POST['emailaddress']) && isset($_POST['phone_number']) && isset($_POST['account_base_currency'])) {

        // $templateId = 1215;
        $brokerId = 227574;
        $first_name = ($_POST['first_name']);
        $middle_name = ($_POST['middle_name']);
        $last_name = ($_POST['last_name']);
        $clientName = $first_name . " " . $middle_name . " " . $last_name;
        $clientEmail = ($_POST['emailaddress']);
        $clientPhone = ($_POST['phone_number']);
        $loginPassword = 'asdflE43984398';
        $loginName = substr($first_name, 0, 1) . $last_name . rand(1000, 10000);
        $loginName = strtolower($loginName);

        $account_base_currency = ($_POST['account_base_currency']);

        $res = $clientSoap->CreateClientByLoginPhoneAndMail(array(
            'TemplateID' => $account_base_currency,
            'BrokerID' => $brokerId,
            'ClientDisplayName' => $clientName,
            'LoginName' => $loginName,
            'LoginPassword' =>  $loginPassword,
            'ClientMail' => $clientEmail,
            'ClientPhone' => $clientPhone
        ));
        //print_r($res);
        $loginPassword = $res->CreateClientByLoginPhoneAndMailResult->LoginPassword;
    }
} catch (exception  $e) {
    $errorDetails = $e;
}

?>


<body class="sb-top sb-top-lg onload-check">

    <!--  Body Wrap   -->
    <div id="main" style="margin-top:-10px;">
        <!--  Main Wrapper  -->
        <section id="">

            <!--  Content  -->
            <a id="index" href="https://gfcmercado.en.onlinetradingapplications.com/?form_id=153&amp;form_type_%20id=1&amp;form_type_id=1#"></a>
            <section id="content" class="table-layout">

                <div class="mw1000 center-block bg-primary">

                    <!--  Spec Form  -->
                    <div class="allcp-form">



                        <div class="panel panel-system">
                            <div class="panel-heading">
                                <div class="wells center">
                                    <img src="./Cuenta Demo __files/gfclogo.jpg" height="100px" style="margin-top:5px;">
                                </div>
                            </div>
                            <div class="panel-body">


                                <!-- <form action="/proccessInfo.php" autocomplete="off"> -->
                                <form id="formData" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                                    <ul class="parent">

                                        <li>
                                            <div class="section">
                                                <label for="account_base_currency" class="field-label">Moneda</label>
                                                <label for="account_base_currency" class="field prepend-icon">

                                                    <div class="radio-custom radio-info mb5">
                                                        <input type="radio" id="account_base_currency_0" class="multiple-choice ignore" name="account_base_currency" value="1218" data-required="1" data-min="3" data-max="100" data-parent-value="">
                                                        <label for="account_base_currency_0">MXN</label>
                                                    </div>
                                                    <div class="radio-custom radio-info mb5">
                                                        <input type="radio" id="account_base_currency_1" name="account_base_currency" value="1215" data-required="1" data-min="3" data-max="100" data-parent-value="" checked>

                                                        <label for="account_base_currency_1">USD</label>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="section">
                                                <label for="primary_contact" class="field-label">Detalles de
                                                    Contacto</label>

                                                <br>
                                                <div class="row">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="section">
                                                                    <label for="primary_contact_first_name" class="field-label">Nombre</label>
                                                                    <label for="primary_contact_first_name" class="field prepend-icon">
                                                                        <input type="text" name="first_name" id="primary_contact_first_name" class="gui-input" placeholder="" required>

                                                                        <label for="primary_contact_first_name" class="field-icon">
                                                                            <i class="fa fa-user"></i>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="section">
                                                                    <label for="primary_contact_middle_name" class="field-label">Segundo
                                                                        Nombre</label>
                                                                    <label for="primary_contact_middle_name" class="field prepend-icon">
                                                                        <input type="text" name="middle_name" id="primary_contact_middle_name" class="gui-input" placeholder="" required>

                                                                        <label for="primary_contact_middle_name" class="field-icon">
                                                                            <i class="fa fa-user"></i>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="section">
                                                                    <label for="primary_contact_last_name" class="field-label">Apellido</label>
                                                                    <label for="primary_contact_last_name" class="field prepend-icon">
                                                                        <input type="text" name="last_name" id="primary_contact_last_name" class="gui-input" placeholder="" required>

                                                                        <label for="primary_contact_last_name" class="field-icon">
                                                                            <i class="fa fa-user"></i>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="section">
                                                                    <label for="primary_contact_emailaddress" class="field-label">Correo
                                                                        Electrónico</label>
                                                                    <label for="primary_contact_emailaddress" class="field prepend-icon">
                                                                        <input type="email" name="emailaddress" id="emailaddress" class="gui-input email" placeholder="" required>

                                                                        <label for="primary_contact_emailaddress" class="field-icon">
                                                                            <i class="fa fa-user"></i>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="section">
                                                                    <label for="primary_contact_mobile" class="field-label">Teléfono
                                                                    </label>
                                                                    <label for="primary_contact_mobile" class="field prepend-icon">
                                                                        <input type="text" name="phone_number" id="phone_number" class="gui-input phone" placeholder="" required>
                                                                        <label for="primary_contact_mobile" class="field-icon">
                                                                            <i class="fa fa-user"></i>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </fieldset>
                                                </div>
                                                <b class="tooltip tip-left-bottom"><em></em></b>

                                            </div>
                                        </li>


                                        <li>
                                            <div class="section">
                                                <label for="gdpr" class="field-label"> </label>
                                                <label for="gdpr" class="field prepend-icon">
                                                    <input type="hidden" id="gdpr" data-parent-value="" class="ignore">
                                                    <p><em>By submitting your application for the demo account I hereby consent to the collection, storage and processing of my personal data by Global Financial Contracts and sharing the records with Finalto Trading in accordance with the terms specified in TTA Privacy Policy. </em></p>
                                                </label>
                                            </div>
                                        </li>

                                        <input type="submit" id="btnSave" value="Salvar" style=" background-color: #69a996;
                                        float: right;
                                        border: none;
                                        color: white;
                                        padding: 10px 32px;
                                        text-align: center;
                                        text-decoration: none;
                                        display: inline-block;
                                        font-size: 16px;
                                        margin: 4px 2px;
                                        cursor: pointer;">
                                    </ul>

                                </form>
                                <br><br>


                                <div style="margin-top: 20px; color:red">
                                    <?php
                                    if (strlen($errorDetails) > 0) {
                                        //print("Error");
                                        print_r($errorDetails);
                                        print(" <script>Swal.fire({title: 'El formulario no fue enviado hubo un error!',icon: 'error',});</script>");
                                    }
                                    ?>
                                </div>

                                <div style="margin-top: 20px; color:green">
                                    <?php

                                    if (isset($_POST['first_name']) && isset($_POST['middle_name']) && isset($_POST['last_name']) && isset($_POST['emailaddress']) && isset($_POST['phone_number'])) {
                                        if (strlen($errorDetails) == 0) {

                                            //send email
                                            $to = $_POST['emailaddress'];
                                            $subject = "Formulario enviado";
                                            $name = $_POST['first_name'] . " " . $_POST['middle_name'] . " " . $_POST['last_name'];
                                            $phone = $_POST['phone_number'];
                                            $account_base_currency = $_POST['account_base_currency'] === "1218" ? "MXN" : "USD";

                                            $message = "                                                       
                                                        <p>Estimado $name,</p>
                                                        <p><br></p>
                                                        <p><span size='3'>Gracias por abrir su cuenta demo con GFC, l&iacute;der mundial en operaciones cambiarias en l&iacute;nea de Forex, &Iacute;ndices, Metales, Petr&oacute;leo, etc.&nbsp;</span></p>
                                                        <p><br></p>
                                                        <p><span size='3'>No solo ver&aacute; los mejores precios interbancarios, sino que tambi&eacute;n tendr&aacute; la liquidez del mercado mundial en sus manos. Desde gr&aacute;ficas avanzadas, hasta herramientas intrincadas que le facultan para generar sus propios indicadores t&eacute;cnicos para los mercados burs&aacute;tiles.&nbsp;</span></p>
                                                        <p><br></p>
                                                        <p>Nuestra plataforma es la &uacute;nica dise&ntilde;ada para operar inversiones y atender a operadores tanto principiantes, como profesionales.</p>
                                                        <p><br></p>
                                                        <p><span size='3'>Seguidamente encontrar&aacute; su&nbsp;</span><span size='3'><strong>ID</strong></span><span size='3'>&nbsp;de usuario y&nbsp;</span><span size='3'><strong>Contrase&ntilde;a</strong></span><span size='3'>&nbsp;para entrar a la plataforma los cuales le dar&aacute;n acceso a su cuenta de demostraci&oacute;n para sus operaciones.&nbsp;</span></p>
                                                        <p><br></p>
                                                        <p><br></p>
                                                        <p><strong>Usuario</strong>: $loginName</p>
                                                        <p><strong>Contrase&ntilde;a</strong>: $loginPassword<br>&nbsp;</p>
                                                        <p><br></p>
                                                        <p><br></p>
                                                        <p><strong>-Para acceder a la versi&oacute;n web WINDOWS/MAC &ndash; PC&nbsp;</strong></p>
                                                        <p><br></p>
                                                        <p><a href='https://demotrader.gfcmercado.com/Pages/Login.aspx'><u>https://demotrader.gfcmercado.com/Pages/Login.aspx</u></a></p>
                                                        <p><br></p>
                                                        <p><br></p>
                                                        <p><strong>-Opciones M&oacute;viles:</strong></p>
                                                        <p><br></p>
                                                        <p><strong>IPhone / IPad / Apple IOS</strong> &gt; App Store y baje el programa gratis bajo <strong>&ldquo;GFC Web Trader&rdquo;</strong> o</p>
                                                        <p>presione aqui&gt; <a href='https://apps.apple.com/us/app/gfc-web-trader/id6446778457'><u>App Store</u></a></p>
                                                        <p><br></p>
                                                        <p><strong>Android / Tablet</strong> &gt; Google Play y baje el programa gratis bajo <strong>&ldquo;GFC Web Trader&rdquo;</strong> o</p>
                                                        <p>Presione aqui&gt;<a href='https://play.google.com/store/apps/details?id=com.gfc.mobile'><u>Google Play</u></a></p>
                                                        <p><br></p>
                                                        <p><br></p>
                                                        <p>Por favor nos llama con cualquier duda al tel&eacute;fono directo 210-595-3390.</p>
                                                        <p><br></p>
                                                        <p><br></p>
                                                        <p>Gracias.</p>
                                                        <p><br></p>
                                                        <p>Atentamente,</p>
                                                        <p>Global Financial Contracts LTD</p>
                                                        <img src='data:image/png;base64,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'>
                                                        <p><br></p>
                                                        <p><br></p>                                                       
                                                        ";


                                            //Create an instance; passing `true` enables exceptions
                                            $mail = new PHPMailer(true);

                                            try {
                                                //Server settings
                                                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                                $mail->isSMTP();                                            //Send using SMTP
                                                $mail->Host       = 'exchange3.vndhost3.com';                     //Set the SMTP server to send through
                                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                                $mail->Username   = 'donotreply@gfcmercado.com';                     //SMTP username
                                                $mail->Password   = 'b!4d8e4bb4$#';                               //SMTP password
                                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                                                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                                                //Recipients
                                                $mail->setFrom('donotreply@gfcmercado.com', 'Gfcmercado');
                                                $mail->addAddress($to);               //Name is optional
                                                $mail->addCC('contacto@gfcmercado.com');
                                                //$mail->addCC('maykol@vndx.com');
                                                //Content
                                                $mail->isHTML(true);                                  //Set email format to HTML
                                                $mail->Subject = $subject;
                                                $mail->Body    =  $message;
                                                $mail->send();
                                            } catch (Exception $e) {
                                            }

                                            print(" <script>Swal.fire({title: '¡Gracias, le enviaremos un correo electrónico con más información!',icon: 'success',});</script>");
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </section>

        </section>



        <footer class="footer">
            <div class="container">
                <div class="row copyright">
                    <div class="col-md-6 lang">2013 - 2023 © Finalto Trading. Registered Number: 08663212 with FCA
                        Number; 607305</div>
                    <div class="col-md-6 right"><span class="lang">Page generated in </span>0.3083<span class="lang">
                            seconds</span></div>
                </div>
                <a href="https://gfcmercado.en.onlinetradingapplications.com/?form_id=153&amp;form_type_%20id=1&amp;form_type_id=1#index" class="go2top" style="display: none;">
                    <i class="icon-arrow-up"></i>
                </a>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 lang">
                        <br>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--  /Body Wrap   -->

    <!--[if lt IE 9]>
            <script src="/assets/global/plugins/respond.min.js"></script>
            <script src="/assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->

    <script src="./Cuenta Demo __files/jquery-1.11.3.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/jquery-ui.min.js.descarga"></script>

    <!--  Theme Scripts  -->
    <script src="./Cuenta Demo __files/utility.js.descarga"></script>
    <script src="./Cuenta Demo __files/demo.js.descarga"></script>
    <script src="./Cuenta Demo __files/main.js.descarga"></script>

    <script src="./Cuenta Demo __files/js.cookie.min.js.descarga" type="text/javascript"></script>
    <script src="./Cuenta Demo __files/bootstrap-hover-dropdown.min.js.descarga" type="text/javascript"></script>
    <script src="./Cuenta Demo __files/jquery.slimscroll.min.js.descarga" type="text/javascript"></script>
    <script src="./Cuenta Demo __files/jquery.blockui.min.js.descarga" type="text/javascript"></script>
    <script src="./Cuenta Demo __files/jquery.uniform.min.js.descarga" type="text/javascript"></script>
    <script src="./Cuenta Demo __files/bootstrap-switch.min.js.descarga" type="text/javascript"></script>
    <script src="./Cuenta Demo __files/bootstrap-datepicker.min.js.descarga"></script>

    <script src="./Cuenta Demo __files/moment.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/jquery.bootstrap-duallistbox.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/daterangepicker.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/bootstrap-datetimepicker.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/bootstrap-colorpicker.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/tagmanager.js.descarga"></script>
    <script src="./Cuenta Demo __files/bootstrap-maxlength.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/select2.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/typeahead.bundle.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/jquery.maskedinput.min.js.descarga"></script>

    <script src="./Cuenta Demo __files/jquery.waypoints.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/jquery.magnific-popup.js.descarga"></script>
    <script src="./Cuenta Demo __files/pnotify.js.descarga"></script>

    <script src="./Cuenta Demo __files/jquery.validate.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/additional-methods.min.js.descarga"></script>
    <script src="./Cuenta Demo __files/jquery.steps.min.js.descarga"></script>

    <script src="./Cuenta Demo __files/management-tools-panels.js.descarga"></script>
    <script src="./Cuenta Demo __files/widgets_sidebar.js.descarga"></script>


    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core
            Core.init();

        });
    </script>


    <script src="./Cuenta Demo __files/functions.js.descarga" type="text/javascript"></script>

    <!--  /Scripts  -->
    <script src="./Cuenta Demo __files/forms.js.descarga" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', '', 'auto');
        ga('send', 'pageview');
    </script>

    <script>
        function validateform(e) { // take the event as parameter

            let password = document.querySelector("#password").value;
            let password2 = document.querySelector("#password2").value;

            if (password != password2) {
                e.preventDefault(); // stop the submission
                Swal.fire({
                    title: 'Password y confirmacion de password debe ser el mismo!',
                    icon: 'error',
                });
            }

            if (password.length < 6) {
                Swal.fire({
                    title: 'Password debe tener mas de 5 caracteres!',
                    icon: 'error',
                });
                e.preventDefault(); // stop the submission
            }
        }
    </script>


</body>

</html>