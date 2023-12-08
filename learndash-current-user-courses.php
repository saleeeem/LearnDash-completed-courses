// First  Course Complete Offer Alert Bar
function show_alert_after_course_completion() {
    
	$user_id = get_current_user_id();
	$enrolled_courses = learndash_user_get_enrolled_courses($user_id);
	
	$completed_courses = array();
	
	foreach ($enrolled_courses as $course_id) {
		$course_status = learndash_user_get_course_progress( $user_id,  $course_id );
		if ($course_status["status"] == "completed") {
			$completed_courses[] = $course_id;
		}
	 }
	$completed_courses = count($completed_courses);
	
	if( $completed_courses == 1 ){
		wp_enqueue_script('first-cours-alert', get_template_directory_uri() . '/course-complete-alert.js', array('jquery'), '1.0', true);
	}
}

add_action('init', 'show_alert_after_course_completion', 10, 2);
