<div class="w3-row">
  <div class="w3-quarter w3-padding">
    <a href="<?=isset($new_post_url) ? $new_post_url : app_url("admin/new_post")?>" class="link">
      <div class="w3-card w3-round w3-blue w3-padding">
        <p class="w3-center"><i class="fas fa-plus-square fa-4x"></i></p>
        <p class="w3-center w3-large">New Post</p>
      </div>
    </a>
  </div>
  <div class="w3-quarter w3-padding">
    <a href="<?=isset($new_post_url) ? $new_post_url : app_url("admin/list_posts")?>" class="link">
      <div class="w3-card w3-round w3-teal w3-padding">
        <p class="w3-center"><i class="fas fa-list-alt fa-4x"></i></p>
        <p class="w3-center w3-large">Posts</p>
      </div>
    </a>
  </div>
</div>
