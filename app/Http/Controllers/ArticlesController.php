<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    protected CONST DATABASE_TABLE_PREFIX = 'przemysl24_';

    public function Articles(string $table): object
    {
        $table_name = self::DATABASE_TABLE_PREFIX . $table;

        $article = new Articles($table_name);

        return view(
            'articles.articles',[ 
                'articles_list' => $article->orderByDesc('id')->paginate(10),
                'pagination' => $article->orderByDesc('id')->paginate(10),
                'table' => $table,
            ]
        );
    }

    public function editArticle(string $table, int $id): object
    {
        $table_name = self::DATABASE_TABLE_PREFIX . $table;
        
        $article = new Articles($table_name);

        return view(
            'articles.article',[ 
                'article' => $article->find($id),
                'table' => $table,
            ]
        );
    }    

    public function storeArticle(Request $request, string $table, int $id): object
    {
        $table_name = self::DATABASE_TABLE_PREFIX . $table;
        $articles = new Articles($table_name);

        $article = $articles->find($id);
        $article->data_zmiany = date("Y-m-d H:i:s");
        $article->tytul = $request->tytul;
        $article->zajawka = $request->zajawka;
        $article->tresc = $request->tresc;
        $article->keywords = $request->keywords;
        $article->publ_start = date("Y-m-d H:i:s", strtotime($request->publ_start ?? 'now'));
        $article->publ_koniec = date("Y-m-d H:i:s", strtotime($request->publ_koniec ?? 'now'));
        $article->klucz = Str::slug($request->tytul, '-');
        $article->save();

        return view(
            'articles.article',[ 
                'article' => $articles->find($id),
                'table' => $table,
            ]
        );        
    }        

    public function storeNewArticle(Request $request, string $table): object
    {
        $table_name = self::DATABASE_TABLE_PREFIX . $table;
        $article = new Articles($table_name);

        $article->data = date("Y-m-d H:i:s");
        $article->data_zmiany = date("Y-m-d H:i:s");
        $article->autor = $request->user()->id;
        $article->tytul = $request->tytul;
        $article->zajawka = $request->zajawka;
        $article->tresc = $request->tresc;
        $article->keywords = $request->keywords;
        $article->akcept = 0;
        $article->publ_start = date("Y-m-d H:i:s", strtotime($request->publ_start)) ?? 0;
        $article->publ_koniec = date("Y-m-d H:i:s", strtotime($request->publ_koniec)) ?? 0;
        $article->klucz = Str::slug($request->tytul, '-');
        $article->save();

        return redirect()->route('articles', ['table' => $table]);     
    }    

    public function changeStatusArticle(Request $request, string $table, int $status, int $id,): object
    {
        $table_name = self::DATABASE_TABLE_PREFIX . $table;
        $articles = new Articles($table_name);

        $article = $articles->find($id);
        $article->data_zmiany = date("Y-m-d H:i:s");
        $article->akcept = $status;
        $article->save();

        return redirect()->route('articles', ['table' => $table]);        
    }  

    public function deleteArticle(string $table, int $id): object
    {
        $article = Articles::find($id);
        $article->delete();

        return redirect()->route('articles', ['table' => $table]);     
    }        
}
