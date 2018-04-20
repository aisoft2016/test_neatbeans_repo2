<?php
/*
Plugin Name: WP Nonce Object example
Plugin URI: https://github.com/displaynone/wordpress-nonce-object
Description: Helps using WP nonce in an object orientated environment
Author: Luis Sacristán
Version: 1.0.0
Author URI: http://sentidoweb.com
*/

namespace WpNounces;

/**
 * WP Nonce Object example.
 *
 * Helps using WP nonce in an object orientated environment.
 *
 * Nonce is used for security purposes to protect against unexpected or
 * duplicate requests that could cause undesired permanent or irreversible
 * changes to the web site and particularly to its database.
 *
 * @since 1.0.0
 */
class WP_Nonce {

  /**
   * Stores nonce action
   *
   * @since 1.0.0
   * @var string
   */
  private $action;

  /**
   * Initialize Nonce object
   *
   * Class constructor, initializing nonce functions with its action code.
   * Action name should give the context to what is taking place.
   *
   * @since 1.0.0
   *
   * @param string $action Optional. Nonce action
   */
  public function __constructor( $action = -1 ) {
    $this->action = $action;
  }

  /**
   * Generates and returns a nonce
   *
   * The nonce is generated based on the current time, the $action var,
   * and the current user ID.
   *
   * @since 1.0.0
   *
   * @return string The one use form token
   */
  public function create_nonce( ) {
    return wp_create_nonce( $this->action );
  }

  /**
   * Display message to confirm the action being taken.
   *
   * If the action has the nonce explain message, then it will be displayed
   * along with the 'Are you sure?' message.
   *
   * @since 1.0.0
   */
  public function nonce_ays( ) {
    wp_nonce_ays( $this->action );
  }


  /**
   * Display message to confirm the action being taken.
   *
   * If the action has the nonce explain message, then it will be displayed
   * along with the 'Are you sure?' message.
   *
   * @since 1.0.0
   *
   * @param   string  $name     Optional. Nonce name. This is the name of the nonce
   *                            hidden form field to be created
   * @param   boolean $referer  Optional. Whether also the referer hidden form
   *                            field should be created with the
   *                            wp_referer_field() function.
   * @param   boolean $echo     Optional. Whether to display or return the nonce
   *                            hidden form field
   * @return  string  The nonce hidden form field
   */
  public function nonce_field( $name = '_wpnonce', $referer = true, $echo = true ) {
    return wp_nonce_field( $this->action, $name, $referer, $echo );
  }


  /**
   * Retrieve URL with nonce added to URL query.
   *
   * The returned result is escaped for display.
   *
   * @since 1.0.0
   *
   * @param   string  $actionurl  URL to add nonce action
   * @param   string  $name       Optional. Nonce name. This is the name of the
   *                              nonce hidden form field to be created
   * @return  string  URL with nonce action added
   */
  public function nonce_url( $actionurl, $name = '_wpnonce' ) {
    return wp_nonce_url( $actionurl, $this->action, $name );
  }

  /**
   * Verify that a nonce is correct and unexpired with the respect to a
   * specified action.
   *
   * The function is used to verify the nonce sent in the current request
   * usually accessed by the $_REQUEST PHP variable.
   *
   * @since 1.0.0
   *
   * @param   string            $nonce  Nonce to verify.
   * @return  (boolean/integer) False if the nonce is invalid. Otherwise:
   *                              1 – if generated in the past 12 hours or less.
   *                              2 – if generated between 12 and 24 hours ago.
   */
  public function verify_nonce( $nonce ) {
    return wp_verify_nonce( $nonce, $this->action );
  }


}