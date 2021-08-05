<?php

namespace App\Util;

use App\FileUploadInfo;

/**
 * editor base64 to imageFile
 */
class EditorBaseToFile
{

    /**
     * base64 파일로 이미지 저장 후 src 데이터 치환
     * @param string $htmlData
     * @return string
     */
    public static function base64DataToImageSave(string $htmlData = ''): string
    {
        if (!preg_match_all('/src="(data:image\/[^;]+;base64[^"]+)"/', $htmlData, $match)) {
            return $htmlData;
        }

        FileUploadInfo::mkdirPath($_SERVER['DOCUMENT_ROOT'] . FileUploadInfo::EDITOR_IMAGE_PATH);

        foreach ($match[1] as $base64Row) {
            $fileType = FileUploadInfo::getBase64FileType($base64Row);
            $fileSavePath = FileUploadInfo::EDITOR_IMAGE_PATH . FileUploadInfo::createFileName($fileType);

            file_put_contents($_SERVER['DOCUMENT_ROOT'] . $fileSavePath, file_get_contents($base64Row));
            $htmlData = str_replace($base64Row, $fileSavePath, $htmlData);
        }

        return $htmlData;
    }
}
