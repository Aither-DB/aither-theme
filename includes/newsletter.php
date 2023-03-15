<?php 

add_action('init', function(){
    add_action("wp_ajax_nopriv_epic_newsletter","epic_newsletter_new");
    add_action("wp_ajax_epic_newsletter","epic_newsletter_new");
});

function epic_newsletter_new(){

	header('Content-Type: application/json');

	http_response_code(200);

	if( isset( $_POST['email'] ) ){
		$frontpage_id = get_option( 'page_on_front' );
		
		$api_key = get_field('mailchimp_key',$frontpage_id);
		$list_id = get_field('mailchimp_list_id',$frontpage_id);


		$MailChimp = new \DrewM\MailChimp\MailChimp($api_key);
		$MailChimp->verify_ssl = false;

		$email = $_POST["email"];
		$name = isset($_POST["name"]) ? $_POST["name"] : '';

		$result = $MailChimp->post("lists/$list_id/members", array(
			        'email_address' => $_POST["email"],
			        'merge_fields'  => array('FNAME'=>$name),
			        'status'        => 'subscribed',
			    ));

		if ($MailChimp->success()) {

			http_response_code(200);
			$resp = array(
				'status'	=> 200,
				'mailchip' 	=> $result
			);
		    echo json_encode($resp);   

		} else {

			http_response_code(400);
			$resp = array(
				'status'	=> 400,
				'mailchip' 	=> $MailChimp->getLastError()
			);

		    echo json_encode( $resp );

		}
	} else {

		http_response_code(401);
		$resp = array(
			'status'	=> 401,
			'mailchip' 	=> 'Email address is require'
		);
		echo json_encode( $resp );

	}
	exit();
}