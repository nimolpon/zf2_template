<?php 
namespace Admin\Model;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
class SupperTable extends TableGateway
{
    public $db;
    public $adapter;
    public $tableName = "";
    public $fieldId ="";
    public function __construct($adapter=null){
        if($adapter==null){
            $adapter = GlobalAdapterFeature::getStaticAdapter();
        }
        $this->adapter = $adapter;
        $this->db = new Sql($adapter);
    }

    /*
     * execute sql statement
     * @return buffer of data
     */
    public function executeQuery($sql){
        return DB::executeQuery($this->db, $sql);
    }

    /*
     * execute sql statement
     */
    public function executeNoneQuery($sql){
        return DB::executeNoneQuery($this->db,$sql);
    }

    /*
     * get list of table
     */
    public function getList($id=null){
        $sql = $this->db->select($this->tableName);
        if($id!=null) $sql->where($this->fieldId."=".$id);
        return DB::executeQuery($this->db,$sql)->toArray();
    }

    /*
     * update list by id
     */
    public function updateList($values,$id){
        $sql = $this->db->update($this->tableName)->set($values)->where($this->fieldId."=".$id);
        return DB::executeNoneQuery($this->db,$sql);
    }

    /*
     * delete list by id
     */
    public function deleteList($id){
        $sql = $this->db->delete($this->tableName)->where($this->fieldId."=".$id);
        return DB::executeNoneQuery($this->db,$sql);
    }
}