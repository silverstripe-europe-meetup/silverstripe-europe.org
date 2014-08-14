<?php
class Greyscaled extends DataExtension {
	//This allows the template to pick up "GreyscaleImage" property, it requests a copy of the image from the cache or if it doesn't exist, generates a new one
	public function GreyscaleImage($RGB = '76 147 29') {
		return $this->owner->getFormattedImage('GreyscaleImage', $RGB);
	}

	//This is called internally by "generateFormattedImage" when the item is not already cached
	public function generateGreyscaleImage(GD $gd, $RGB) {
		$Vars = explode(' ', $RGB);
		return $gd->greyscale($Vars[0], $Vars[1], $Vars[2]);
	}
}