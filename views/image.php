<?php

    class Image {

        function __construct($post_id, $attachment_id = false, $html_size = 'slideshow'){

            if($post_id !== false){
                    $this->post_id = $post_id; 
                    $this->attachment_id = get_post_thumbnail_id($this->post_id);
            }
            else {
                    $this->attachment_id = $attachment_id; 
            }       

            // Get all image sizes
            $this->html           = wp_get_attachment_image( $this->attachment_id, $html_size );
            $this->sizes          = wp_get_attachment_metadata( $this->attachment_id );
            $this->full           = $this->get_background_url_by_size($this->attachment_id, 'full');
            $this->large          = $this->get_background_url_by_size($this->attachment_id, 'large');
            $this->medium         = $this->get_background_url_by_size($this->attachment_id, 'medium');
            $this->slideshow      = $this->get_background_url_by_size($this->attachment_id, 'slideshow');
            $this->slideshow2x    = $this->get_background_url_by_size($this->attachment_id, 'slideshow@2x');
            $this->home_page      = $this->get_background_url_by_size($this->attachment_id, 'home-page');
            $this->home_page2x    = $this->get_background_url_by_size($this->attachment_id, 'home-page@2x');
            $this->side           = $this->get_background_url_by_size($this->attachment_id, 'side');
            $this->side2x         = $this->get_background_url_by_size($this->attachment_id, 'side@2x');
            $this->facebook_share = $this->get_background_url_by_size($this->attachment_id, 'facebook');
        }

        /**
         * Given an attachment size and id, get the image src
         *
         * @return string
         */
        public function get_background_url_by_size($attachment_id, $size){
            $url = wp_get_attachment_image_src( 
                $attachment_id, 
                $size
            );
            return $url[0];
        }   

        /**
         * Generate a list of meta tags for facebook
         * Use Only in singles
         *
         * @return string
         */
        public function generate_image_tags(){
            if(isset($this->sizes) && isset($this->sizes['file'])){
                // Get Image Root
                $image_root = $this->get_image_location( $this->sizes['file'] );
                $upload_dir = wp_upload_dir(); 
                $upload_dir_url = $upload_dir['baseurl']; 

                // Display Images
                foreach($this->sizes['sizes'] as $key => $size){ ?>
    
    <!-- Faceook Image : <?php echo $key; ?> -->
    <meta property="og:image" content="<?php echo ($upload_dir_url . '/' . $image_root . '/' . $size['file']); ?>">
    <meta property="og:image:type" content="<?php echo $size['mime-type']; ?>">
    <meta property="og:image:width" content="<?php echo $size['width']; ?>">
    <meta property="og:image:height" content="<?php echo $size['height']; ?>">
            <?php }
            // Display Full Image ?>

    <!-- Faceook Image : full -->
    <meta property="og:image" content="<?php echo ($upload_dir_url . $image_root . '/' . $this->sizes['file']); ?>">
    <meta property="og:image:width" content="<?php echo  $this->sizes['width']; ?>">
    <meta property="og:image:height" content="<?php echo  $this->sizes['height']; ?>">
                <?php }
            return true;
        }

        /**
         * Get image directory by splittin everything by its / and getting everything excpet the last item in the array
         *
         * @return string
         */
        public function get_image_location($image_file_name){
            $filename = $image_file_name; 
            $paths = preg_split("/[\/]+/", $filename );
            array_pop($paths);
            return implode('/', $paths);
        }

        /**
         * Get 'Facebook Share' image for the header
         * This is used for pages with multiple images
         *
         * @return void
         */
        public function get_single_facebook_image(){
             // Get Image Root
            if(isset($this->sizes) && isset($this->sizes['file'])){
                $image_root = $this->get_image_location( $this->sizes['file'] );
                $upload_dir = wp_upload_dir(); 
                $upload_dir_url = $upload_dir['baseurl'];

                // Display Images
                if(isset($this->sizes['sizes']) && isset($this->sizes['sizes']['facebook'])){
                    $size = $this->sizes['sizes']['facebook']; ?>

    <!-- Faceook Image : Facebook Share -->
    <meta property="og:image" content="<?php echo ($upload_dir_url . '/' . $image_root . '/' . $size['file']); ?>">
    <meta property="og:image:type" content="<?php echo $size['mime-type']; ?>">
    <meta property="og:image:width" content="<?php echo $size['width']; ?>">
    <meta property="og:image:height" content="<?php echo $size['height']; ?>">

                <?php }
            }
            return true;
        }
    }

?>