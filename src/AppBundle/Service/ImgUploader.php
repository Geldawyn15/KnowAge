<?php
namespace AppBundle\Service;

use claviska\SimpleImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ImgUploader
{
    private $targetDir;

    private $simpleimage;

    public function __construct($targetDir,SimpleImage $simpleimage)
    {
        $this->targetDir = $targetDir;
        $this->simpleimage = $simpleimage;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}