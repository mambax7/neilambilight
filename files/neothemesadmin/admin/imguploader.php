<?php
function save_pic($up_id0 = "", $width0 = "", $height0 = "", $imageconvert = "", $up_id1 = "", $width1 = "", $height1 = "")
{
    include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/class/upload/class.upload.php";

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
            $handle->file_new_name_body = ${"up_id" . $i};
            $handle->file_overwrite     = true;
            $handle->image_resize       = true;
            $handle->image_x            = ${"width" . $i};
            if (${"height" . $i} == 0) {
                $handle->image_ratio_y = true; // 按比例縮放高度
            } else {
                $handle->image_y = ${"height" . $i};
            }
            // $pic->image_ratio_y = true; // 按比例縮放高度
            if ($imageconvert == 'jpg') {
                $handle->image_convert = 'jpg';
            } else {
                $handle->image_convert = 'png';
            }

            $handle->image_ratio_crop = false;

            $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
            $handle->Process(XOOPS_ROOT_PATH . '/uploads/' . $xoops_theme . '/');
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
