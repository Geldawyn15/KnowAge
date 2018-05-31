<?php
namespace AppBundle\Service;

use claviska\SimpleImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ImgUploader
{
    private $targetDir;

    private $simpleImage;

    public function __construct($targetDir,SimpleImage $simpleImage)
    {
        $this->targetDir = $targetDir;
        $this->simpleImage = $simpleImage;
    }

    public function upload(UploadedFile $file)
    {
        $fileName =  md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $file->getRealPath(). $fileName);

        //$fileName = $file->getBasename(). md5(uniqid()).'.'.$file->guessExtension();

        return $this->getTargetDir().'/'. $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}