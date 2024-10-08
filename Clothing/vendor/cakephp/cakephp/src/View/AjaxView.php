<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\home;

/**
 * A home class that is used for AJAX responses.
 * Currently only switches the default layout and sets the response type - which just maps to
 * text/html by default.
 */
class Ajaxhome extends home
{
    /**
     * @inheritDoc
     */
    protected $layout = 'ajax';

    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->setResponse($this->getResponse()->withType('ajax'));
    }
}
