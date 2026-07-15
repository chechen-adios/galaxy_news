<?php


namespace App\Controllers;

use App\Models\News;

class NewsController
{
    private News $newsModel;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function list(): void
    {

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) {
            $page = 1;
        }

        $limit = 4;


        $offset = ($page - 1) * $limit;


        $news = $this->newsModel->getPaginatedList($limit, $offset);
        $latest = $this->newsModel->getLatestNews();
        $totalNews = $this->newsModel->getTotalCount();


        $totalPages = (int) ceil($totalNews / $limit);


        include __DIR__ . '/../Views/list.php';
    }

    public function detail(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


        $item = $this->newsModel->getById($id);

        if (!$item) {
            header("HTTP/1.0 404 Not Found");
            echo "Новость не найдена";
            exit;
        }

        include __DIR__ . '/../Views/detail.php';
    }
}
