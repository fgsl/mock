<?php
namespace Fgsl\Mock\Db\TableGateway;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Select;
use Fgsl\Mock\Db\Result\Mock as MockResult;
/**
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright FGSL 2018 (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements TableGatewayInterface
{
    private $table;
    private $adapter;
    private $mockResultRows = [];
    
    public function __construct($table, $adapter)
    {
        $this->table = $table;
        $this->adapter = $adapter;
    }
    
    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
    
    /**
     * @param array | string | Where $where
     * @return \Fgsl\Mock\Db\Result\Mock
     */
    public function select($where = null)
    {
        return new MockResult($this->mockResultRows);
    }
    
    /**
     * @param array $set
     * @return number
     */
    public function insert($set)
    {
        return 1;
    }
    
    /**
     * @param array $set
     * @param array | string | Where $where
     * @return number
     */
    public function update($set, $where = null)
    {
        return 1;
    }
    
    /**
     * @param array | string | Where $where
     * @return number
     */
    public function delete($where)
    {
        return 1;
    }
    
    /**
     * @param Select $select
     * @return Iterator
     */
    public function selectWith(Select $select)
    {
        if (strpos($select->getSqlString($this->adapter->getPlatform()),'count(') !== false){
            $collection = new \ArrayObject();
            $row = (object) ['total'=>1];
            $collection->append($row);
            return $collection->getIterator();
        }
        return $this->select();
    }
    
    /**
     * @param array $rows
     */
    public function setMockResultRows(array $rows)
    {
        $this->mockResultRows = $rows;
    }
}