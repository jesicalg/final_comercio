<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    private PostRepository $postRepo;
    private CategoriesRepository $categoriesRepo;


    public function __construct(PostRepository $postRepo, CategoriesRepository $categoriesRepo)
    {
        $this->postRepo = $postRepo;
        $this->categoriesRepo = $categoriesRepo;
       
    }

    public function formNewPost()
    {
        $categories = $this->categoriesRepo->getCategories();

        return view('admin.form-new-post', [
            'categories' => $categories
        ]);
    }

    public function processNewPost(Request $request)
    {
        $request->validate(Post::validationRules(), Post::validationMessages());

        try
        {
            $params = $request->only('author',  'content', 'title',  'picture', 'category_id');

            if($request->hasFile('picture')) {
                $params['picture'] = $this->uploadPicturePost($request);
            }

            $this->postRepo->create($params);

            $posts = $this->postRepo->getPostsPaginate(10);

            //TODO No funciona el mensaje de feedback revisar
            return redirect()
                ->route('posts.crud')
                ->with('feedback.message', '¡Creado con exito!')
                ->with('posts', $posts);
        }
        catch (\Exception $e)
        {
            return redirect()
                ->route('posts.crud')
                ->with('feedback.message', 'Ocurrio un error al crear el post.');
        }
    }

    public function formUpdatePost(string $id)
    {
        $post = $this->postRepo->getPostById($id);
        $categories = $this->categoriesRepo->getCategories();

        if ($post == null) {
            return redirect()
                ->route('posts-crud')
                ->with('feedback.message', 'Ah ocurrido un error al cargar las novedades.');
        }

        if ($categories == null) {
            return redirect()
                ->route('posts-crud')
                ->with('feedback.message', 'Ah ocurrido un error al cargar las categorias.');
        }

        return view('admin.form-post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function processUpdatePost(string $id, Request $request)
    {
        $request->validate(Post::validationRules(), Post::validationMessages());
        $params = $request->only('title', 'content', 'author', 'category_id', 'picture');
        $oldPicture = null;

        if($request->hasFile('picture')) {
            $params['picture'] = $this->uploadPicturePost($request);

            $oldData = $this->postRepo->getPostById($id);
            $oldPicture = $oldData->picture;
        }
        else
        {
            unset($params['picture']);
        }

        $this->postRepo->updatePostById($id, $params);

        if($oldPicture != null)
        {
            $this->deletePicture($oldPicture);
        }


        $posts = $this->postRepo->getPostsPaginate(10);


        //TODO No funciona el mensaje de feedback revisar
        return redirect()
            ->route('posts.crud')
            ->with('feedback.message', '¡Modificado con exito!')
            ->with('posts', $posts);
    }

    public function formDeletePost(string $id)
    {
        $messageResult = 'Eliminado con exito!';
        try
        {
            $this->postRepo->delete($id);
        }
        catch (\Exception $e)
        {
            $messageResult = 'Ocurrio un error al eliminar el post.';
        }

        return redirect()
            ->route('posts.crud')
            ->with('feedback.message', $messageResult);
    }

    public function postCrud()
    {
        try {
            $posts = $this->postRepo->getPostsPaginate(10);

            if ($posts == null) {
                return redirect()
                    ->route('posts-crud')
                    ->with('feedback.message', 'No hay post cargados aun.');
            }

            return view('admin.posts-crud', [
                'posts' => $posts,
            ]);

        } catch (\Exception $e) {
            return redirect()
                ->route('posts-crud')
                ->with('feedback.message', 'Ocuirrio un error al cargar los post.');
        }
    }

    protected function uploadPicturePost(Request $request): string
    {
        $picture = $request->file('picture');
        $pictureName = date('YmdHis_') . Str::slug($request->input('title')) . "." . $picture->guessExtension();
        $picture->storeAs('imgs', $pictureName);
        return $pictureName;
    }

    protected function deletePicture(?string $file): void
    {
        if($file !== null && Storage::has('imgs/' . $file)) {
            Storage::delete('imgs/' . $file);
        }
    }
}
