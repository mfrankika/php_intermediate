<?php
/*
 - config pasta apache 
 - descomentar esta linha bin/apache/apache2.4.9/conf/httpd.conf - procurar mod_rewrite

  criar arq .htaccess
    - no htaccess - fazer ignorar arquivos reais, diretorios ,pastas
    - qdo alguem acessar: http://www.site.com.br/artigo_fulano
    - corresponde no servidor : http://www.site.com.br/index.php?q=artigo_fulano
    - config RewriteRule

 */

    print_r($_GET);
?>
