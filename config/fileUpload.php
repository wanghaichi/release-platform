<?php
/**
 * Created by PhpStorm.
 * User: liebes
 * Date: 2017/7/10
 * Time: 下午3:42
 */

$imageExtensions = [
    'png', 'jpeg', 'jpg', 'bmp'
];
$videoExtensions = [
    'mp4', 'avi', 'wmv', 'png', 'jpeg', 'gif', 'jpg', 'bmp', 'mov'
];
$fileExtensions = [
    'zip', 'rar', 'tar', 'tar.gz', 'tar.bz2'
];
$androidExtensions = [
    'apk', 'zip'
];
return [
    'max_size' => 1024 * 1024 * 5,  // default 5MB
    'rules' => [
        'appPic' => [
            'path' => 'images',
            'extensions' => $imageExtensions,
            'disk' => 'public'
        ],
        'androidAPK' => [
            'path' => 'android_apk',
            'extensions' => $androidExtensions,
            'disk' => 'public',
            'max_size'  =>  1024 * 1024 * 100 //100 MB
        ]
    ]
];

