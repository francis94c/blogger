<?php
$ci =& get_instance();
$ci->load->library('pagination');
$config['base_url'] = $base_url;
$config['total_rows'] = $total_posts;
$config['per_page'] = $per_page;
$config["uri_segment"] = $uri_segment;
$config["num_links"] = 4;
$config["use_page_numbers"] = TRUE;
$config["full_tag_open"] = "<div class=\"w3-center\"><div class=\"w3-bar\">";
$config["full_tag_close"] = "</div></div>";
$config["cur_tag_open"] = "<span class=\"w3-theme-d2 w3-round w3-hover-theme w3-padding\">";
$config["cur_tag_close"] = "</span>";
$config["prev_link"] = "&laquo;";
$config["next_link"] = "&raquo;";
$config["first_link"] = "First";
$config["last_link"] = "Last";
$config["attributes"] = array("class" => "w3-button w3-hover-theme w3-round");
$ci->pagination->initialize($config);
echo $ci->pagination->create_links();
?>
