<?php
/**
* @package LibSprite
* @copyright (c) 2011 Cullen Walsh
* @license http://www.opensource.org/licenses/bsd-license.php BSD License
*/

/**
* MinHeap for SpriteBlocks that sorts by area
* @package LibSprite
* @subpackage Util
*/
class SpriteUtilBlockHeapArea extends SplHeap {
	public function compare($a, $b) {
		return ($b->area() - $a->area());
	}
}
