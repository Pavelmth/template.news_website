<?php

include __DIR__.'/../models/model.php';

class AdminController {

    public function actionAdmin () {
        $view = new View();
        $view->display('viewAdmin.php');
    }

    public function actionInsert() {
        $view = new View();
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $article = new NewsModel();
        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        $article->date = date('d.m.y');
        $article->save();
        $view->assing($article);
        }
        $view->assing($article->id);
        $view->display('viewform.php');
    }

    public function actionSearching ()
    {

            if (!empty($_POST['title'])) {
                $items = NewsModel::findOneByColumn('title', $_POST['title']);
            } else if (!empty($_POST['content'])) {
                $items = NewsModel::findOneByColumn('content', $_POST['content']);
            } else if (!empty($_POST['date'])) {
                $items = NewsModel::findOneByColumn('date', $_POST['date']);
            } else {$items = [];}

        $view = new View();

        $view->assing($items);
        $view->display('viewSearching.php');
    }

    public function actionUpdate ()
    {
        $view = new View();
        if (! empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['content'])) {
            $article = new NewsModel();
            $article->id = $_POST['id'];
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->save();
            $view->assing($article);
        }

        $view->display('viewUpdate.php');
    }

    public function actionDelete ()
    {
        $view = new View();
        if (!empty($_POST['id'])) {
            $article = new NewsModel();
            $article->id = $_POST['id'];
            $article->delete();
            $view->assing($article);
        }

        $view->display('viewDelete.php');
    }
}

