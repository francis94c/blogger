<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends SplintAppController {

  private $limit = 5;

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
  }
  /**
   * [index description]
   * @return [type] [description]
   */
  function index() {
    $data = array();
    $data["selected"] = -1;
    $this->fill_params_in_array(["title", "header_name"], $data);
    $data["header_name"] .= " - Admin";
    $this->view("header", $data);
    $this->fill_params_in_array(["new_post_url"], $data);
    $this->view("admin");
    $this->set_param("w3css", false);
    $this->set_param("fontsawesome", false);
    $this->core->latchVarsToConfig();
  }
  /**
   * [newPost description]
   * @return [type] [description]
   */
  function newPost() {
    if ($this->fetch_param("header_footer") == true) {
      $data = array();
      $data["selected"] = -1;
      $this->fill_params_in_array(["title", "header_name"], $data);
      $data["header_name"] .= " - Create Post";
      $this->view("header", $data);
      $this->set_param("w3css", false);
      $this->set_param("fontsawesome", false);
    } else {
      if (!isset($this->params["w3css"])) $this->set_param("w3css", true);
      if (!isset($this->params["fontsawesome"])) $this->set_param("fontsawesome", true);
    }
    $this->core->latchVarsToConfig();
    $this->core->loadEditor($this->parent_uri() . "Admin/savePost");
  }
  /**
   * [savePost description]
   * @return [type] [description]
   */
  function savePost() {
    if ($this->fetch_param("header_footer") == true) {
      $data = array();
      $data["selected"] = -1;
      $this->fill_params_in_array(["title", "header_name"], $data);
      $data["header_name"] .= " - Create Post";
      $this->view("header", $data);
      $this->set_param("w3css", false);
      $this->set_param("fontsawesome", false);
    } else {
      if (!isset($this->params["w3css"])) $this->set_param("w3css", true);
      if (!isset($this->params["fontsawesome"])) $this->set_param("fontsawesome", true);
    }
    $this->core->latchVarsToConfig();
    $this->load->library("session");
    $this->bind("session");
    if (ENVIRONMENT == "development") $this->session->set_userdata("test_admin_id", 1);
    $posterId = $this->fetch_param("admin_session_key", null);
    if ($posterId != null) $posterId = $this->session->userdata($posterId);
    $this->core->savePost($posterId);
  }
}
?>
