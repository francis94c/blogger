<?php
$ci =& get_instance();
?>
<?=$ci->config->item("francis94c/blogger/w3css") == true ? w3css() : "";?>
<?=$ci->config->item("francis94c/blogger/fontawesome") == true ? fontsawesome() : "";?>
<div class="w3-center">
  <p><i class="fa fa-sun fa-4x"></i></p>
  <h1>No posts to display.</h1>
</div>
