<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;

class HomeController extends Controller
{
    private PostRepository $postRepo;

    public function __construct(PostRepository $repo)
    {
        $this->postRepo = $repo;
    }

    public function home()
    {
        return view ('home');
    }

    public function posts()
    {
        try {
            $posts = $this->postRepo->getPostsPaginate(10);

            if ($posts == null) {
                return redirect()
                    ->route('posts')
                    ->with('feedback.message', 'No hay post aun.');
            }

            return view('posts', [
                'posts' => $posts,
            ]);

        } catch (\Exception $e) {
            return redirect()
                ->route('posts')
                ->with('feedback.message', 'Ocuirrio un error al cargar los post.');
        }
    }
}
