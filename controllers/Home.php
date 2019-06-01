<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends SplintAppController {

  public $limit = 5;

  function index() {
    if (isset($this->params["app_page"])) {
      // Page Logic.
      switch ($this->params["app_page"]){
        case "Home":
          $this->core->listPosts(1, $this->fetch_param("view_post_url", $this->parent_uri("view_post")), true);
      }
      return;
    }
    $this->core->listPosts(1, $this->fetch_param("view_post_url", $this->parent_uri("view_post")), true);
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
    $this->bind("blog", "core");
    if (isset($this->params["per_page_count"])) $this->limit = $this->params["per_page_count"];
    // Start
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
    $this->core->latchVarsToConfig();
  }
  /**
   * [viewPost description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  function viewPost($id) {

  }
}
?>
