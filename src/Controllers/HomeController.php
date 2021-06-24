<?php

namespace Nin\Controllers;

use Nin\Libs\Logger;
use Nin\Libs\Notification\MailNotification;
use Nin\Libs\View\Page;
use Nin\Libs\View\PHPTemplateFactory;
use Nin\Libs\Db\MySQLQueryBuilder;
use Nin\Libs\Db\MySQLQueryFactory;
use Nin\Libs\Cache\MemcachedFactory;
use Nin\Libs\Cache\Cache;

class HomeController
{
    public function indexAction()
    {
        /**
         * Creational design pattern
         */

        /**
         * 01.Singleton pattern
         * Logger
         */
        Logger::log("Start application");

        /**
         * 02.Factory Method pattern
         * Notification
         */
        $notification = new MailNotification("admin@gmail.com", "123456");
        $notification->send("Send notification message for Factory Method example");

        /**
         * 03.Abstract Factory pattern
         * View template
         */
        $page = new Page();
        $viewFactory = new PHPTemplateFactory();
//    echo $page->render($viewFactory, ["title" => "Page title", "content" => "Page content"]);

        /**
         * 04.Builder
         * MysqlQueryBuilder
         */
        $mysqlFactory = new MySQLQueryFactory();
        $builder = $mysqlFactory->getSQLBuilder();
        $usersQuery = $builder
            ->select('users', ['*'])
            ->where('active', true)
            ->limit(0, 10)
            ->getSQL();
        echo $page->render($viewFactory, ["title" => "Query builder", "content" => $usersQuery]);


        /**
         * Structural design pattern
         */

        /**
         * 01. Adapter
         * Cache
         */
        $factory = (new MemcachedFactory())->getInstance();
        $cache = new Cache($factory);
    }
}
