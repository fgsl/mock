<?php
namespace Fgsl\Mock\Db\Adapter\Driver\Statement;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Adapter\Driver\StatementInterface;
use Fgsl\Mock\Db\Result\Mock as MockResult;
use Zend\Db\Adapter\ParameterContainer;
/**
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br> 
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright FGSL 2018 (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements StatementInterface
{
	private $sql;
	private $parameterContainer;
	
	/**
	 * Get resource
	 *
	 * @return resource
	 */
	public function getResource()
	{
		return null;
	}

	/**
	 * Prepare sql
	 *
	 * @param string $sql
	*/
	public function prepare($sql = null)
	{
		
	}

	/**
	 * Check if is prepared
	 *
	 * @return bool
	*/
	public function isPrepared()
	{
		return true;
	}

	/**
	 * Execute
	 *
	 * @param null|array|ParameterContainer $parameters
	 * @return ResultInterface
	*/
	public function execute($parameters = null)
	{
        return new MockResult();
	}

	/**
	 * Set sql
	 *
	 * @param $sql
	 * @return mixed
	 */
	public function setSql($sql)
	{
		$this->sql = $sql;
		return $this;
	}
	
	/**
	 * Get sql
	 *
	 * @return mixed
	*/
	public function getSql()
	{
		return $this->sql;
	}
	
	/**
	 * Set parameter container
	 *
	 * @param ParameterContainer $parameterContainer
	 * @return mixed
	*/
	public function setParameterContainer(ParameterContainer $parameterContainer)
	{
		$this->parameterContainer = $parameterContainer;
	}
	
	/**
	 * Get parameter container
	 *
	 * @return mixed
	*/
	public function getParameterContainer()
	{
		return $this->parameterContainer;
	}
}