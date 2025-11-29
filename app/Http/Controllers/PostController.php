<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan model Post sudah dibuat
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Data dummy untuk contoh
    // private function getPosts()
    // {
    //     return [
    //         [
    //             'id' => 1,
    //             'title' => 'Belajar Laravel',
    //             'content' => 'Laravel adalah framework PHP yang populer.',
    //             'author' => 'Admin',
    //             'created_at' => '2024-01-15'
    //         ],
    //         [
    //             'id' => 2,
    //             'title' => 'Mengenal Blade Template',
    //             'content' => 'Blade adalah template engine bawaan Laravel.',
    //             'author' => 'Admin',
    //             'created_at' => '2024-01-16'
    //         ]
    //     ];
    // }
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::all(); // mengambil semua data post dari database
        return view('posts.index', compact('posts'));
    }



    // Menampilkan form create
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }



    // Menyimpan post baru (contoh validasi)
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'user_id' => 'required'
        ]);

        Post::create($data); // menyimpan data ke database
        // Di sini nanti akan menyimpan ke database
        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dibuat!');
    }



    // Menampilkan detail post
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
}
