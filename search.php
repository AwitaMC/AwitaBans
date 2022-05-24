<?php
require_once './inc/page.php';

$page = new Page("search");

$page->print_title();
$page->print_header(true, null, null, $page->t("subtitle.search"));

$page->print_check_form();

$page->print_footer();