function MusicList()   {
    $args = array( 'category_name' => 'Music',
					'post_type' => 'post',// your post type,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'posts_per_page' => 100,
				);                  
    $the_query = new WP_Query( $args );
    while($the_query->have_posts()) : 
        $the_query->the_post();
        $link = get_permalink();
        $title = get_the_title();
        $date = get_the_date();  
		$shopify_embed = '';
		$description = 	'';	
		if( get_field('music-title') ) {
			$title = get_field('music-title');
		}
		if( get_field('shopify_link') ) {
			$shopify_embed =  get_field('shopify_link');
		}
		if( get_field('music-description') ) {
			$description =  get_field('music-description');
		}
        
		$content .= '<div class="music-posts">';
		$content .= '<div class="wp-block-embed__wrapper">' . $shopify_embed . '</div>';
		//$content .= '<h3><a href='.$link.' target="_top">'.$title. '</a></h3>';
        $content .= '<p class="music-description">' . $description . '<a href='.$link.' target="_top">'. ' - learn more' . '</a></p>';
        $content .= '</div>';
    endwhile;
	wp_reset_postdata();
return $content;
}

add_shortcode('MusicList', 'MusicList' );
