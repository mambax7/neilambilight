<?php
/**
 * @param string $up_id
 * @param string $width
 * @param string $height
 * @param string $modules
 * @param string $plural
 */
function save_pic($up_id = "", $width = "", $height = "", $modules = "", $plural = "")
{
    require_once TADTOOLS_PATH . '/upload/class.upload.php';

    //多圖上傳
    $files = array();
    foreach ($_FILES['upfile'] as $k => $l) {
        foreach ($l as $i => $v) {
            if (!array_key_exists($i, $files)) {
                $files[$i] = array();
            }
            $files[$i][$k] = $v;
        }
    }

    foreach ($files as $i => $file) {
        $handle = new Upload($file);

        if ($handle->uploaded) {
            if ($plural == false) {
                $handle->file_new_name_body = ${"up_id"};
            } else {
                $handle->file_new_name_body = $up_id[$i];
            }

            $handle->file_overwrite = true;
            $handle->image_resize   = true;
            $handle->image_x        = $width;
            if ($height == 0) {
                $handle->image_ratio_y = true; // 按比例縮放高度
            } else {
                $handle->image_y = $height;
            }
            // $pic->image_ratio_y = true; // 按比例縮放高度
            /*if($imageconvert=='jpg'){
             $handle->image_convert = 'jpg';
            }else{
             $handle->image_convert = 'png';
            }*/
            $handle->image_convert = 'jpg';

            $handle->image_ratio_crop = true;

            $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
            $handle->Process(XOOPS_ROOT_PATH . '/uploads/' . $modules . '/image/.thumbs/');

            if ($handle->processed) {
                echo 'OK';
            } else {
                echo 'Error: ' . $handle->error;
            }
        } else {
            echo 'Error: ' . $handle->error;
        }
        unset($handle);
    }
}
