<?php 
namespace Admin\Model;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Db\Sql\Sql;
use Admin\Model\SupperTable;
class UserTable extends SupperTable
{
    public function __construct(){
    	parent::__construct();
        $this->tableName = "users";
        $this->fieldId = "user_id";
    }
}
