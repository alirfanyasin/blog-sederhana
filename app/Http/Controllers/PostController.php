<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Data dummy untuk contoh
    private function getPosts()
    {
        return [
            [
                'id' => 1,
                'title' => 'Belajar Laravel',
                'content' => 'Laravel adalah framework PHP yang populer.',
                'author' => 'Admin',
                'created_at' => '2024-01-15'
            ],
            [
                'id' => 2,
                'title' => 'Mengenal Blade Template',
                'content' => 'Blade adalah template engine bawaan Laravel.',
                'author' => 'Admin',
                'created_at' => '2024-01-16'
            ]
        ];
    }
    // Menampilkan semua post
    public function index()
    {
        $posts = $this->getPosts();
        return view('posts.index', compact('posts'));
    }
    // Menampilkan form create
    public function create()
    {
        return view('posts.create');
    }
    // Menyimpan post baru (contoh validasi)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:100'
        ]);
        // Di sini nanti akan menyimpan ke database
        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dibuat!');
    }
    // Menampilkan detail post
    public function show($id)
    {
        $posts = $this->getPosts();
        $post = collect($posts)->firstWhere('id', $id);
        return view('posts.show', compact('post'));
    }








    // Create atau Tambah Data
    public function tambahData()
    {

        $data = [
            'title' => 'Judul ketiga',
            'content' => 'Isi konten ketiga',
            'author' => 'Penulis ketiga'
        ];

        Post::create($data);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $post->update([
            'title' => 'Judul Telah Diubah',
            'content' => 'Isi konten telah diubah'
        ]);
        return redirect()->to('/');
    }

    public function hapus($id)
    {
        // $post = Post::find($id);
        // $post->delete();
        // return redirect()->to('/');

        Post::destroy($id);
        return redirect()->to('/');
    }

    public function bacaData()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            echo "Judul: " . $post->title . "<br>";
            echo "Isi: " . $post->content . "<br>";
            echo "Penulis: " . $post->author . "<br><hr>";
        }
    }
}
