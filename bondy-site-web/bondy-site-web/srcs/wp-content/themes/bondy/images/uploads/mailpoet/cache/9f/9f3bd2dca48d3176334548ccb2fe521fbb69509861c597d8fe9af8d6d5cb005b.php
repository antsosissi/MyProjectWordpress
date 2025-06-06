<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* newsletter/templates/blocks/woocommerceContent/new_account.hbs */
class __TwigTemplate_29e14acbe732f27fbbfd0787d956a63bc4c2da86745d4c1b57ba22872edc4bb3 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"mailpoet_tools\"></div>
<div class=\"mailpoet_woocommerce_content_overlay\">
  <p>";
        // line 3
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This content will be autogenerated by WooCommerce");
        echo "</p>
</div>
<div class=\"mailpoet_content mailpoet_woocommerce_content\" data-automation-id=\"woocommerce_content\">
<p style=\"margin:0 0 16px\">";
        // line 6
        echo \MailPoetVendor\twig_escape_filter($this->env, sprintf($this->env->getExtension('MailPoet\Twig\I18n')->translate("Hi %s,", "woocommerce"), "Elon"), "html", null, true);
        echo "</p>
<p style=\"margin:0 0 16px\">";
        // line 7
        echo sprintf($this->env->getExtension('MailPoet\Twig\I18n')->translate("Thanks for creating an account on %1\$s. Your username is %2\$s. You can access your account area to view orders, change your password, and more at: %3\$s", "woocommerce"), "{{siteName}}", "<strong>elon.musk</strong>", "<a href=\"http://{{siteAddress}}\" style=\"font-weight:normal;text-decoration:underline\" target=\"_blank\">{{siteAddress}}</a>");
        echo "</p>
<p style=\"margin:0 0 16px\">";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("We look forward to seeing you soon.", "woocommerce");
        echo "</p>
</div>
<div class=\"mailpoet_block_highlight\"></div>";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/woocommerceContent/new_account.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 8,  44 => 7,  40 => 6,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/woocommerceContent/new_account.hbs", "D:\\www\\projets\\bondy\\srcs\\wp-content\\plugins\\mailpoet\\views\\newsletter\\templates\\blocks\\woocommerceContent\\new_account.hbs");
    }
}
