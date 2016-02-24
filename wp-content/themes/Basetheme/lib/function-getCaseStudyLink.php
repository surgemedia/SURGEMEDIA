<?php 
	function getCaseStudyLink($term){
	//wp_reset_postdata();
		$casestudy_pages = "false";
		//debug($term);
		// WP_Query arguments
		$getCaseStudyLink = array (
			'post_type'              => array( 'case_study' ),
			'tax_query' => array(
                                array(
                                'taxonomy' => 'clients',
                                'field' => 'slug',
                                'terms' => $term,
                                )
                            ),
		);

		// The Query
		$getCaseStudyLink_query = new WP_Query( $getCaseStudyLink );
		if ( $getCaseStudyLink_query->have_posts() ) {
			while ( $getCaseStudyLink_query->have_posts() ) {
				$getCaseStudyLink_query->the_post();
				$casestudy_pages = get_permalink();
			}
		} else {
			$casestudy_pages = 'false';
		}
		wp_reset_postdata();
		return $casestudy_pages;
}
?>