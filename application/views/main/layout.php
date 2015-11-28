<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $lang; ?>">
<head>
    <!--Load head for website-->
    <?php echo $head; ?>
</head>
<body>
      <!--Content website-->
    <?php if ($this->router->method == "index") {?>

     <ul class="share-btn-wrp">
        <li class="facebook button-wrap" onclick="location.href = 'https://www.facebook.com/muanhadautu'"></li>
        <li class="google button-wrap" onclick="location.href = 'https://plus.google.com/u/1/105204056825759359661/posts?hl=vi'"></li>

    </ul>
    <?php }
?>
    <a href="#" class="scrollToTop"></a>
      <div id="page" class="">
       <header id="header" class="site-header">
          <?php echo $header; ?>
       </header>
       <div id="main-page">
          <?php if (isset($content)) {
	echo $content;
}
?>
       </div>

       <footer id="footer">
          <?php echo $footer; ?>
       </footer>




</body>
</html>