<?php

namespace App;

/**
 * 파일 경로 정보 Class
 */
class FileUploadInfo
{
    const EDITOR_IMAGE_PATH = '/upload/editorImage/';

    /**
     * 랜덤 파일명 생성
     * @param string $extension
     * @return string
     */
    public static function createFileName(string $extension): string
    {
        return date('YmdHis') . substr(microtime(), 2, 6) . '.' . $extension;
    }

    /**
     * 해당 경로 폴더 생성 처리
     * @param string $path
     */
    public static function mkdirPath(string $path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

    /**
     * base64 File Type Return
     * @param string $base64Data
     * @return string
     */
    public static function getBase64FileType(string $base64Data): string
    {
        return explode('/', getimagesize($base64Data)['mime'])[1];
    }
}
