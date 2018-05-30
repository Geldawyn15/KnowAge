<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use \claviska\SimpleImage;

class ImgUploader
{
    private $targetDir;

    private $simpleimage;

    public function __construct($targetDir,SimpleImage $simpleImage)
    {
        $this->targetDir = $targetDir;
        $this->simpleimage = $simpleImage;
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