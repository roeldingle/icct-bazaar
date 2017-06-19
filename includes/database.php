<?php
session_start();

include('lib/meekrodb.2.3.class.php');

//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");

//get item categories
$item_categories = DB::query("SELECT * FROM tb_item_category");

