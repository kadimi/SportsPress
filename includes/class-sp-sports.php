<?php
/**
 * SportsPress Admin Sports Class.
 *
 * The SportsPress admin sports class stores preset sport data.
 *
 * @class 		SP_Sports
 * @version		0.8
 * @package		SportsPress/Admin
 * @category	Class
 * @author 		ThemeBoy
 */
class SP_Sports {
	private static $presets = array();

	/**
	 * Include the preset classes
	 */
	public static function get_presets() {
		if ( empty( self::$presets ) ) {
			$presets = array();

			include_once( 'preset/class-sp-preset-sport.php' );

			$presets[] = include( 'preset/class-sp-preset-soccer.php' );

			self::$presets = apply_filters( 'sportspress_get_presets', $presets );
		}
		return self::$presets;
	}

	/** @var array Array of sports */
	private $data;

	/**
	 * Constructor for the sports class - defines all preset sports.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		$this->data = sp_get_sport_presets();
	}

	public function __get( $key ) {
		return ( array_key_exists( $key, $this->data ) ? $this->data[ $key ] : null );
	}

	public function __set( $key, $value ){
		$this->data[ $key ] = $value;
	}
}
