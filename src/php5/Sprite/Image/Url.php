<?php
/**
* @package Sprite
* @copyright (c) 2011 Cullen Walsh
* @license http://www.opensource.org/licenses/bsd-license.php BSD License
*/

/**
* Represents a resource located on a remote http server
* @package Sprite
* @subpackage Image
*/
class Sprite_Image_Url extends Sprite_Image {
	/**
	* The url passed to this object
	* @var string
	* @access private
	*/
	private $url;

	/**
	* Creates a new Sprite_Image_Url object
	* @param string $url URL of the image on a remote server
	*/
	public function __construct($url) {
		$this->url = $url;
	}

	/**
	* {@inheritdoc}
	*/
	public function load() {
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$data = curl_exec($ch);
		curl_close($ch);

		$this->image = imagecreatefromstring($data);

		return ($this->image !== false);
	}

	/**
	* Returns the URL initially passed to this object
	* @return string Url for this resource
	*/
	public function getURL() {
		return $this->url;
	}
}
