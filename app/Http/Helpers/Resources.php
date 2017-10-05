<?php
/**
 * Created by PhpStorm.
 * User: liebes
 * Date: 18/09/2017
 * Time: 6:11 PM
 */

namespace App\Http\Helpers;


use App\Models\File;
use App\Models\Production;

class Resources
{
    public static function Production(Production $production){
        return [
            'id'            =>  $production->id,
            'name'          =>  $production->name,
            'description'   =>  $production->description,
            'slogan'        =>  $production->slogan,
            'picId'           =>  $production->picId
        ];
    }
    public static function File($file){
        return [
            'id'    => $file->id,
            'path'  => $file->file_path,
            'name'  => $file->file_name,
            'size'  => $file->file_size,
            'extension' => $file->file_extension,
            'usage' => $file->file_usage
        ];
    }
    public static function Log($log){
        return [
            'id'            =>  $log->id,
            'production'    =>  self::Production($log->production),
            'pid'           =>  $log->pid,
            'content'       =>  $log->content,
            'time'          =>  $log->time,
            'version'       =>  $log->version,
            'versionCode'   =>  $log->version_code,
            'type'          =>  $log->type,
            'path'          =>  $log->path
        ];
    }
}