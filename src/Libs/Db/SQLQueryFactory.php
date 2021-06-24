<?php

namespace Nin\Libs\Db;

interface SQLQueryFactory
{
    public function getSQLBuilder(): SQLQueryBuilder;
}
