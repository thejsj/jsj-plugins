<?php 

	class Home extends Taxonomy {

		public $template_name = "home";

		public function __construct(){
			$this->featured_plugins_0 = $this->get_post_from_repeater_field('featured_plugins_0');
			$this->featured_plugins_1 = $this->get_post_from_repeater_field('featured_plugins_1');
			$this->posts = $this->featured_plugins_0;
			$this->featured_themes = $this->get_post_from_repeater_field('featured_themes');
		}

		/**
		 * Get post objets selected in the Options Page for a repeater field
		 *
		 * @return array
		 */
		public function get_post_from_repeater_field($field_name){
			$posts = array();
			$query = get_field($field_name, 'option'); 
			$i = 0; 
			foreach($query as $post_object){
				array_push($posts, new Single($post_object['post'], false, $i));
				$i++;
			}
			return $posts;
		}

		/**
		 * Get post objets selected in the Options Page for Experimentes
		 *
		 * @return array
		 */
		public function get_featured_experiments(){
			return $this->get_options_posts('featured_experiments');
		}

		/**
		 * Get post object from a multiple select field in the options page
		 * 
		 * @return array
		 */
		public function get_options_posts($key){
			$post_objects = get_field($key, 'option');
			$posts = array();
			foreach($post_objects as $key => $post){
				array_push($posts, new Single($post, false, $key));
			}
			return $posts;
		}

	}	

?>