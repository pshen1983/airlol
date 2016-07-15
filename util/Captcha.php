<?php
class Captcha {

    private static $answers = array(5, 8, 9, 3, 7, 9, 4, 6, 6, 3, 2, 6, 4, 1, 3, 2, 7, 6, 3, 0);

    public static function getAnswer($index) {
        return self::$answers[$index-1];
    }

    public static function getBase64Image($index) {
        global $doc_root;

        $imgContent = file_get_contents($doc_root.'/util/captcha/'.$index.'.png');

        $src = 'data:image/png;base64,'.base64_encode($imgContent);

        return $src;
    }
}
?>