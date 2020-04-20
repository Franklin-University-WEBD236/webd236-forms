<?php
include_once "include/util.php";

function get_index() {
  renderTemplate(
    "views/index.php",
    array(
      'title' => 'Home'
    )
  );
}

?>