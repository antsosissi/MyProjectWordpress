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

/* layout.html */
class __TwigTemplate_5088a3f427d359e6fa5e82bda4b7decfae15ca68edeff9c82aabb587ea03bfc7 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'templates' => [$this, 'block_templates'],
            'container' => [$this, 'block_container'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'after_css' => [$this, 'block_after_css'],
            'translations' => [$this, 'block_translations'],
            'after_translations' => [$this, 'block_after_translations'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if (($context["sub_menu"] ?? null)) {
            // line 2
            echo "<script type=\"text/javascript\">
jQuery('.toplevel_page_mailpoet-newsletters.menu-top-last')
  .addClass('wp-has-current-submenu')
  .find('a[href\$=\"";
            // line 5
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["sub_menu"] ?? null), "html", null, true);
            echo "\"]')
  .addClass('current')
  .parent()
  .addClass('current');
</script>
";
        }
        // line 11
        echo "
<!-- pre connect to 3d party to speed up page loading -->
<link rel=\"preconnect\" href=\"https://beacon-v2.helpscout.net/\">
<link rel=\"dns-prefetch\" href=\"https://beacon-v2.helpscout.net/\">
<link rel=\"preconnect\" href=\"http://cdn.mxpnl.com\">
<link rel=\"dns-prefetch\" href=\"http://cdn.mxpnl.com\">

<!-- system notices -->
<div id=\"mailpoet_notice_system\" class=\"mailpoet_notice\" style=\"display:none;\"></div>

<!-- handlebars templates -->
";
        // line 22
        $this->displayBlock('templates', $context, $blocks);
        // line 23
        echo "
<!-- main container -->
";
        // line 25
        $this->displayBlock('container', $context, $blocks);
        // line 42
        echo "
<!-- stylesheets -->
";
        // line 44
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateStylesheet("mailpoet-plugin.css");
        // line 46
        echo "

";
        // line 48
        echo do_action("mailpoet_styles_admin_after");
        echo "

";
        // line 50
        $this->displayBlock('after_css', $context, $blocks);
        // line 51
        echo "
<script type=\"text/javascript\">
  var mailpoet_date_format = \"";
        // line 53
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\Functions')->getWPDateTimeFormat(), "js"), "html", null, true);
        echo "\";
  var mailpoet_time_format = \"";
        // line 54
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\Functions')->getWPTimeFormat(), "js"), "html", null, true);
        echo "\";
  var mailpoet_version = \"";
        // line 55
        echo $this->env->getExtension('MailPoet\Twig\Functions')->getMailPoetVersion();
        echo "\";
  var mailpoet_locale = \"";
        // line 56
        echo $this->env->getExtension('MailPoet\Twig\Functions')->getTwoLettersLocale();
        echo "\";
  var mailpoet_premium_version = ";
        // line 57
        echo json_encode($this->env->getExtension('MailPoet\Twig\Functions')->getMailPoetPremiumVersion());
        echo ";
  var mailpoet_analytics_enabled = ";
        // line 58
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_jsonencode_filter(call_user_func_array($this->env->getFunction('is_analytics_enabled')->getCallable(), [])), "html", null, true);
        echo ";
  var mailpoet_analytics_data = ";
        // line 59
        echo json_encode(call_user_func_array($this->env->getFunction('get_analytics_data')->getCallable(), []));
        echo ";
  var mailpoet_analytics_public_id = ";
        // line 60
        echo json_encode(call_user_func_array($this->env->getFunction('get_analytics_public_id')->getCallable(), []));
        echo ";
  var mailpoet_analytics_new_public_id = ";
        // line 61
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_jsonencode_filter(call_user_func_array($this->env->getFunction('is_analytics_public_id_new')->getCallable(), [])), "html", null, true);
        echo ";
  var mailpoet_free_domains = ";
        // line 62
        echo json_encode($this->env->getExtension('MailPoet\Twig\Functions')->getFreeDomains());
        echo ";
  var mailpoet_woocommerce_active = ";
        // line 63
        echo json_encode($this->env->getExtension('MailPoet\Twig\Functions')->isWoocommerceActive());
        echo ";
  // RFC 5322 standard; http://emailregex.com/ combined with https://google.github.io/closure-library/api/goog.format.EmailAddress.html#isValid
  var mailpoet_email_regex = /(?=^[+a-zA-Z0-9_.!#\$%&'*\\/=?^`{|}~-]+@([a-zA-Z0-9-]+\\.)+[a-zA-Z0-9]{2,63}\$)(?=^(([^<>()\\[\\]\\\\.,;:\\s@\"]+(\\.[^<>()\\[\\]\\\\.,;:\\s@\"]+)*)|(\".+\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,})))/;
  var mailpoet_feature_flags = ";
        // line 66
        echo json_encode(($context["feature_flags"] ?? null));
        echo ";
  var mailpoet_referral_id = ";
        // line 67
        echo json_encode(($context["referral_id"] ?? null));
        echo ";
</script>

<!-- javascripts -->
";
        // line 71
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("vendor.js", "mailpoet.js");
        // line 74
        echo "

";
        // line 76
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["ajaxFailedErrorMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("An error has happened while performing a request, the server has responded with response code %d"), "senderEmailAddressWarning1" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("You might not reach the inbox of your subscribers if you use this email address.", "In the last step, before sending a newsletter. URL: ?page=mailpoet-newsletters#/send/2"), "senderEmailAddressWarning2" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Use an address like %1\$s for the Sender and put %2\$s in the <em>Reply-to</em> field below.", "In the last step, before sending a newsletter. URL: ?page=mailpoet-newsletters#/send/2"), "senderEmailAddressWarning3" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more."), "mailerSendingResumedNotice" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sending has been resumed."), "dismissNotice" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Dismiss this notice."), "spfCheckTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Improve your deliverability!", "DNS SPF Record check"), "spfCheckMsgWhy" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Your email is set to be sent from %s and we noticed that you have an SPF record for this domain. It means some subscribers may not receive your emails.", "DNS SPF Record check"), "spfCheckMsgEdit" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Since you're sending with the MailPoet Sending Service, you need to add %s to the existing SPF entry in your DNS records. This will allow MailPoet to send on your behalf for optimal deliverability.", "DNS SPF Record check"), "spfCheckReadMore" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read the Guide", "DNS SPF Record check"), "subscribersLimitNoticeTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Congratulations, you now have more than [subscribersLimit] subscribers!"), "freeVersionLimit" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Our free version is limited to [subscribersLimit] subscribers."), "yourPlanLimit" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your plan is limited to [subscribersLimit] subscribers."), "youNeedToUpgrade" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("You need to upgrade now to be able to continue using MailPoet."), "upgradeNow" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Upgrade Now"), "refreshMySubscribers" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("I’ve upgraded my subscription, refresh subscriber limit"), "setFromAddressModalTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("It’s time to set your default FROM address!", "mailpoet"), "setFromAddressModalDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Set one of [link]your authorized email addresses[/link] as the default FROM email for your MailPoet emails.", "mailpoet"), "setFromAddressModalSave" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save", "mailpoet"), "setFromAddressEmailSuccess" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Excellent. Your authorized email was saved. You can change it in the [link]Basics tab of the MailPoet settings[/link].", "mailpoet"), "setFromAddressEmailNotAuthorized" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Can’t use this email yet! [link]Please authorize it first[/link].", "mailpoet"), "setFromAddressEmailUnknownError" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("An error occured when saving FROM email address.", "mailpoet")]);
        // line 102
        echo "
";
        // line 103
        $this->displayBlock('translations', $context, $blocks);
        // line 104
        echo "
";
        // line 105
        $this->displayBlock('after_translations', $context, $blocks);
        // line 106
        echo "
";
        // line 107
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("admin_vendor_chunk.js", "admin_vendor.js");
        // line 110
        echo "

";
        // line 112
        echo do_action("mailpoet_scripts_admin_before");
        echo "

";
        // line 114
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("admin.js");
        // line 116
        echo "

";
        // line 118
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("lib/analytics.js");
        echo "

";
        // line 120
        $context["helpscout_form_id"] = "1c666cab-c0f6-4614-bc06-e5d0ad78db2b";
        // line 121
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "mailpoet_api_key_state", []), "data", []), "support_tier", []) == "premium")) {
            // line 122
            echo "  ";
            $context["helpscout_form_id"] = "e93d0423-1fa6-4bbc-9df9-c174f823c35f";
        }
        // line 124
        echo "
<script type=\"text/javascript\">!function(e,t,n){function a(){var e=t.getElementsByTagName(\"script\")[0],n=t.createElement(\"script\");n.type=\"text/javascript\",n.async=!0,n.src=\"https://beacon-v2.helpscout.net\",e.parentNode.insertBefore(n,e)}if(e.Beacon=n=function(t,n,a){e.Beacon.readyQueue.push({method:t,options:n,data:a})},n.readyQueue=[],\"complete\"===t.readyState)return a();e.attachEvent?e.attachEvent(\"onload\",a):e.addEventListener(\"load\",a,!1)}(window,document,window.Beacon||function(){});</script>

<script type=\"text/javascript\"></script>

<script type=\"text/javascript\">
  if(window['Beacon'] !== undefined && window.hide_mailpoet_beacon !== true) {
    window.Beacon('init', '";
        // line 131
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["helpscout_form_id"] ?? null), "html", null, true);
        echo "');

    // HelpScout Beacon: Configuration
    window.Beacon(\"config\", {
      icon: 'message',
      zIndex: 50000,
      instructions: \"";
        // line 137
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Want to give feedback to the MailPoet team? Contact us here. Please provide as much information as possible!");
        echo "\",
      showContactFields: true
    });

    // HelpScout Beacon: Custom information
    window.Beacon(\"identify\",
      ";
        // line 143
        echo json_encode($this->env->getExtension('MailPoet\Twig\Helpscout')->getHelpscoutData());
        echo "
    );

    if (window.mailpoet_beacon_articles) {
      window.Beacon('suggest', window.mailpoet_beacon_articles)
    }
  }
</script>
<script>
  Parsley.addMessages('mailpoet', {
    defaultMessage: '";
        // line 153
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value seems to be invalid.");
        echo "',
    type: {
      email: '";
        // line 155
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid email.");
        echo "',
      url: '";
        // line 156
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid url.");
        echo "',
      number: '";
        // line 157
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid number.");
        echo "',
      integer: '";
        // line 158
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid integer.");
        echo "',
      digits: '";
        // line 159
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be digits.");
        echo "',
      alphanum: '";
        // line 160
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be alphanumeric.");
        echo "'
    },
    notblank: '";
        // line 162
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should not be blank.");
        echo "',
    required: '";
        // line 163
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value is required.");
        echo "',
    pattern: '";
        // line 164
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value seems to be invalid.");
        echo "',
    min: '";
        // line 165
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be greater than or equal to %s.");
        echo "',
    max: '";
        // line 166
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be lower than or equal to %s.");
        echo "',
    range: '";
        // line 167
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be between %s and %s.");
        echo "',
    minlength: '";
        // line 168
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value is too short. It should have %s characters or more.");
        echo "',
    maxlength: '";
        // line 169
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value is too long. It should have %s characters or fewer.");
        echo "',
    length: '";
        // line 170
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value length is invalid. It should be between %s and %s characters long.");
        echo "',
    mincheck: '";
        // line 171
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("You must select at least %s choices.");
        echo "',
    maxcheck: '";
        // line 172
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("You must select %s choices or fewer.");
        echo "',
    check: '";
        // line 173
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("You must select between %s and %s choices.");
        echo "',
    equalto: '";
        // line 174
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be the same.");
        echo "'
  });

  Parsley.setLocale('mailpoet');
</script>
";
        // line 179
        $this->displayBlock('after_javascript', $context, $blocks);
        // line 180
        echo "<div id=\"mailpoet_modal\"></div>
";
    }

    // line 22
    public function block_templates($context, array $blocks = [])
    {
    }

    // line 25
    public function block_container($context, array $blocks = [])
    {
        // line 26
        echo "<div class=\"wrap\">
  <!-- notices -->
  <div id=\"mailpoet_notice_error\" class=\"mailpoet_notice\" style=\"display:none;\"></div>
  <div id=\"mailpoet_notice_success\" class=\"mailpoet_notice\" style=\"display:none;\"></div>
  <!-- React notices -->
  <div id=\"mailpoet_notices\"></div>

  <!-- Set FROM address modal React root -->
  <div id=\"mailpoet_set_from_address_modal\"></div>

  <!-- title block -->
  ";
        // line 37
        $this->displayBlock('title', $context, $blocks);
        // line 38
        echo "  <!-- content block -->
  ";
        // line 39
        $this->displayBlock('content', $context, $blocks);
        // line 40
        echo "</div>
";
    }

    // line 37
    public function block_title($context, array $blocks = [])
    {
    }

    // line 39
    public function block_content($context, array $blocks = [])
    {
    }

    // line 50
    public function block_after_css($context, array $blocks = [])
    {
    }

    // line 103
    public function block_translations($context, array $blocks = [])
    {
    }

    // line 105
    public function block_after_translations($context, array $blocks = [])
    {
    }

    // line 179
    public function block_after_javascript($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  395 => 179,  390 => 105,  385 => 103,  380 => 50,  375 => 39,  370 => 37,  365 => 40,  363 => 39,  360 => 38,  358 => 37,  345 => 26,  342 => 25,  337 => 22,  332 => 180,  330 => 179,  322 => 174,  318 => 173,  314 => 172,  310 => 171,  306 => 170,  302 => 169,  298 => 168,  294 => 167,  290 => 166,  286 => 165,  282 => 164,  278 => 163,  274 => 162,  269 => 160,  265 => 159,  261 => 158,  257 => 157,  253 => 156,  249 => 155,  244 => 153,  231 => 143,  222 => 137,  213 => 131,  204 => 124,  200 => 122,  198 => 121,  196 => 120,  191 => 118,  187 => 116,  185 => 114,  180 => 112,  176 => 110,  174 => 107,  171 => 106,  169 => 105,  166 => 104,  164 => 103,  161 => 102,  159 => 76,  155 => 74,  153 => 71,  146 => 67,  142 => 66,  136 => 63,  132 => 62,  128 => 61,  124 => 60,  120 => 59,  116 => 58,  112 => 57,  108 => 56,  104 => 55,  100 => 54,  96 => 53,  92 => 51,  90 => 50,  85 => 48,  81 => 46,  79 => 44,  75 => 42,  73 => 25,  69 => 23,  67 => 22,  54 => 11,  45 => 5,  40 => 2,  38 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html", "/opt/bondy/qualite/wp-content/plugins/mailpoet/views/layout.html");
    }
}
