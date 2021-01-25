<?php

namespace Framework\Actions;

use Framework\Annotation\Route;
use Framework\Annotation\ParameterConverter;
use Framework\Router\Router;

/**
 * @Route("/Blog")
 */
class PostShowAction
{

    /**
     *
     * @var RendererInterface
     */
    private $renderer;

    /**
     *
     * @var \Framework\Router\Router
     */
    private $router;

    /**
     * Constructeur
     *
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Show blog post
     *
     * @param string $slug
     * @param Post $post
     * @return mixed
     */
    public function __invoke(string $slug, int $id)
    {
    }

    /**
     * Show blog post
     * 
     * @Route("/category/{category_id:[0-9]+}/post/{id:[0-9]+}", name="blog.postShow", method="GET")
     * @ParameterConverter("category", options={"id"="category_id"})
     * @ParameterConverter("post", options={"id"="id"})
     *
     * @param \App\Blog\Models\Categories $category
     * @param \App\Blog\Models\Posts $post
     * @return mixed
     */
    public function postShow(/*Categories $category, Posts $post*/)
    {
    }

    /**
     * Show blog post
     * 
     * @Route("/category/{category_slug:[a-z\-0-9]+}/post/{id:[0-9]+}", name="blog.postCategoryShow", method="GET")
     * @ParameterConverter("category", options={"slug"="category_slug"})
     *
     * @param \App\Blog\Models\Categories $category
     * @param \App\Blog\Models\Posts $post
     * @return mixed
     */
    public function postCategoryShow(/*Categories $category, Posts $post*/)
    {
    }
}
