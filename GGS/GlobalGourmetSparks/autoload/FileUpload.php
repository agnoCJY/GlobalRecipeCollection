<?php

class FileUpload {

    public function upload($f3) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['image']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }
        $file_name = sprintf('%s.%s', sha1_file($_FILES['image']['tmp_name']), $ext);
        if (!move_uploaded_file($_FILES['image']['tmp_name'],  'static/img/recipe/'.$file_name)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
        echo $file_name;
    }
}
