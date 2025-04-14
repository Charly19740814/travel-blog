<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/AuthorRepository.php';
use Repositories\AuthorRepository;

class PrivateAuthorController
{
    private $authorRepository;

    public function __construct()
    {

        $this->authorRepository = new AuthorRepository();
    }
    // A szerzök listaza privat

    public function index()
    {

        $authors = $this->authorRepository->getAll();
        view('private/private-authors', ['authors' => $authors]);
    }

    // A szerzö hozzaadasa privat
    public function create()
    {

        view('private/private-create-author');
    }

    // A szerzö hozzaadasa adatfeldolgozo metodus
    public function store($post)
    {
        if (isset($post['name']) && isset($post['email'])) {

            $name = $post['name'];
            $email = $post['email'];
            $password = $post['password'];
            $status = $post['status'];
            $hashPassword = encrypt($password);


            $this->authorRepository->createAuthor($name, $email, $hashPassword, $status);
            setFlashMessage('success', 'A szerző sikeresen létrehozva!');
            redirect(BASE_URL . '/private-authors.php');

        }
        setFlashMessage('error', 'Hiányzó adatok!');
        redirect(BASE_URL . '/private-create-author.php');
    }


    public function edit()
    {
        if (isset($_SESSION['form'])) {
            $form = $_SESSION['form'];
            unset($_SESSION['form']);
        } else {

            if (!isset($_GET['id'])) {
                setFlashMessage('error', 'Hiányzó azonosító!');
                redirect(BASE_URL . '/private-authors.php');
            }

            $id = $_GET['id'];


            $author = $this->authorRepository->getAuthorsById($id);

            if (!$author) {
                setFlashMessage('error', 'Nincs ilyen azonosítójú cikk!');
                redirect(BASE_URL . '/private-authors.php');
            }

            $form = [
                'id' => $author['id'],
                'name' => $author['name'],
                'email' => $author['email'],
                'status' => $author['status']
            ];
        }
        view('private/private-edit-author', ['form' => $form]);
    }

    // A szerzö letiltasa privat
    public function statusChange($authorStatus)
    {


        $author = $this->authorRepository->updateAuthor($authorStatus);
        if (!$author) {
            $_SESSION['form'] = $authorStatus;
            setFlashMessage('error', 'A szerző módosítása sikertelen!');
            redirect(BASE_URL . '/private-edit-author.php?id=' . $authorStatus['id']);
        }

        setFlashMessage('success', 'A szerző sikeresen módosítva!');

        redirect(BASE_URL . '/private-authors.php');
    }


    public function destroy()
    {
        if (!isset($_GET['id'])) {
            setFlashMessage('error', 'Hiányzó azonosító!');
            redirect(BASE_URL . '/private-authors.php');
        }

        $id = $_GET['id'];



        $post = $this->authorRepository->getAuthorsById($id);

        $this->authorRepository->deleteAuthor($id);
        setFlashMessage('success', 'A szerzö sikeresen törölve!');
        redirect(BASE_URL . '/private-authors.php');
    }
}





