<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/PostRepository.php';
require_once REPOSITORY_PATH . '/AuthorRepository.php';
require_once SERVICE_PATH . '/FileUploadService.php';
use Repositories\PostRepository;
use Services\FileUploadService;
use Repositories\AuthorRepository;


class PrivatePostController
{
    private $postRepository;
    private $authorRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->authorRepository = new AuthorRepository();
    }


    // A nyitolap a cikkek listazasahoz

    public function index()
    {

        $articles = $this->postRepository->getAllArticle();
        view('private/private-articles', ['articles' => $articles]);
    }

    // Cikk hozzaadasa oldal megjelenitese
    public function create()
    {
        $authors = $this->authorRepository->getAll();
        view('private/private-create-article', ['authors' => $authors]);

    }

    // Cikk mentese az adatbazisba (feldolgozo)
    public function store($post)
    {


        if (!isset($post['title'], $post['content'], $post['author'], $_FILES['image'])) {
            setFlashMessage('error', 'Hiányzó adatok!');
            redirect(BASE_URL . '/private-create-article.php');
        }
        $title = $post['title'];
        $content = $post['content'];
        $author_id = $post['author'];
        
        if(empty($title) || empty($content) || empty($author_id)) {
            setFlashMessage('error', 'Hiányzó adatok!');
            redirect(BASE_URL . '/private-create-article.php');
        }
        




        $fileUploadService = new FileUploadService();
        $image_id = $fileUploadService->execute($_FILES['image']);

        if ($image_id) {

            $this->postRepository->createArticle(
                $title,
                $content,
                $image_id,
                $author_id
            );
            
            
            setFlashMessage('success', 'A cikk sikeresen feltöltve!');
            redirect(BASE_URL . '/private-articles.php');
        }

        setFlashMessage('error', 'Hiba a kepfeltöltes soran!');
        redirect(BASE_URL . '/private-create-articles.php');


    }

    // Cikk modositasa oldal megjelenitese
    public function edit()
    {
        if (isset($_SESSION['form'])) {
            $form = $_SESSION['form'];
            unset($_SESSION['form']);
        } else {

            if (!isset($_GET['id'])) {
                setFlashMessage('error', 'Hiányzó azonosító!');
                redirect(BASE_URL . '/private-articles.php');
            }

            $id = $_GET['id'];


            $article = $this->postRepository->getArticleById($id);

            if (!$article) {
                setFlashMessage('error', 'Nincs ilyen azonosítójú cikk!');
                redirect(BASE_URL . '/private-articles.php');
            }

            $form = [
                'id' => $article['id'],
                'title' => $article['title'],
                'content' => $article['content'],
            ];
        }
        view('private/private-edit-article', ['form' => $form]);
    }

    // Cikk modositasa mentese az adatbazisba (feldolgozo)
    public function update($post)
    {

        $article = $this->postRepository->updateArticle($post);

        if (!$article) {
            $_SESSION['form'] = $post;
            setFlashMessage('error', 'A cikk módosítása sikertelen!');
            redirect(BASE_URL . '/private-edit-article.php?id=' . $post['id']);
        }

        setFlashMessage('success', 'A cikk sikeresen módosítva!');
        redirect(BASE_URL . '/private-articles.php');
    }

    // Cikk törlese
    public function destroy()
    {
        if (!isset($_GET['id'])) {
            setFlashMessage('error', 'Hiányzó azonosító!');
            redirect(BASE_URL . '/private-articles.php');
        }

        $id = $_GET['id'];

        $post = $this->postRepository->getArticleById($id);

        $this->postRepository->deleteArticle($id);
        setFlashMessage('success', 'A cikk sikeresen törölve!');
        redirect(BASE_URL . '/private-articles.php');
    }

}

