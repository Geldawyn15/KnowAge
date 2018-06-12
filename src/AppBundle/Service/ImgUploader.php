<?php
namespace AppBundle\Service;

use AppBundle\Entity\Formation;
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

    public function uploadFormationPicture(UploadedFile $file)
    {

        $fileName =  md5(uniqid()).'.'.$file->guessExtension();

        $this->simpleImage
            ->fromFile($file)
            ->bestFit(Formation::PICTURE_WIDTH, Formation::PICTURE_HEIGHT)
            ->toFile($file->getRealPath());

        $file->move($this->getTargetDir(),  $fileName);

        return $this->getPublicPath().'/'.$fileName;
    }


    public function uploadProfilPicture(UploadedFile $file)
    {

        $fileName =  md5(uniqid()).'.'.$file->guessExtension();

        $this->simpleImage
            ->fromFile($file)
            ->bestFit(100, 100)
            ->toFile($file->getRealPath());

        $file->move($this->getTargetDir(),  $fileName);


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