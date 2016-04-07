<?php
namespace Admin\Controller;

use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;

use Application\Controller\BaseAdminController;

class ArticleController extends  BaseAdminController
{
    public function indexAction()
    {
        $query = $this->getEntityManager()->createQueryBuilder();
        $query
            ->select('a')
            ->from('Blog\Entity\Article', 'a')
            ->orderBy('a.id', 'DESC');

        $adapter = new DoctrineAdapter(new ORMPaginator($query));

        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(2);
        $paginator->setCurrentpageNumber((int) $this->params()->fromQuery('page', 1));

        return array('articles' => $paginator);

    }
}