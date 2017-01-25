<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share('organizations', [
         [
           'name' => 'Systems',
           'code' => '5000',
           'type' => 'Directorate',
           'departments' => [
             [
               'name' => 'Radar',
               'code' => '5300',
               'type' => 'Division',
               'parent_tree' => '5000',
               'roles' => [
                 [
                   'name' => 'Superintendent',
                   'type' => 'Superintendent',
                   'code' => '5300',
                   'level' => 'Division',
                   'effective' => date('m/d/Y'),
                   'assignments' => [
                     [
                       'name' => 'Bruce Danly',
                       'type' => 'Current',
                       'effective' => date('m/d/Y')
                     ],
                     [
                       'name' => 'Bruce Wayne',
                       'type' => 'Acting',
                       'effective' => date('m/d/Y')
                     ]
                   ]
                 ],
                 [
                   'name' => 'Administrative Officer',
                   'type' => 'Administrative Officer',
                   'code' => '5300',
                   'level' => 'Division',
                   'effective' => date('m/d/Y'),
                   'assignments' => [
                     [
                       'name' => 'Druce Banly',
                       'type' => 'Current',
                       'effective' => date('m/d/Y')
                     ],
                     [
                       'name' => 'Wuce Brayne',
                       'type' => 'Acting',
                       'effective' => date('m/d/Y')
                     ]
                   ]
                 ]
               ],
               'departments' => [
                 [
                   'name' => 'Analysis',
                   'code' => '5310',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5300'
                 ],
                 [
                   'name' => 'Advanced Radar Systems',
                   'code' => '5320',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5300'
                 ],
                 [
                   'name' => 'Surveillance Technology',
                   'code' => '5340',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5300'
                 ],
               ]
             ],
             [
               'name' => 'Information Technology',
               'code' => '5500',
               'type' => 'Division',
               'parent_tree' => '5000',
               'roles' => [
                 [
                   'name' => 'Superintendent',
                   'type' => 'Superintendent',
                   'code' => '5500',
                   'level' => 'Division',
                   'effective' => date('m/d/Y'),
                   'assignments' => [
                     [
                       'name' => 'John McLean',
                       'type' => 'Current',
                       'effective' => date('m/d/Y')
                     ]
                   ]
                 ]
               ],
               'departments' => [
                 [
                   'name' => 'Free Space Photonics Communications Office',
                   'code' => '5505',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5500'
                 ],
                 [
                   'name' => 'Navy Center for Applied Research In Artificial Intelligence',
                   'code' => '5510',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5500'
                 ],
                 [
                   'name' => 'Networks and Communication Systems',
                   'code' => '5520',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5500'
                 ],
                 [
                   'name' => 'Center For High Assurance Computer Systems',
                   'code' => '5540',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5500'
                 ],
                 [
                   'name' => 'Transmission Technology',
                   'code' => '5550',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5500'
                 ],
                 [
                   'name' => 'Information Management and Decision Architectures',
                   'code' => '5580',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5500'
                 ],
                 [
                   'name' => 'Center For Computational Science',
                   'code' => '5590',
                   'type' => 'Branch',
                   'parent_tree' => '5000/5500',
                   'departments' => [
                     [
                     'name' => 'Research Networks',
                     'code' => '5591',
                     'type' => 'Section',
                     'parent_tree' => '5000/5500/5590'
                     ],
                     [
                     'name' => 'Operational Networks',
                     'code' => '5592',
                     'type' => 'Section',
                     'parent_tree' => '5000/5500/5590'
                     ],
                     [
                     'name' => 'HPC Support',
                     'code' => '5594',
                     'type' => 'Section',
                     'parent_tree' => '5000/5500/5590'
                     ],
                     [
                     'name' => 'Web Applications & Systems Support',
                     'code' => '5595',
                     'type' => 'Section',
                     'parent_tree' => '5000/5500/5590'
                     ],
                     [
                     'name' => 'Ruth H. Hooker Research Library',
                     'code' => '5596',
                     'type' => 'Section',
                     'parent_tree' => '5000/5500/5590'
                     ]
                   ]
                 ],
               ]
             ]
           ]
         ],
         [
         'name' => 'Materials Science & Component Technology',
         'code' => '6000',
         'type' => 'Directorate',
         'departments' => [
           [
           'name' => 'Laboratory for Computational Physics & Fluid Dynamics',
           'code' => '6040',
           'type' => 'Division',
           'departments' => [
               [
                 'name' => 'Laboratory for Propulsion, Energetic, and Dynamic Systems',
                 'code' => '6041',
                 'type' => 'Branch'
               ],
               [
                 'name' => 'Laboratory for Advanced Computational Physics',
                 'code' => '6042',
                 'type' => 'Branch'
               ],
               [
                 'name' => 'Laboratory for Multiscale Reactive Flow Physics',
                 'code' => '6043',
                 'type' => 'Branch'
               ]
             ]
           ],
           [
             'name' => 'Chemistry',
             'code' => '6100',
             'type' => 'Division',
             'departments' => [
               [
                 'name' => 'Chemical Dynamics & Diagnostics',
                 'code' => '6110',
                 'type' => 'Branch'
               ],
               [
                 'name' => 'Materials Chemistry',
                 'code' => '6120',
                 'type' => 'Branch'
               ],
               [
                 'name' => 'Center for Corrosion Science & Engineering',
                 'code' => '6130',
                 'type' => 'Branch'
               ],
               [
                 'name' => 'Surface Chemistry',
                 'code' => '6170',
                 'type' => 'Branch'
               ],
               [
                 'name' => 'Navy Technical Center For Safety & Survivability',
                 'code' => '6180',
                 'type' => 'Branch'
               ]
             ]
           ]
         ]
         ]
       ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
