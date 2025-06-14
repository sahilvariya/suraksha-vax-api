<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;

class Vaccines extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();

        $crud->setTable('vaccines_master');
        $crud->setSubject('Vaccine');

        // Column Labels
        $crud->displayAs('vaccine_name', 'Vaccine Name');
        $crud->displayAs('dose_number', 'Dose #');
        $crud->displayAs('recommended_age_weeks', 'Recommended Age (weeks)');
        $crud->displayAs('created_at', 'Created At');

        // Field Settings
        $crud->fields(['vaccine_name', 'dose_number', 'recommended_age_weeks', 'description']);
        $crud->requiredFields(['vaccine_name', 'dose_number', 'recommended_age_weeks']);
        $crud->unsetRead(); // Optional: Hide detailed read view
        $crud->unsetPrint();
        $crud->unsetExport();

        // Render and return the output
        $output = $crud->render();

        return $this->_exampleOutput($output);
    }

    private function _exampleOutput($output = null)
    {
        return view('admin/crud_view', (array)$output);
    }
}
