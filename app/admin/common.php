<?php
// 应用公共文件
if (!function_exists('mix')) {
    function mix($file_puth)
    {
        if (!file_exists(public_path("/mix-manifest.json"))) {
            return $file_puth;
        }
        $mixManifest = file_get_contents(public_path("mix-manifest.json"));
        $mixManifest = json_decode($mixManifest);
        if (isset($mixManifest->$file_puth)) {
            return $mixManifest->$file_puth;
        }
        return $file_puth;
    }
}
