<?php


namespace Controllers;

require_once REPOSITORY_PATH . '/PostRepository.php';
use Repositories\PostRepository;


class PublicPostController
{
    private $postRepository;


    public function __construct()
    {
        $this->postRepository = new PostRepository();

    }
    // A nyitolap a cikkek listazasahoz
    public function index()
    {

        $posts = $this->postRepository->getAllArticle();
        view('public/posts', ['posts' => $posts]);
    }


    // Egy cikk megjelenitese

    public function show($id)
    {

        $post = $this->postRepository->getPostById($id);
        return view('public/post', ['post' => $post]);
    }
}
