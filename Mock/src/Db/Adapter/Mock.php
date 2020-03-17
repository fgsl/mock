<?php
namespace Fgsl\Mock\Db\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\DriverInterface;
use Laminas\Db\Adapter\Platform\PlatformInterface;
use Fgsl\Mock\Db\Adapter\Driver\Mock as MockDriver;
use Fgsl\Mock\Db\Platform\Mock as MockPlatform;
/**
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br> 
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright FGSL 2018 (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements AdapterInterface
{
	/**
	 * @return DriverInterface
	 */
	public function getDriver()
	{
		return new MockDriver();
	}
	
	/**
	 * @return PlatformInterface
	*/
	public function getPlatform()
	{
	   return new MockPlatform();
	}
}