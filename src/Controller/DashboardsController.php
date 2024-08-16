<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

use Cake\Core\Configure;

class DashboardsController extends AppController
{
    public function view()
    {
        // Load the models
        $this->loadModel('Foldings');
        $this->loadModel('Lengths');
        $this->loadModel('Mtrperrolls');
        $this->loadModel('Designs');

        // Fetch data from the Foldings table
        $foldings = $this->Foldings->find('all')->toArray();

        // Initialize arrays for data
        $lengths = [];
        $designNames = [];
        $calculatedResults = [];

        // Loop through each folding record
        foreach ($foldings as $folding) {
            $lengthId = $folding->length_id;
            $mtrperrollId = $folding->mtrperroll_id;

            // Fetch Length and Mtrperroll values
            $length = $this->Lengths->find('all')
                ->where(['Lengths.id' => $lengthId])
                ->select('L')
                ->first();
            
            $mtrperroll = $this->Mtrperrolls->find('all')
                ->where(['Mtrperrolls.id' => $mtrperrollId])
                ->select('number')
                ->first();
            
            // Calculate result
            if ($length && $mtrperroll) {
                $lengthValue = (int)$length->L;
                $mtrperrollValue = (int)$mtrperroll->number;
                $totalRolls = (int)$folding->total_rolls;
                $calculatedValue = $mtrperrollValue * $lengthValue/100 * $totalRolls;
                $Designsdata = $this->Designs->find('all')
                ->where(['Designs.id' => $folding->design_id])
                ->select('name')
                ->first();
                // Store values
                $lengths[] = $lengthValue;
                $designNames[] = $Designsdata['name'];  // Assuming 'design_name' is a field in the Foldings table
                $calculatedResults[] = $calculatedValue;
            }
        }

        // Pass the data to the view
        $chartOptions = [
            'responsive' => true,
            'maintainAspectRatio' => false
        ];

        // Load the Designs model
        $designs = $this->Designs->find('all')->toArray();
        $designsValue = [];
        foreach ($designs as $design) {
            $designsValue[] = $design->name;
        }

        // Set the variables to the view
        $this->set(compact('lengths', 'designNames', 'calculatedResults', 'chartOptions', 'designsValue'));
    }
}
