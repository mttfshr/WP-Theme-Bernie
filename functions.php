<?php 

add_filter( 'default_wp_template_part_areas', 'bernie_template_part_areas' );

function bernie_template_part_areas( array $areas ) {
	$areas[] = array(
		'area'        => 'loop',
		'area_tag'    => 'section',
		'label'       => __( 'Loop', 'bernie' ),
		'description' => __( 'For querying the database to display groups of items', 'bernie' ),
		'icon'        => 'layout'
	);

  $areas[] = array(
		'area'        => 'sidebar',
		'area_tag'    => 'aside',
		'label'       => __( 'Sidebar', 'bernie' ),
		'description' => __( 'For sidebar items', 'bernie' ),
		'icon'        => 'layout'
	);

	return $areas;
}