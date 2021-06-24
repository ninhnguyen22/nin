<?php

namespace Nin\Libs\Db;

class MySQLQueryFactory implements SQLQueryFactory
{
    public function getSQLBuilder(): SQLQueryBuilder
    {
        return new MySQLQueryBuilder();
    }
}
