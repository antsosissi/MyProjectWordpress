
<?php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
?>
<!-- partage sur reseaux sociaux -->
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Facebook" target="_blank"><i class="icobnd-facebook"></i></a>
        </li>

        <li>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $postUrl?>" title="Linkedin" target="_blank"><i class="icobnd-linkedin-2"></i></a>
        </li>