<?php

namespace App\Blog\Actions;

use Framework\Router;
use App\Blog\Models\Posts;
use App\Blog\Models\Categories;
use Framework\Actions\RouterAwareAction;
use Framework\Renderer\RendererInterface;
use Framework\Invoker\Annotation\ParameterConverter;

/**
 * Undocumented class
 */
class PostShowAction
{
    use RouterAwareAction;

    /**
     *
     * @var RendererInterface
     */
    private $renderer;

    /**
     *
     * @var \Framework\Router
     */
    private $router;

    /**
     * Constructeur
     *
     * @param RendererInterface $renderer
     */
    public function __construct(
        RendererInterface $renderer,
        Router $router
    ) {
        $this->renderer = $renderer;
        $this->router = $router;
    }

    /**
     * Show blog post
     *
     * @param string $slug
     * @param Post $post
     * @return mixed
     */
    public function __invoke(string $slug, /*int $id*/Posts $post)
    {
        //$slug = $request->getAttribute('slug');
        //$post = Posts::find($request->getAttribute('id'), ['include' => ['category']]);
        //$post = Posts::find($id, ['include' => ['category']]);
        if ($post->slug !== $slug) {
            return $this->redirect('blog.show', [
                'slug' => $post->slug,
                'id' => $post->id
            ]);
        }

        return $this->renderer->render('@blog/show', [
            'post' => $post
        ]);
    }

    /**
     * Show blog post
     * 
     * @ParameterConverter("category", options={"id"="category_id"})
     * @ParameterConverter("post", options={"id"="id"})
     *
     * @param \App\Blog\Models\Categories $category
     * @param \App\Blog\Models\Posts $post
     * @return mixed
     */
    public function postShow(Categories $category, Posts $post)
    {
        return $this->renderer->render('@blog/show', [
            'post' => $post
        ]);
    }

    /**
     * Show blog post
     * 
     * @ParameterConverter("category", options={"slug"="category_slug"})
     *
     * @param \App\Blog\Models\Categories $category
     * @param \App\Blog\Models\Posts $post
     * @return mixed
     */
    public function postCategoryShow(Categories $category, Posts $post)
    {
        return $this->renderer->render('@blog/show', [
            'post' => $post
        ]);
    }
}
