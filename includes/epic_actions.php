<?php
/**
 *  File Contains all Actions created by Epicup
 */
use Epicup\Wordpress\Response\Ajax;

/**
 * Before Reset password action
 * This action should be called before any output
 *
 * @author Mateusz Bajda - Epicup
 */
add_action("epicup_before_reset_password", function() {
    global $post;

    $rp_path = "/";
    $rp_cookie = 'wp-resetpass-' . COOKIEHASH;
    if ( isset( $_GET['key'] ) ) {
        $value = sprintf( '%s:%s', wp_unslash( $_GET['login'] ), wp_unslash( $_GET['key'] ) );
        setcookie( $rp_cookie, $value, 0, $rp_path, COOKIE_DOMAIN, is_ssl(), true );
        wp_safe_redirect( remove_query_arg( array( 'key', 'login' ) ) );
        exit;
    }

    if ( isset( $_COOKIE[ $rp_cookie ] ) && 0 < strpos( $_COOKIE[ $rp_cookie ], ':' ) ) {
        list( $rp_login, $rp_key ) = explode( ':', wp_unslash( $_COOKIE[ $rp_cookie ] ), 2 );
        $user = check_password_reset_key( $rp_key, $rp_login );
        if ( isset( $_POST['pass1'] ) && ! hash_equals( $rp_key, $_POST['rp_key'] ) ) {
            $user = false;
        }
    } else {
        $user = false;
    }


    if ( ! $user || is_wp_error( $user ) ) {
        setcookie( $rp_cookie, ' ', time() - YEAR_IN_SECONDS, $rp_path, COOKIE_DOMAIN, is_ssl(), true );

        $url = site_url("wp-login.php");

        if ($post->post_type == "page") {
            $url = get_permalink($post);
        }

        $error = isset($_REQUEST["error"])? $_REQUEST["error"] : "";

        if ( $user && $user->get_error_code() === 'expired_key' ) {
            $url = add_query_arg(
                array(
                    "action" => "lostpassword",
                    "error" => "expiredkey"
                ),
                $url);
            wp_redirect( $url );
            exit;
        } else if ($error != "invalidkey") {
            $url = add_query_arg(
                array(
                    "action" => "lostpassword",
                    "error" => "invalidkey"
                ),
                $url);
            wp_redirect( $url );
            exit;
        }
    }
});

/**
 * This action is WP_Ajax handle to process reset password request
 * request must be done with POST method and must contain new passwords under "pass1" and "pass2" key
 *
 * @author Mateusz Bajda - Epicup
 */
add_action("wp_ajax_nopriv_epicup_ajax_pwd_restore", function() {
    $resp = new Ajax();
    $resp->setData(
        array(
            "msg" => "Cannot process request"
        )
    );

    list( $rp_path ) = explode( '?', wp_unslash( $_SERVER['REQUEST_URI'] ) );
    $rp_cookie = 'wp-resetpass-' . COOKIEHASH;

    if ( isset( $_COOKIE[ $rp_cookie ] ) && 0 < strpos( $_COOKIE[ $rp_cookie ], ':' ) ) {
        list( $rp_login, $rp_key ) = explode( ':', wp_unslash( $_COOKIE[ $rp_cookie ] ), 2 );
        $user = check_password_reset_key( $rp_key, $rp_login );
        if ( isset( $_POST['pass1'] ) &&  isset($_POST["rp_key"]) && ! hash_equals( $rp_key, $_POST['rp_key'] ) ) {
            $user = false;
        }
    } else {
        $user = false;
    }

    $errors = new WP_Error();

    if ( isset($_POST['pass1']) && $_POST['pass1'] != $_POST['pass2'] ) {
        $errors->add( 'password_reset_mismatch', __( 'The passwords do not match.' ) );
    }

    if (is_wp_error($user)) {
        $resp->setStatus("error");
        $resp->setCode(400);
        $resp->setData(
            array(
                "msg" => $user->get_error_message()
            )
        );
    } else if(is_object($user) && get_class($user) === WP_User::class) {
        /**
         * Fires before the password reset procedure is validated.
         *
         * @since 3.5.0
         *
         * @param object           $errors WP Error object.
         * @param WP_User|WP_Error $user   WP_User object if the login and reset key match. WP_Error object otherwise.
         */
        do_action( 'validate_password_reset', $errors, $user );

        if ( ( ! $errors->get_error_code() ) && isset( $_POST['pass1'] ) && !empty( $_POST['pass1'] ) ) {
            reset_password($user, $_POST['pass1']);
            setcookie( $rp_cookie, ' ', time() - YEAR_IN_SECONDS, $rp_path, COOKIE_DOMAIN, is_ssl(), true );

            $resp->setStatus("success");
            $resp->setCode(200);
            $resp->setData(
                array(
                )
            );
        } else {
            $resp->setStatus("error");
            $resp->setCode(400);
            $resp->setData(
                array(
                    "msg" => $errors->get_error_message()
                )
            );
        }
    } else {
        $resp->setStatus("error");
        $resp->setCode(400);
        $resp->setData(
            array(
                "msg" => "Cannot process request"
            )
        );
    }

    $resp->send();
});