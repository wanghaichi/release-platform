<?php

namespace App\Http\Controllers\Api;

use App\Http\Helpers\Resources;
use App\Models\Log;
use App\Http\Controllers\Controller;
use App\Models\Production;

class AppController extends Controller
{
    //
    public function info(){
        $apps = Production::get()->all();
        $apps = array_map(function($app){
            $app = Resources::Production($app);
            $logs = Log::where(['pid' => $app['id'], 'type' => 'android'])->orderBy('version', 'desc')->orderBy('version_code', 'desc')->get()->all();
            $app['logs']['android'] = array_map(function($log){
                $log = Resources::Log($log);
                $log['path'] = "/storage/". $log['path'];
                return $log;
            }, $logs);
            $logs = Log::where(['pid' => $app['id'], 'type' => 'ios'])->orderBy('version', 'desc')->get()->all();
            $app['logs']['ios'] = array_map(function($log){
                $log = Resources::Log($log);
                return $log;
            }, $logs);
            return $app;
        }, $apps);
//        dd($apps);
        return response()->json([
            'success'   => 1,
            'data'      => $apps
        ]);
    }

    public function latestVersionCode($id){
        $app = Production::findOrFail($id);
        $log = Log::where(['pid' => $id, 'type' =>  "android" ])->orderBy('version_code')->first();
        if(!$log){
            return response()->json([
                'message'   =>  'log missed'
            ]);
        }
        $log = Resources::Log($log);
        return response()->json([
            'success'       =>  1,
            'versionCode'   =>  $log['versionCode']
        ]);
    }
}