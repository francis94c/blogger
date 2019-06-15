<?php
$ci =& get_instance();
?>
<?=$ci->config->item("francis94c/blogger/w3css") == true ? w3css() : "";?>
<?=$ci->config->item("francis94c/blogger/fontsawesome") == true ? fontsawesome() : "";?>
<?php if ($ci->config->item("francis94c/blogger/font") == true) {?>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <style>
  .blogger-font {
    font-family: 'Ubuntu', sans-serif;
  }
  </style>
<?php }?>
