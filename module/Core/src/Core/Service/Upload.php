<?php

namespace Core\Service;

use Core\Service\Service;

class Upload extends Service
{
    public function uploadPhoto($file) {
        $target_path = getcwd() . '/public/temp/';
        $target_path = $target_path . basename($file['name']);
        $validator_img = new \Zend\Validator\File\IsImage(array('image/jpg', 'image/png', 'image/jpeg'));
        if(move_uploaded_file($file['tmp_name'], $target_path))
        {
            die('certo');
        }else{
            die('erro');
        }
        if (!$validator_img->isValid($target_path))
            throw new InvalidMagicMimeFileException('O arquivo enviado não é uma imagem válida');

        $rand = uniqid();
        $origem = $target_path;
        $this->thumb($origem);
        $novo = getcwd() . '/public/temp/' . $rand;
        copy($origem, $novo);
        $image = file_get_contents($novo);
        $data = base64_encode($image);
//        unlink($origem);
//        unlink($novo);

        return $data;
    }
}