<?php

$response = array( 'status' => 0, 'success' => '', 'fail' => '' );
if ( ! empty( $_FILES['files']['name'] ) ) {
	$success = $fail = array();
	
	for ( $i = 0; $i < count( $_FILES['files']['name'] ); $i ++ ) {
		// file name
		$filename = $_FILES['files']['name'][ $i ];
		
		// Location
		$location = 'upload/' . $filename;
		
		// Upload file
		if ( move_uploaded_file( $_FILES['files']['tmp_name'][ $i ], $location ) ) {
			$success[] = $filename;
		} else {
			$fail[] = $filename;
		}
	}
	
	$response = array( 'status' => empty( $fail ) ? 1 : 0, 'success' => implode( ', ', $success ), 'fail' => implode( ', ', $fail ) );
}
echo json_encode( $response );
exit();
