<?php
namespace Fgsl\Mock\Db\Adapter\Driver;
use Laminas\Db\Adapter\Driver\ConnectionInterface;
use Laminas\Db\Adapter\Driver\DriverInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\Adapter\Driver\StatementInterface;
use Fgsl\Mock\Db\Adapter\Driver\Connection\Mock as MockConnection;
use Fgsl\Mock\Db\Adapter\Driver\Statement\Mock as MockStatement;
/**
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br> 
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright FGSL 2018 (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements DriverInterface
{
	/**
	 * Get database platform name
	 *
	 * @param string $nameFormat
	 * @return string
	 */
	public function getDatabasePlatformName($nameFormat = self::NAME_FORMAT_CAMELCASE)
	{
		return __CLASS__;
	}

	/**
	 * Check environment
	 *
	 * @return bool
	*/
	public function checkEnvironment()
	{
		return true;
	}

	/**
	 * Get connection
	 *
	 * @return ConnectionInterface
	*/
	public function getConnection()
	{
		return new MockConnection();
	}

	/**
	 * Create statement
	 *
	 * @param string|resource $sqlOrResource
	 * @return StatementInterface
	*/
	public function createStatement($sqlOrResource = null)
	{
		return new MockStatement();
	}

	/**
	 * Create result
	 *
	 * @param resource $resource
	 * @return ResultInterface
	*/
	public function createResult($resource)
	{

	}
	
	/**
	 * Get prepare type
	 *
	 * @return string
	*/
	public function getPrepareType()
	{
		return "";
	}

	/**
	 * Format parameter name
	 *
	 * @param string $name
	 * @param mixed  $type
	 * @return string
	*/
	public function formatParameterName($name, $type = null)
	{
		return $name;
	}

	/**
	 * Get last generated value
	 *
	 * @return mixed
	*/
	public function getLastGeneratedValue()
	{
		return (string) rand(0,255);
	}
}