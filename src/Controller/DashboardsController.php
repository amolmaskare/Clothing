<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

use Cake\Core\Configure;

/**
 * Addstudents Controller
 *
 * // * @property \App\Model\Table\AddstudentsTable $Addstudents
 * // * @method \App\Model\Entity\Addstudent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public  function view()
    {

        //  $typeId = $this->getTypeId();
        //  if ($typeId == '2') {
        //      $redirect = $this->request->getQuery('redirect', [
        //          'controller' => 'Users',
        //          'action' => 'userList',
        //      ]);
        //  return $this->redirect($redirect);
        // }

        $this->loadModel('Lengths');
        $lengths = $this->Lengths->find('all')->toArray();

        $lValues = [];
        foreach ($lengths as $length) {
            $lValues[] = (int)$length->L; // Convert 'L' values to integers
        }

        $Length = $lValues;
        $chartOptions = [
            'responsive' => true,
            'maintainAspectRatio' => false
        ];

        $this->loadModel('Designs');
        $designs = $this->Designs->find('all')->toArray();
        // debug($designs);
        $designsValue = [];
        foreach ($designs as $design) {
            $designsValue[] = $design->name; // Convert 'L' values to integers
        }
        // debug($designsValue);
        // die();



        $this->set(compact('Length', 'chartOptions', 'designsValue'));
    }
}
