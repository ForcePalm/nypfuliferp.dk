<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class UploadComponent extends Component
{
    public function upload($file, $path){
        //Checks if folder exists, else it makes a folder
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        //Path to upload folder
        $targetPath = $path . DS;

        //Random string
        $i = 20;
        $randomString = bin2hex(random_bytes($i));

        //Sets the filename to the random generated string and adds the file extension
        $fileName = $randomString . '.webp';

        //Sets targetfil to the targetpath and file
        $targetFile = $targetPath . $fileName;

        //Checks for errors, if no errors it uploads else it spits out a error
        if ($file->getError() === UPLOAD_ERR_OK) {
            if(move_uploaded_file($file->getStream()->getMetadata('uri'), $targetFile)) {
                return $fileName;
            } else {
                $this->Flash->error(__('Kunne ikke upload billedet. PrÃ¸v venligst igen.'));
            }
        } else {
            $this->Flash->error(__('Der skete en fejl. PrÃ¸v venligst igen.'));        
        }
    }
}