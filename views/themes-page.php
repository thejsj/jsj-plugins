<?php 

	class ThemesPage extends Single {

		public $template_name = 'themes-page';

		public function __construct( $object = false, $id = false, $key = null ){
			parent::__construct($object, $id, $key);
			// Get Ojbect From Database
			$this->theme_query = $this->get_posts_in_taxonomy(false, 'theme', false);
			// Build list of posts
			$this->themes = $this->get_posts_from_query($this->theme_query);
		}
	}

?>