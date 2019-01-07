<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use Auth;

class MypageController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        return view('mypage', compact('user'));
    }

    public function upload_image(Request $request)
    {
        // $this->validate($request, [
        //     'file' => [
        //         // 必須
        //         'required',
        //         // アップロードされたファイルであること
        //         'file',
        //         // 画像ファイルであること
        //         'image',
        //         // MIMEタイプを指定
        //         'mimes:jpeg,png',
        //         // 最小縦横120px 最大縦横600px
        //         'dimensions:min_width=120,min_height=120,max_width=600,max_height=600',
        //     ]
        // ]);

        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/avatar');

            $user = Auth::user();
            $user->avatar_image = basename($filename);
            $user->save();

            return redirect('/mypage')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
}


