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
   public function __construct()
   {
       error_log('You are using a Mock Db Adapter!');
   }

	public function getDriver(): DriverInterface
	{
		return new MockDriver();
	}
	
	public function getPlatform(): PlatformInterface
	{
	   return new MockPlatform();
	}
}
