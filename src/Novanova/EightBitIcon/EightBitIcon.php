<?php

namespace Novanova\EightBitIcon;

use Gregwar\Image\Image;

/**
 * Class EightBitIcon
 * @package Novanova\EightBitIcon
 */
class EightBitIcon
{

    /**
     * @var int
     */
    private $size = 400;

    /**
     * @param $filename
     * @param null $sex
     * @param bool $unfiltered
     */
    public function generate($filename, $sex = null, $unfiltered = false)
    {
        $DS = DIRECTORY_SEPARATOR;

        $parts = array('background', 'face', 'clothes', 'hair', 'eyes', 'mouth');

        if (!in_array($sex, array('male', 'female'))) {
            $sex = 1 === mt_rand(1, 2) ? 'male' : 'female';
        }

        $img = Image::create($this->size, $this->size);

        foreach ($parts as $part) {
            $images = glob(__DIR__ . $DS . 'img' . $DS . $sex . $DS . $part . $DS .'*.{jpg,jpeg,png,gif}', GLOB_BRACE);

            if (!$unfiltered) {
                $images = array_filter(
                    $images,
                    function ($image) {
                        $path_parts = pathinfo($image);
                        return false === stristr($path_parts['filename'], 'unfiltered-');
                    }
                );
            }
            $img->merge(Image::open($images[array_rand($images)]));
        }

        $img->save($filename);
    }

}
