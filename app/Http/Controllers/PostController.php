<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Langkah;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function home()
    {
        $datas = Post::orderBy('created_at', 'desc')->get();
        return view('index', compact('datas'));
    }

    function addForm()
    {
        return view('add');
    }

    function add(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);
        // dd($validate);

        $validate['gambar'] = env('APP_URL') . '/storage/' . $request->file('gambar')->store('images', 'public');
        $validate['suka'] = 0;
        $validate['user_id'] = auth()->user()->id;

        if ($post = Post::create($validate)) {
            foreach ($request->bahan as $key => $value) {
                Bahan::create([
                    'nama' => $value,
                    'post_id' => $post->id,
                ]);
            }

            foreach ($request->langkah as $key => $value) {
                Langkah::create([
                    'nama' => $value,
                    'post_id' => $post->id,
                ]);
            }
            return redirect()->back()->with('success', 'Berhasil menambahkan resep');
        }

        return redirect()->back()->withErrors(['error' => 'Gagal menambahkan resep']);
    }

    function suka(Post $post)
    {
        $post->suka += 1;
        $post->save();
        return redirect()->back();
    }

    function detail(Post $post)
    {
        $bahans = Bahan::where('post_id', $post->id)->get();
        $langkahs = Langkah::where('post_id', $post->id)->get();
        return view('detail', compact('post', 'bahans', 'langkahs'));
    }
}
