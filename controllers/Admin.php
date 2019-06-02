<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends SplintAppController {

  public $limit = 5;

  /**
   * [Initialize description]
   */
  function initialize() {
    $this->load->library("session"); $this->bind("session");
    if ($this->fetch_param("secure", true)) {
      if ( $this->session->userdata($this->fetch_param("admin_session_key")) == null) {
        header('HTTP/1.0 401 Unauthorized');
        die("Unauthorized Access.");
      }
    }
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
    $this->load->library("session");
    $this->bind("session");
    $posterId = $this->fetch_param("admin_session_key", null);
    if ($posterId != null) $posterId = $this->session->userdata($posterId);
    $action = $this->core->savePost($posterId);
    $this->load->package("francis94c/toast");
    if ($action == Blogger::CREATE_AND_PUBLISH || $action == Blogger::CREATE || $action == Blogger::PUBLISH) {
      switch ($action) {
        case Blogger::CREATE_AND_PUBLISH:
          $this->ci->toast->latch("Blog Post Created and Published Succesfully!", "w3-green");
          break;
        case Blogger::CREATE:
          $this->ci->toast->latch("Blog Post Created Successfully!", "w3-green");
          break;
        default:
          $this->ci->toast->latch("There was an error saving the blog post", "w3-red");
          break;
      }
      redirect($this->parent_uri("admin/list_posts"));
    } else {
      //redirect("Admin/editBlog/" . $this->input->post("id"));
    }
  }
  /**
   * [listPosts description]
   * @param  integer $page [description]
   * @return [type]        [description]
   */
  function listPosts($page=1) {
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
    $this->load->package("francis94c/toast");
    $this->ci->toast->toast();
    $this->core->listPosts($page, $this->fetch_param("edit_post_url", $this->parent_uri("admin/edit_post"), true));
  }
  /**
   * [editPost description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  function editPost($id) {

  }
  /**
   * [finalize description]
   * @return [type] [description]
   */
  function finalize() {
    $this->view("footer");
  }
}
?>
