<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Str;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contents;
use Carbon\Carbon;

class contactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  お問い合わせ入力フォーム
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    // お問い合わせ内容確認
    public function create(Request $request)
    {

        // バリデーション
        $request->validate([
            'your_name' => ['required','max:30'],
            'your_comments' => ['required', 'max:1500']
        ]);

        // 入力したデータを取得
        $data = $request->all();

        return view('contact.confirm', ['data' => $data]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    // お問い合わせ登録処理
    public function store(Request $request)
    {
        // トランザクション開始
        DB::beginTransaction();

        try{
            // インスタンス生成
            $model = new Contents();
            // 登録処理呼び出し
            $model->getInquiry($request);

            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return view('contact.send');
    }

    /**
     * Display the specified resource.
     */
    // お問い合わせ内容一覧
    public function show(Request $request)
    {
        // インスタンス生成
        $model = new Contents;
        // messageテーブルからデータを取得
        $contents = $model->getContentsById();
        // 日付の表示をY/m/dに変更
        foreach($contents as $content){
            $content->created_at = Carbon::parse($content->created_at);
        }
        
        return view('contact.show', ['contents' => $contents]);
    }

}
