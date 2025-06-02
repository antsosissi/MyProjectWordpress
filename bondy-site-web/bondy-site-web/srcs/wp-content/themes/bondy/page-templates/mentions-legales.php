<?php
/**
 * Template Name: Standard
 *
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

get_header();

global $post;
$oPage = CPage::getById($post->ID);
//die(uniqid());
?>
    <div id="primary" class="<?php if( is_front_page() ) { echo "home-section-wrapper"; } ?>">
        <div class="mentions-legales rich-text">
            <div class="container">
                <div class="row">
                    <h2 class="main-title col-12 text-center">Mentions Légales</h2>
                    <div class="mentions-content col-9">
                        <h4>Mentions Légales</h4>
                        <p>Le Directeur de la publication du site est Monsieur Max FONTAINE en la qualité de Directeur Général de la société BÔNDY.</p>
                        <h4>BÔNDY</h4>
                        <p>Immeuble ARO Ampefiloha - escalier B - Antananarivo 101 Madagascar</p>
                        <h4>NIF/STAT</h4>
                        <p>0000000000 / 00000000000000000 Société Anonyme au capitale de 10 000 000 Ar</p>
                        <h4>Conception graphique & développement</h4>
                        <p>PULSE</p>
                        <h4>Hébergement</h4>
                        <p>PULSE</p>
                        <p>L'utilisateur du site web reconnait disposer de la compétence et des moyens nécessaires pour accéder et utiliser ce site web. L'utilisateur reconnait également avoir pris connaissance de la présente notice légale et s'engage à la respecter.<br/><br/><br/>Les informations fournies par la société BÔNDY au sein du site web, le sont à titre indicatif. La société BÔNDY ne saurait garantir l'exactitude, la complétude, l'actualité des informations diffusés sur son site web. En conséquence, l'utilisateur reconnait utiliser ces informations sous sa responsabilité exclusive.<br/><br/><br/>Le site web de la société BÔNDY est normalement accessible 24h/24 et 7 jours/7. Indépendamment de cas de force majeure, de difficultés informatiques, de difficultés liées à la structure des réseaux de télécommunications ou de difficultés techniques, pour des raisons de maintenance, sans que cette liste ne soit exhaustive, l'accès à toute ou partie du site web pourra être suspendue ou supprimée sur simple décision de la société BÔNDY.<br/><br/><br/>Le site web est susceptible de modifications et d'évolution sans notifications d'aucune sorte.<br/><br/><br/>En conformité avec les dispositions de la loi du 6 Janvier 1978 relative à l'informatique, aux fichiers et aux libertés, le traitement automatisé des données nominatives réalisées à partir du site web a fait l'objet d'une déclaration auprès de la Commission nationale de l'informatique et des libertés (CNIL).<br/><br/><br/>L'utilisateur est notamment informé que, conformément à l'article 27 de la loi informatique, fichiers et libertés du 6 Janvier 1978, les informations communiquées par l'utilisateur du fait des formulaires présents sur le site web, sont nécessaires pour répondre à sa demande et sont destinées à la société uniquement à la société BÔNDY à des fins de gestion administrative et commerciale.<br/><br/>L'utilisateur est informé qu'il dispose d'un droit d'accès et de rectification portant sur les données le concernant en écrivant à la société BÔNDY. L'utilisateur est informé, que lors de ses visites sur le site web, un cookie peut s'installer automatiquement sur son logiciel de navigation. Le cookie est un bloc de données qui ne permet pas d'identifier l'utilisateur mais sert à enregistrer des informations relatives à la navigation de celui-ci sur le site web.<br/><br/><br/>Le paramétrage du logiciel de navigation permet d'informer de la présence du cookie et éventuellement de le refuser. Il est toutefois précisé que pour des raisons techniques le fait de désactiver les cookies peut limiter l'accès au site web par l'utilisateur.<br/><br/><br/>Les utilisateurs du site web de la société BÔNDY sont tenus de respecter les dispositions de la loi relative à l'informatique, aux fichiers et aux libertés, dont la violation est passible de sanctions pénales. Ils doivent notamment s'abstenir, s'agissant des informations nominatives auxquelles ils accèdent, de toute utilisation détournée, et d'une manière générale, de tout acte susceptible de porter atteinte à la vie privée ou à la réputation des personnes.<br/><br/><br/>Les marques de la société BÔNDY et de ses partenaires, ainsi que les logos figurant sur le site web sont des marques (semi-figuratives ou non) déposées. Toute reproduction totale ou partielle de ces marques et/ou de ces logos, effectuée à partir des éléments du site web sans autorisation expresse de la société BÔNDY est donc prohibée, au sens de l'article L713-2 du Code de la propriété Intellectuelle.<br/><br/><br/>La structure générale, ainsi que les logiciels, textes, images animées ou non, sons, savoir-faire..., et tous autres éléments composants le site web sont la propriété exclusive de la société BÔNDY.<br/><br/><br/>Le contenu du site web est régi par la loi française. Il en est ainsi des règles de fond comme des règles de forme, et son contenu sera apprécié par la seule juridiction française compétente. Les règles de conflits de loi sont exclues au profit de l'application complète et sans réserves de la loi française.<br/><br/><br/>La société BÔNDY met tout en œuvre pour offrir aux utilisateurs des informations et/ou outils disponibles et vérifiés, mais ne saurait être tenue pour responsable des erreurs d'une absence de disponibilité des informations et/ou de la présence de virus sur son site web.</p>
                    </div><!-- .mentions-content -->
                </div>
            </div>
        </div><!-- .mentions-legales -->
    </div><!-- #primary -->
<?php
get_footer();
