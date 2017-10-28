<?php

class NewsController {
    public function actionAll() {
        $items = NewsModel::findAll();
        $view = new View();
        $view->assing($items);
        $view->display('viewAll.php');
    }

    public function actionOneByFk($id) {
        $items = NewsModel::findOneByFk($id);
        $view = new View();
        $view->assing($items);
        $view->display('viewOne.php');
    }
}