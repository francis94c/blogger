<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends SplintAppController {

  private $limit = 5;

  function index() {
    if ($this->fetch_param("header_footer") == true) {
      $data = array();
      $data["selected"] = -1;
      $this->fill_params_in_array(["title", "header_name"], $data);
      $this->view("header", $data);
      $this->set_param("w3css", false);
      $this->set_param("fontsawesome", false);
    } else {
      if (!isset($this->params["w3css"])) $this->set_param("w3css", true);
      if (!isset($this->params["fontsawesome"])) $this->set_param("fontsawesome", true);
    }
    if (isset($this->params["app_page"])) {
      switch ($this->params["app_page"]){
        case "Home":
          $this->listPosts();
      }
      return;
    }
    $this->listPosts(1);
  }
  /**
   * [install description]
   * @param  [type] $blogName                [description]
   * @param  [type] $adminTableName          [description]
   * @param  [type] $adminIdColumnName       [description]
   * @param  [type] $adminIdColumnConstraint [description]
   * @return [type]                          [description]
   */
  function install($blogName=null, $adminTableName = null, $adminIdColumnName = null, $adminIdColumnConstraint = null) {
    return $this->blog->install($blogName, $adminTableName, $adminIdColumnName, $adminIdColumnConstraint);
  }
  /**
   * [Initialize description]
   */
  function initialize() {
    $params = array();
    if (isset($this->params["name"])) $params["name"] = $this->params["name"];
    $this->load->splint("francis94c/blog", "+Blogger", $params, "blog");
    $this->load->package("francis94c/cdn-helper");
    $this->bind("blog");
    if (isset($this->params["per_page_count"])) $this->limit = $this->params["per_page_count"];
  }
  /**
   * [homePage description]
   * @return [type] [description]
   */
  function listPosts() {
    if (func_num_args() > 0 && is_numeric(func_get_arg(0))) $page = func_get_arg(0);
    if (!isset($page) && isset($this->params["app_page"]) && isset($this->params["page"])) $page = $this->params["page"];
    if (!isset($page)) $page = 1;
    $this->blog->renderPostItems(null, null, "../splints/$this->splint/views/empty_view", $page, $this->limit, false, false);
  }
  /**
   * [latch_vars_to_config description]
   * @return [type] [description]
   */
  private function latch_vars_to_config() {
    $this->config->set_item("$splint/w3css", $this->fetch_param("w3css"));
    $this->config->set_item("$splint/fontsawesome", $this->fetch_param("fontsawesome"));
  }
}
?>
