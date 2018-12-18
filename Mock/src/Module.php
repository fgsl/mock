<?php
/**
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br> 
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright FGSL 2018 (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace Fgsl\Mock;

class Module
{
    const VERSION = '0.0.1';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
