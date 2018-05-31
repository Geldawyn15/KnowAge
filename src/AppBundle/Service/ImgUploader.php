<?php
namespace AppBundle\Service;

use claviska\SimpleImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ImgUploader
{
    private $targetDir;

    private $simpleImage;

    private $publicPath;

    public function __construct($targetDir, $publicPath, SimpleImage $simpleImage)
    {
        $this->targetDir = $targetDir;
        $this->simpleImage = $simpleImage;
        $this->publicPath = $publicPath;
    }

    public function upload(UploadedFile $file)
    {
        $fileName =  md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(),  $fileName);

        //$fileName = $file->getBasename(). md5(uniqid()).'.'.$file->guessExtension();

        return $this->getPublicPath().'/'.$fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

    /**
     * @return mixed
     */
    public function getPublicPath()
    {
        return $this->publicPath;
    }
}