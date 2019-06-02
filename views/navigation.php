<div class="w3-panel w3-theme">
  <?php foreach ($menu as $item) {?>
    <a class="<?=$item["class"]?> link w3-button w3-round w3-margin" href="<?=$item["link"]?>">
      <i class="fa <?=$item["icon"]?>"></i> <?=$item["name"]?>
    </a>
  <?php }?>
</div>
