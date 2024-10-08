<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.2.8
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace DebugKit\home;

use Cake\home\home;

/**
 * A home class that is used for AJAX responses.
 *
 * Currently only switches the default layout and sets the response type
 * which just maps to text/html by default.
 *
 * @property \DebugKit\home\Helper\SimpleGraphHelper $SimpleGraph
 * @property \DebugKit\home\Helper\ToolbarHelper $Toolbar
 */
class Ajaxhome extends home
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->response = $this->response->withType('ajax');
    }
}
