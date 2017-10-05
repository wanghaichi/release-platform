<?php

namespace App\Http\Controllers\Manager;

use App\Models\File;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Production;
use App\Http\Helpers\Resources;

class AppController extends Controller
{
    //
    public function index($id){
        $app = Production::findOrFail($id);
        $app = Resources::Production($app);
        $app['pic'] = Resources::File(File::findOrFail($app['picId']));
        return view('manager.detail', ['app' => $app]);
    }

    public function editPage($id){
        $app = Production::findOrFail($id);
        $app = Resources::Production($app);

        return view('manager.editPage', ['app' => $app]);
    }

    public function store(Request $request){
//        dd($request->all());
        $id = $request->input('appId');
        $title = $request->input('title');
        $desc = $request->input('desc');
        $slogan = $request->input('slogan');
        $pic = $request->input('pic');
        if(!$id || !$title || !$desc || !$slogan){
            return response()->json(['message' => '信息丢失']);
        }
        $app = Production::findOrFail($id);
        $app->name = $title;
        $app->description = $desc;
        $app->slogan = $slogan;
        $app->picId = $pic ?? $app->picId;
        $app->save();
        return response()->json(['success' => 1, 'message' => Resources::Production($app)]);
    }

    public function iosAddPage($id){
        $app = Production::findOrFail($id);

        return view('manager.iosAddPage', ['app' => $app]);
    }
    public function androidAddPage($id){
        $app = Production::findOrFail($id);


        return view('manager.androidAddPage', ['app' => $app]);
    }

    public function add(Request $request){
        $appId = $request->input('appId');
        $version = $request->input('version');
        $content = $request->input('content');
        $link = $request->input('link');
        $type = $request->input('type');
        $versionCode = $request->input('versionCode') ?? "";
        if(!$version || !$content || !$link || !$type || !$appId){
            return response()->json([
                'message'   =>  'arguments missed'
            ]);
        }
        $app = Production::findOrFail($appId);
//        dd($version);
        $log = Log::create([
            'pid'       =>  $appId,
            'time'      =>  date('Y-m-d H:i:s', time()),
            'version'   =>  $version,
            'version_code'=>$versionCode,
            'type'      =>  $type,
            'path'      =>  $link,
            'content'   =>  $content
        ]);
        return response()->json([
            'success'   =>  1,
            'info'      =>  Resources::Log($log)
        ]);
    }

    public function showLog($id, $type){
        if(!in_array($type, ['android', 'ios']))
            $type = "ios";
        $logs = Log::where(['pid' => $id, 'type' => $type])->orderBy('version', 'desc')->orderBy('version_code', 'desc')->get()->all();
        $logs = array_map(function($log){
            return Resources::Log($log);
        }, $logs);
        return view('manager.showLogs', ['logs' => $logs]);
    }


    public function editLogPage($id){
        $log = Log::findOrFail($id);
        $log = Resources::Log($log);
        return view('manager.editLogPage', ['log' => $log]);
    }

    public function editLog(Request $request){
        $content = $request->input('content');
        $version = $request->input('version');
        $versionCode = $request->input('versionCode');
        $logId = $request->input('logId');
        $log = Log::findOrFail($logId);
        if(!$content || !$version || ($log->type == "Android" && !$versionCode) || !$logId){
            return response()->json(['message' => 'argument missed']);
        }
        $log->content = $content;
        $log->version = $version;
        $log->version_code = $versionCode ?? "";
        $log->save();
        return response()->json([
            'success'   => 1,
            'info'      => Resources::Log($log)
        ]);
    }

    public function deleteLog($id){
        $log = Log::findOrFail($id);
        $log->delete();
        return response()->json([
            'success'   => 1
        ]);
    }
}
