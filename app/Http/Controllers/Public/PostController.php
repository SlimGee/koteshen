<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $posts = Post::published()
            ->orderBy('created_at', 'desc')
            ->paginate();

        Meta::prependTitle('Blog')
            ->setDescription('Latest tips to manage and scale your business')
            ->setKeywords(['invoice software', 'billing software', 'invoicing software', 'online invoicing software', 'online billing software', 'invoice app', 'billing app', 'invoicing app', 'online invoicing app', 'online billing app', 'invoice system', 'billing system', 'invoicing system', 'online invoicing system', 'online billing system', 'invoice management software', 'billing management software', 'invoicing management software', 'online invoicing management software', 'online billing management software', 'invoice management app', 'billing management app', 'invoicing management app', 'online invoicing management app', 'online billing management app', 'invoice management system', 'billing management system', 'invoicing management system', 'online invoicing management system', 'online billing management system'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('posts.index'))
                    ->setTitle('Blog')
                    ->setDescription('Latest tips to manage and scale your business')
                    ->addImage(asset('images/banner.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary_large_image')
                    ->setTitle('Blog')
                    ->setDescription('Latest tips to manage and scale your business.')
                    ->setImage(asset('images/banner.jpg'))
            );

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(Post $post): Renderable
    {
        Meta::prependTitle($post->title)
            ->setDescription($post->description)
            ->setKeywords($post->keywords)
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('posts.show', $post))
                    ->setTitle($post->title)
                    ->setDescription($post->excerpt)
                    ->addImage(Storage::url($post->cover))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary_large_image')
                    ->setTitle($post->title)
                    ->setDescription($post->excerpt)
                    ->setImage(Storage::url($post->cover))
            );

        return view('posts.show', ['post' => $post]);
    }
}
