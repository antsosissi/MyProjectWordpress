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

/* newsletter/templates/blocks/products/settingsSinglePost.hbs */
class __TwigTemplate_03e0bc4bea7aff775f96fd1c9cfa80c51b63be6bdcab40db3cb34d51b708622f extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_settings_products_single_product\">
    <label>
        <input id=\"mailpoet_select_product_{{ index }}\" class=\"mailpoet_select_product_checkbox\" type=\"checkbox\" class=\"checkbox\" value=\"\" name=\"post_selection\">
        {{#ellipsis model.post_title 40 '...'}}{{/ellipsis}}
    </label>
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/products/settingsSinglePost.hbs";
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/products/settingsSinglePost.hbs", "/opt/bondy/qualite/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/products/settingsSinglePost.hbs");
    }
}
