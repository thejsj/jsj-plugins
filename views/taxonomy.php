<?php 
	
	class Taxonomy extends Content {

		/**
		 * Populate variables based on queried object
		 * 
		 * @return void
		 */
		public function build_object($object = false, $id = false, $taxonomy = false){
			if(!$object && !$id)
				return false;
			if($object && property_exists($object, 'term_id')){
				$this->term_id   = ($object ? $object->term_id : $id);
				$this->term = ($object ? $object : get_term($this->ID, $taxonomy)); 
			}			
			return true;
		}

		/**
		 * For singles, use the post image to genarate a facebook image tag
		 *
		 * @see https://developers.facebook.com/docs/web/tutorials/scrumptious/open-graph-object/
		 * @return string
		 */
		public function get_facebook_image_tags(){
			if(isset($this->posts)){
				foreach($this->posts as $post){
					$post->post->featured_image->get_single_facebook_image();
				}
				return true;
			}
		}

		/**
		 * For singles, get featured image facebook share
		 *
		 * @return string
		 */
		public function get_main_image_src(){
			return 'hello';
		}
	}
?>