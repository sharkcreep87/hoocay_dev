<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        @import  url('https://fonts.googleapis.com/css?family=Didact+Gothic');
        * {
            font-family: 'Didact Gothic', sans-serif !important;
        }
        /* Media Queries */
        @media  only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

        'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
        'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

    /* Masthead ----------------------- */

        'email-masthead' => 'padding: 25px 0; text-align: center;',
        'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

        'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
        'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
        'email-body_cell' => 'padding: 35px;',

        'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
        'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

        'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
        'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2; width: 100%;',

    /* Type ------------------------------ */

        'anchor' => 'color: #3869D4;',
        'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;',
        'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
        'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
        'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

        'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

        'button--green' => 'background-color: #22BC66;',
        'button--red' => 'background-color: #dc4d2f;',
        'button--blue' => 'background-color: #3869D4;',
];
?>

<body style="<?php echo e($style['body']); ?>">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="<?php echo e($style['email-wrapper']); ?>" align="center">
            <table width="100%" cellpadding="0" cellspacing="0">
                <!-- Logo -->
                <tr>
                    <td style="<?php echo e($style['email-masthead']); ?>">
                       <a href="<?php echo e(url('/')); ?>"><img class="img-fluid" src="<?php echo e(URL::asset('assets/images/home/my-logo.png')); ?>"/></a>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td style="<?php echo e($style['email-body']); ?>" width="100%">
                        <table style="<?php echo e($style['email-body_inner']); ?>" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="<?php echo e($style['email-body_cell']); ?>">
                                    <!-- Greeting -->
                                    <h1 style="<?php echo e($style['header-1']); ?>">
                                        <?php echo e($mail_data['welcome'] . ' ' . $mail_data['to'] . ' ' . $mail_data['site_name']); ?>

                                    </h1>

                                    <!-- Intro -->
                                    <p style="<?php echo e($style['paragraph']); ?>">
                                        Thank you for register with us,<br/>
                                        we are looking forward to collaborate with you in future, and lets hoocay be the number 1 platform for your travel info provider. Visit hoocay everyday to get latest info and offer/discount/point.<br/>
                                        
                                    </p>

                                    <!-- Salutation -->
                                    <p style="<?php echo e($style['paragraph']); ?>">
                                        <?php echo e($mail_data['regards']); ?>, <br><?php echo e($mail_data['site_name']); ?>

                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td>
                        <table style="<?php echo e($style['email-footer']); ?>" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style=" <?php echo e($style['email-footer_cell']); ?>">
                                    <p style="<?php echo e($style['paragraph-sub']); ?>">
                                        &copy; <?php echo e(date('Y')); ?>

                                        <a style="<?php echo e($style['anchor']); ?>" href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e($mail_data['site_name']); ?></a>.
                                        All rights reserved.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
