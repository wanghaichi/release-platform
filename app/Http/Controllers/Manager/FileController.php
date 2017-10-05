<?php

namespace App\Http\Controllers\Manager;

use App\Http\Helpers\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Mockery\Exception;

class FileController extends Controller
{
    // 图片上传配置文件
    protected $config;

    // 上传规则
    protected $rules;

    public function __construct()
    {
        $this->config = config('fileUpload');
        $this->rules = array_keys(config('fileUpload.rules'));
    }


    /**
     * 图片上传方法，配置参见config.fileUpload
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request){
        $usage = $request->input('usage');

        if(empty($usage) || !$this->checkUsage($usage)){
            return response()->json([
                'message' => '规则不符'.$usage
            ]);
        }

        if(!$request->hasFile('upload')){
            return response()->json([
                'message' => '上传失败',
            ]);
        }

        $file = $request->file('upload');
        $name = $file->getClientOriginalName();
        $size = $file->getSize();
        $extension = $this->getExtension($name);

        if(!$this->checkExtension($extension, $usage)){
            return response()->json([
                'message' => '文件类型不符'.$extension
            ]);
        }

        if(!$this->checkFileSize($size, $usage)){
            return response()->json([
                'message' => '文件不能大于5M'
            ]);
        }
        $name = $file->getClientOriginalName();
        $disk = $this->config['rules'][$usage]['disk'];
        $path = $file->storeAs($this->config['rules'][$usage]['path'], Str::Random(40).".".$extension, $disk);

        $file = File::createFile([
            'name'  => $name,
            'size'  => $size,
            'extension' => $extension,
            'path'  => $path,
            'usage' => $usage
        ]);
        if($extension == "apk"){
            $apkInfo = $this->getApkInfo(storage_path('app/public/').$path);
        }
        return response()->json([
            'success'   => true,
            'file'      => '/storage/'.$path,
            'info'      => $file,
            'apkInfo'   =>  $apkInfo ?? ""
        ]);
    }

    public function download($file){

    }

    /**
     * @param $usage
     * @return bool
     */
    protected function checkUsage($usage){
        return in_array($usage, $this->rules);
    }

    /**
     * @param $extension
     * @param $usage
     * @return bool
     */
    protected function checkExtension($extension, $usage){
        return in_array($extension, $this->config['rules'][$usage]['extensions']);
    }

    /**
     * @param $size
     * @param $usage
     * @return bool
     */
    protected function checkFileSize($size, $usage){
        $max_size = $this->config['rules'][$usage]['max_size'] ?? $this->config['max_size'];
        return $size < $max_size;
    }

    protected function getApkInfo($apkPath){
        $apk = new \ApkParser\Parser($apkPath) ?? null;
        if($apk == null)
            return null;
        $manifest = $apk->getManifest();

        $apkInfo = [
            'packageName'   =>  $manifest->getPackageName(),
            'version'       =>  $manifest->getVersionName(),
            'versionCode'   =>  $manifest->getVersionCode()
        ];
        return $apkInfo;
    }

    protected function getExtension($filename){
        return pathinfo($filename,PATHINFO_EXTENSION);
    }
}
