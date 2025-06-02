<?php
global $bondy_options;
?>
<section class="newsletter-bloc sabonner-actu-bloc">
    <h2><?php if($bondy_options["titleNewsletterPage"] != null){ echo $bondy_options["titleNewsletterPage"];} else { ?>Rendez le monde plus vert :<?php } ?></h2>
    <?php if($bondy_options["texteNewsletterPage"] != null)
    {
        ?>
        <div class="intro-txt">
            <p><?php echo nl2br($bondy_options["texteNewsletterPage"]); ?>
        </div>
    <?php } ?>
    <div class="form-bloc">
        <form action="#" method="POST" id="formNewslettersPage" class="form-newsletter">
            <div class="form-group no-footer">
                <input type="text" class="form-control" id="newsletter_mail_page" name="newsletter_mail_page" placeholder="Saisissez votre adresse email">
                <button type="button"  class="btn btn-primary btn-lg sabonner send-MailNl">s'abonner</button>
                <span class="span-message-mail"></span>
            </div>
        </form>
    </div>
</section>