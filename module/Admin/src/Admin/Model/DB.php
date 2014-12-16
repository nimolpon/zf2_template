<?php

namespace Admin\Model;


use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;

class DB {
    public function __construct(){}

    /*
     * for execute sql statement
     * @return buffer of resultset
     * static function, mean user could call this function without create new object
     */
    public static function executeQuery(Sql $db, $query){
        $statement = $db->prepareStatementForSqlObject($query);
        $rs = new ResultSet();
        return $rs->initialize($statement->execute())->buffer();
    }

    public static function executeNoneQuery(Sql $db, $noneQuery){
        return $db->prepareStatementForSqlObject($noneQuery)->execute();
    }
} 