<?php

namespace App\Controllers;

use App\Models\Comments;
use Igoframework\Core\App;
use Igoframework\Core\Base\View;
use Igoframework\Core\Pagination\Paginator;

class MainController extends BaseController
{
    public function indexAction()
    {
        $comments = new Comments;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 5;
        $totalCount = $comments->getCount('status = 1');
        $pagination = new Paginator($currentPage, $perPage, $totalCount);
        $offset = $pagination->getOffset();
        $comments = $comments->getAllForPaginate('status = 1', 'DESC', 'id', $perPage, $offset);
        $this->setVars(compact('comments', 'pagination'));
        View::setMeta('Главная');
    }

    public function storeAction()
    {
        if (! empty($_POST)) {
            $comments = new Comments;
            $data = $_POST;
            $comments->load($data);
            if (! $comments->validate($data)) {
                $comments->getMiniErrors();
                redirect();
            }
            $comments->attributes['date'] = $comments->getCurrentDate();
            if ($comments->save($comments->attributes)) {
                $_SESSION['success'] = 'Комментарий успешно добавлен';
            } else {
                $_SESSION['errors'] = 'Ошибка добавления комментария';
            }
            redirect();
        }
    }
}