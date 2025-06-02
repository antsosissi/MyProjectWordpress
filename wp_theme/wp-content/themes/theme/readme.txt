= theme =

* by  sissi

== ABOUT theme ==


Structure du theme :
    - assets : comprend toutes les ressources finales (généré, minifié, ...) du site (css, js, fonts, images design, ...)
    - assets_src : comprend les fichiers sources des ressources css, js finales (minifié, sous sass, ...)
    - inc : comprend tous les fichiers php à inclure (classes, extension, utilitaires, constantes applicatives, configuration par défaut, ...)
        - classes : comprend toutes les classes de service pour les types de contenu, taxonomies, user, ... le traitement par rapport à ces entités doit être centralisé dans ces classes et non pas dans functions.php (fetch champs personnalisés, methode de listing, affichage BO, hook surcharge, ...)
        - extends : comprend tous  les ajouts d'entité du thème (custom fields, type de contenu, tinymce tools, metaboxes, roles, rewriterules, shortcode, sidebar, widgets, taxonomies, ...)
        - utils : comprend toutes les méthodes utiles (conversion date, formatage, debogage, limitation de caractère, ...)
        - constante.inc.php : comprend toutes les constantes applicatives
        - default.config.php : comprend toutes les configurations par défaut du thème par rapport à WP (version jquery, style wysiwyg, desactivation fonctionnalité (admin bar, gutenberg, ...))
    - languages : fichier po et mo pour la traduction
    - lib : comprend les librairies php tierces (que l'on ne doit pas modifier) dans le thème ( librairie de minification, mobile detect, html2pdf, etc ...)
    - page-templates : comprend toutes les modèles de page du thème pour mieux organiser le thème
    - template-part : comprend toutes les parties de template (indépendant, loop, bloc, ...) qui composent les templates.
    - theme-options : comprend toute la gestion du configurateur de thème personnalisé

____________________________________________________________________________________________________________________

Pour la mise en place de GULP voici commande à executer

    -   npm install --save-dev jshint@2.10.3 jshint-stylish asset-builder gulp-autoprefixer browser-sync gulp-concat del gulp-flatten gulp-imagemin gulp gulp-jshint merge-stream lazypipe gulp-plumber gulp-sass gulp-sourcemaps gulp-terser gulp-uglifycss

    -   npm install bower

    -   bower install

Les commandes gulp :
    -   gulp build
    -   gulp watch
