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

	public function __construct($table, $adapter)
	{
		$this->table = $table;
		$this->adapter = $adapter;
	}

	public function getTable()
	{
		return $this->table;
	}

	public function select($where = null)
	{
		return new MockResult();
	}

	public function insert($set)
	{
	   return 1;
	}

	public function update($set, $where = null)
	{
		return 1;
	}

	public function delete($where)
	{
		return 1;
	}
	
	public function selectWith(Select $select)
	{		
		$collection = new \ArrayObject();
		$row = (object) ['total'=>1];
		$collection->append($row);
		return $collection->getIterator();
	}
}