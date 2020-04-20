<?php
include_once "include/util.php";

function get_index() {
  renderTemplate(
    "views/about.php",
    array(
      'title' => 'About'
    )
  );
}
?>