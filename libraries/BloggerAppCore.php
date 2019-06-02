<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BloggerAppCore {

  private $app;

  function __construct() {
     $this->app =& get_app_instance();
  }
  /**
   * [listPosts description]
   * @return [type] [description]
   */
  function listPosts($page=1, $callback=null, $filter=false, $hits=false, $slug=true) {
    if (isset($this->app->params["app_page"]) && isset($this->app->params["page"])) $page = $this->app->params["page"];
    $this->app->blog->renderPostItems(null, $callback, "../splints/{$this->app->splint}/views/empty_view", $page, $this->app->limit, $filter, $hits, $slug);
    $params = [
      "base_url"    => $this->app->fetch_param("list_posts_url", app_url("posts")),
      "total_posts" => $this->app->blog->getPostsCount(),
      "per_page"    => $this->app->limit,
      "uri_segment" => $this->app->fetch_param("page_number_uri_segment", 4)
    ];
    $this->app->view("paginator", $params);
  }
  /**
   * [latch_vars_to_config description]
   * @return [type] [description]
   */
  function latchVarsToConfig() {
    $this->app->config->set_item("{$this->app->splint}/w3css", $this->app->fetch_param("w3css"));
    $this->app->config->set_item("{$this->app->splint}/fontsawesome", $this->app->fetch_param("fontsawesome"));
  }
  /**
   * [loadEditor description]
   * @param  [type] $callback [description]
   * @return [type]           [description]
   */
  function loadEditor($callback, $postId=null) {
    $this->app->blog->loadEditor($callback, $postId);
  }
  /**
   * [savePost description]
   * @param  [type] $posterId [description]
   * @return [type]           [description]
   */
  function savePost($posterId=null) {
    return $this->app->blog->savePost($posterId);
  }
  /**
   * [viewPost description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  function renderPost($id) {
    $this->app->blog->renderPost($id);
  }
  /**
   * [loadAdminPostListingNavigation description]
   * @return [type] [description]
   */
  function loadAdminPostListingNavigation() {
    $menu = [
      [
        "class" => "w3-theme w3-hover-blue",
        "name"  => "Back",
        "icon"  => "fa-arrow-circle-left",
        "link"  => $this->app->fetch_param("admin_home_url", app_url("admin"))
      ]
    ];
    $this->app->view("navigation", ["menu" => $menu]);
  }
  /**
   * [loadEditorNavigation description]
   * @return [type] [description]
   */
  function loadEditorNavigation() {
    $menu = [
      [
        "class" => "w3-theme w3-hover-blue",
        "name"  => "Home",
        "icon"  => "fa-home",
        "link"  => $this->app->fetch_param("admin_home_url", app_url("admin"))
      ],
      [
        "class" => "w3-theme w3-hover-blue",
        "name"  => "Back",
        "icon"  => "fa-arrow-circle-left",
        "link"  => $this->app->fetch_param("admin_home_url", app_url("admin/list_posts"))
      ]
    ];
    $this->app->view("navigation", ["menu" => $menu]);
  }
}
?>
