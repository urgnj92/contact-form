<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Contents extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'messages',
        'created_at',
        'updated_at'
    ];

    // 登録処理
    public function getInquiry(Request $request) {
        DB::table('messages') -> insert([
            'name' => $request -> input('your_name'),
            'comment' => $request -> input('your_comments'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);   
    }

    public function getContentsById() {
        $contents = DB::table('messages')->get();
        return $contents;
    }
}
