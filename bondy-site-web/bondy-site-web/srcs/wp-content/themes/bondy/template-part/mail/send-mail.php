
<?php global $bondy_options;
$facebook = ( isset( $bondy_options['facebook'] ) && !empty( $bondy_options['facebook'] ) ) ? $bondy_options['facebook'] : "";
$instagram = ( isset( $bondy_options['instagram'] ) && !empty( $bondy_options['instagram'] ) ) ? $bondy_options['instagram'] : "";
$linkedin = ( isset( $bondy_options['linkedin'] ) && !empty( $bondy_options['linkedin'] ) ) ? $bondy_options['linkedin'] : "";
$youtube = ( isset( $bondy_options['youtube'] ) && !empty( $bondy_options['youtube'] ) ) ? $bondy_options['youtube'] : "";
$telephone = ( isset( $bondy_options['telephone'] ) && !empty( $bondy_options['telephone'] ) ) ? $bondy_options['telephone'] : "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <title>BONDY</title>

    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse;}

        @media only screen and (max-width:992px) {
            table[class=container], td[class=responsiveCell],  div[class=responsiveCell] {width: 100% !important;}
            table[class=centerTxt], div[class=centerTxt], td[class=centerTxt] {text-align: center !important;}
        }
        @media only screen and (max-width:320px) {
            div[class=responsiveCell], td[class=responsiveCell] {display: block !important;}
        }

    </style>
    <![endif]-->

    <style type="text/css">


        @media only screen and (max-width:639px) {

            *[class~="textCenter"] {
                text-align: center!important;
                margin: 0 auto!important;
            }

            *[class~="OneColumnMobile"] {
                width:100% !important;
                display:block !important;
                margin-left:auto !important;
                margin-right:auto !important;
            }

            *[class~="OneColumnMobile"] img {
                min-width:1px !important;
                max-width:100% !important;
                height:auto !important;
            }

            *[class~="MobCenter"] {
                display:block !important;
                float:none !important;
                margin-left:auto !important;
                margin-right:auto !important;
            }

            *[class~="MobCenterText"] {
                text-align:center !important;
            }

            *[class~="MobLeft"] {
                display:block !important;
                float:left !important;
            }

            *[class~="MobLeftText"] {
                text-align:left !important;
            }

            *[class~="MobLeftImage"] img {
                float:left !important;
            }

            *[class~="MobRight"] {
                display:block !important;
                float:right !important;
            }

            *[class~="MobRightText"] {
                text-align:right !important;
            }

            *[class~="MobRightImage"] img {
                float:right !important;
            }

            *[class~="MobFullWidth"] {
                float:none !important;
                margin-left:auto !important;
                margin-right:auto !important;
                width:100% !important;
                max-width:100% !important;
            }

            *[class~="MobAutoWidth"] {
                width:auto !important;
            }

            *[class~="MobAutoWidthImage"] img {
                width:auto !important;
            }

            *[class~="MobNoMaxWidthImage"] img {
                max-width:none !important;
            }

            *[class~="MobAutoWidthImage"] span {
                width:auto !important;
            }

            *[class~="MobNoMaxWidthImage"] span {
                max-width:none !important;
            }


            *[class~="MobNoMinWidth"] {
                min-width:none !important;
            }

            *[class~="MobTopPad"] {
                padding-top:12px !important;
            }

            *[class~="MobTopMar"] {
                margin-top:12px !important;
            }

            *[class~="MobBottomPad"] {
                padding-bottom:15px !important;
            }

            *[class~="MobBottomMar"] {
                margin-bottom:15px !important;
            }

            *[class~="MobLeftPad"] {
                padding-left:12px !important;
            }

            *[class~="MobLeftMar"] {
                margin-left:12px !important;
            }

            *[class~="MobRightPad"] {
                padding-right:12px !important;
            }

            *[class~="MobRightMar"] {
                margin-right:12px !important;
            }

            *[class~="MobNoSidePad"] {
                padding-left:0px !important;
                padding-right:0px !important;
            }

            *[class~="MobNoSideMar"] {
                margin-left:0px !important;
                margin-right:0px !important;
            }

            *[class~="MobInlineBlockLinks"] a {
                display:inline-block !important;
            }

            *[class~="MobBlock"] {
                display:block !important;
            }

            *[class~="MobInline"] {
                display:inline !important;
            }

            *[class~="MobInlineBlock"] {
                display:inline-block !important;
            }

            *[class~="MobTable"] {
                display:table !important;
            }

            *[class~="MobRow"] {
                display:table-row !important;
            }

            *[class~="MobCell"] {
                display:table-cell !important;
            }

            *[class~="MobHide"] {
                display:none !important;
            }

            *[class~="ContentWidth"] {
                width:100% !important;
            }

        }

        @media only screen and (max-width:480px) {
            table[class=responsiveCell],
            td[class=responsiveCell],
            div[class=responsiveCell],
            img[class=responsiveCell] {
                width: 100% !important;
                max-width: 100%!important;
                display: block !important;
            }

            div[class=visibleCell],
            td[class=visibleCell] {
                display: block!important;
            }

            table[class=visibleCell] {
                display: table!important;
            }

            div[class=hiddenCell], table[class=hiddenCell], td[class=hiddenCell], br[class=hiddenCell] {
                display: none!important;
            }

            div[class=mobilecontent] {
                display: block !important;
                max-height: none !important;
                width: 100%;
            }

            table[class=mobilecontent] {
                display: table !important;
                width: 100%;
            }
        }
        .lg-td{
            color: #ABABAB;font-family:Arial, sans-serif;font-size: 14px;line-height: 26px;
        }
        .lg-span{
            color:#5A5453;font-family:Arial, sans-serif; font-size: 14px;line-height: 20px; padding: 0 5px;
        }
        .lg-parent-td{
            color:#5A5453;font-family:Arial, sans-serif; font-size: 14px; line-height: 20px;
        }
        .lg-parent-span{
            font-weight: bold; display: block;
        }
    </style>


</head>
<body style="background-color:#e7e7e7; margin:0;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#e7e7e7" style="background-color:#e7e7e7; font-size: 0">
    <tbody>

    <tr>
        <td width="25">&nbsp;</td>
        <td align="center" valign="top">

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="max-width:600px; width:100%;">
                <tr>
                    <td height="30" style="background-color:#e7e7e7;"></td>
                </tr>
                <tr>
                    <td style="background-color:#e6e6e6;" align="center">
                    </td>
                </tr>
                <tr>
                    <td height="10" style="background-color:#e7e7e7;"></td>
                </tr>
            </table>

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="max-width:600px; width:100%; background-color: #fff;">
                <tbody>
                <tr>
                    <td width="25"></td>
                    <td>

                        <!-- Header -->
                        <table cellspacing="0" cellpadding="0" border="0" width="550" style="max-width: 550px; width: 100%;">
                            <tr>
                                <td height="20">&nbsp;</td>
                            </tr>

                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" border="0"  width="550" style="max-width: 550px; width: 100%;">
                                        <tr>
                                            <td>
                                                <!--[if (gte mso 9)|(IE)]>
                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td>
                                                <![endif]-->
                                                <div style="max-width:275px; width: 100%; display:inline-block; vertical-align: top;" class="MobBlock MobFullWidth MobBottomMar">
                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="275" valign="top" align="left" style="text-align: left;" class="textCenter"><a href="<?php echo site_url();?>" title="BONDY"><img src="<?php echo get_template_directory_uri();?>/template-part/mail/images/logo.jpg" width="135" style="width: 135px;"></a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                <td>
                                                <![endif]-->
                                                <div style="max-width:275px; width: 100%; display:inline-block; vertical-align: top;" class="MobBlock MobFullWidth">
                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="275" valign="top" align="right" style="text-align: right" class="textCenter">
                                                                <p style="font-family:Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 23px; margin-top: 0; margin-bottom:10px; text-transform:uppercase; color:#0fcb8f">transformons l'île rouge,<br/>en île verte</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                </tr>
                                                </table>
                                                <![endif]-->
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <td height="20">&nbsp;</td>
                            </tr>

                            <tr>
                                <td height="1" style="border-bottom: 1px solid #0fcb8f; height: 1px;"></td>
                            </tr>
                        </table>
                        <!-- /Header -->

                        <!-- Content -->
                        <table cellspacing="0" cellpadding="0" border="0" width="550" style="max-width: 550px; width: 100%;">
                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td height="20">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td style="color:#5A5453;font-family:Arial, sans-serif; font-size: 20px; font-weight: bold; line-height: 23px; text-transform: uppercase;"><?php echo $typeMail;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#0fcb8f ;font-family:Arial, sans-serif; font-size: 20px;line-height: 23px;"><?php echo $title ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20">&nbsp;</td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <table cellspacing="0" cellpadding="0" border="0">
                                                                <tr>
                                                                    <td class="lg-td"><?php echo $message ?></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="15">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- /Content -->
                    </td>
                    <td width="25"></td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
                <tr>
                    <td width="25" style="background-color: #0fcb8f;"></td>
                    <td>
                        <!-- footer -->
                        <table cellspacing="0" cellpadding="0" border="0" width="550" style="max-width: 550px; width: 100%; background-color: #0fcb8f;">
                            <tr>
                                <td height="20"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" border="0"  width="550" style="max-width: 550px; width: 100%;">
                                        <tr>
                                            <td>
                                                <!--[if (gte mso 9)|(IE)]>
                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td>
                                                <![endif]-->
                                                <div style="max-width:275px; width: 100%; display:inline-block; vertical-align: middle;" class="MobBlock MobFullWidth MobBottomMar">
                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="275" valign="middle"  align="left" style="color:#231F20; font-family:Arial, sans-serif; font-size: 9px;" class="textCenter">
																				<span style="display: inline-block; vertical-align: middle; margin-right: 10px;">
																					<img src="<?php echo get_template_directory_uri();?>/template-part/mail/images/tel.jpg" style="vertical-align: middle; height:16px;">
																				</span>
                                                                <span style="display: inline-block; vertical-align: middle; color: #ffffff"><?php echo $telephone ?></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                <td>
                                                <![endif]-->
                                                <div style="max-width:275px; width: 100%; display:inline-block; vertical-align: top;" class="MobBlock MobFullWidth MobBottomMar">
                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="275" valign="middle" align="right" style="color:#231F20; font-family:Arial, sans-serif; font-size: 10px; text-align: right;" class="textCenter">
                                                                <?php if ( !empty($facebook) ):?>
                                                                <a href="<?php echo $facebook;?>" title="Facebook" style="display: inline-block; margin: 0 5px;"><img src="<?php echo get_template_directory_uri();?>/template-part/mail/images/facebook.jpg" style="height: 20px;"></a>
                                                                <?php endif;?>
                                                                <?php if ( !empty( $instagram ) ):?>
                                                                <a href="<?php echo $instagram;?>" title="Instagram" style="display: inline-block; margin: 0 5px;"><img src="<?php echo get_template_directory_uri();?>/template-part/mail/images/instagram.jpg" style="height: 20px;"></a>
                                                                <?php endif;?>
                                                                <?php if ( !empty( $linkedin ) ):?>
                                                                <a href="<?php echo $linkedin;?>" title="Linkedin" style="display: inline-block; margin: 0 5px;"><img src="<?php echo get_template_directory_uri();?>/template-part/mail/images/linkedin.jpg" style="height: 20px;"></a>
                                                                <?php endif;?>
                                                                <?php if ( !empty( $youtube ) ):?>
                                                                <a href="<?php echo $youtube;?>" title="Youtube" style="display: inline-block; margin: 0 0 0 5px;"><img src="<?php echo get_template_directory_uri();?>/template-part/mail/images/youtube.jpg" style="height: 20px;"></a>
                                                                <?php endif;?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                </tr>
                                                </table>
                                                <![endif]-->
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                        </table>
                        <!-- /footer -->
                    </td>
                    <td width="25" style="background-color: #0fcb8f;"></td>
                </tr>
                </tbody>
            </table>

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="max-width:600px; width:100%;">
                <tr>
                    <td height="10" style="background-color:#e7e7e7;"></td>
                </tr>

                <tr>
                    <td align="center" style="background-color:#e6e6e6;font-size:9px;color:#b3b3b3;font-family:Arial, sans-serif; line-height: 13px; text-align: center;">
                        Copyright 2020 © Bôndy, tous droits réservés. <br/>
                    </td>
                </tr>
            </table>
        </td>
        <td width="25">&nbsp;</td>
    </tr>

    </tbody>
</table>
</body>
</html>