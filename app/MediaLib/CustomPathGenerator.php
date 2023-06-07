<?php

namespace App\MediaLib;


use App\Models\Products;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

/**
 * Class CustomPathGenerator
 * @package App\MediaLib
 */
class CustomPathGenerator implements PathGenerator
{
    /**
     * @param Media $media
     *
     * @return string
     */
    public function getPath(Media $media): string
    {
        switch ($media->model_type) {

            case Products::class:
                return Products::PATH . DIRECTORY_SEPARATOR . $media->id . DIRECTORY_SEPARATOR;
                break;
            default:
                return $media->id . DIRECTORY_SEPARATOR;
        }
    }

    /**
     * @param Media $media
     *
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    /**
     * @param Media $media
     *
     * @return string
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'rs-images/';
    }
}
