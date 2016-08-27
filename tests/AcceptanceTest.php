<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Auth;

use App\Patient;

class AcceptanceTest extends TestCase
{
    use DatabaseTransactions;
  
    public function test_if_operator_crud_is_secured()
    {
        $this->visit('/users')  
             ->see('login')
             ->visit('/users/create')  
             ->see('login')
             ->visit('/users/1')  
             ->see('login')
             ->visit('/users/1/edit')  
             ->see('login');
    }

    public function test_if_patient_crud_is_secured()
    {
        $patient = factory(App\Patient::class)->create();

        $this->visit('/patients')  
             ->see('login')
             ->visit('/patients/create')  
             ->see('login')
             ->visit('/patients/' . $patient->id)  
             ->see('login')
             ->visit('/users/' . $patient->id . '/edit')  
             ->see('login');
    }

    public function test_if_report_crud_is_secured()
    {
        $this->visit('/reports')  
             ->see('login');
    }
}
