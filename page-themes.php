<?php 
/*
Template Name: All Themes Page
*/
$this_object = new ThemesPage(get_queried_object());
?>
<?php get_header(); ?>
<?php $this_object->render_template(); ?>
<?php get_footer(); ?>