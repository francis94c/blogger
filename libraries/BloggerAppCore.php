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
  function listPosts($page=1, $callback=null, $hits=false) {
    if (isset($this->app->params["app_page"]) && isset($this->app->params["page"])) $page = $this->app->params["page"];
    $this->app->blog->renderPostItems(null, $callback, "../splints/{$this->app->splint}/views/empty_view", $page, $this->app->limit, false, $hits);
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
  function loadEditor($callback) {
    $this->app->blog->loadEditor($callback);
  }
  /**
   * [savePost description]
   * @param  [type] $posterId [description]
   * @return [type]           [description]
   */
  function savePost($posterId=null) {
    $this->app->blog->savePost($posterId);
  }
  /**
   * [viewPost description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  function renderPost($id) {
    $this->app->blog->renderPost($id);
  }
}
?>
