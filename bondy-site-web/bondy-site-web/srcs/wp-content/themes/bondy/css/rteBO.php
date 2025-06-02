<?php
/**
 * css pour le RTE BO
 */

header("Content-type: text/css");

//$css = file_get_contents('bondy.css');
//$css .= "\n" .file_get_contents('other.css');
//$css = str_replace('.wrapContentBg ', '', $css);
//echo $css;

$css = file_get_contents('../assets/css/main.css');

echo $css;
?>
body {
  padding : 20px;
  background:#fff;
}

.contentRTE  h2.titre-bloc {
color: #0fcb8f;
font-size: 24px;
font-weight: 700;
line-height: 24px;
}

.contentRTE h2.titre-bloc span {
color: #54362B;
}
