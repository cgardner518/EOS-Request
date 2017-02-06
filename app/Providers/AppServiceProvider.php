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
            'name' => 'Executive Directorate',
            'code' => '1000',
            'type' => 'Executive',
            'departments' => [
              [
                'name' => 'Business Operations',
                'code' => '3000',
                'type' => 'Directorate',
                'departments' => [
                  [
                    'name' => 'Office of Small Business',
                    'code' => '3005',
                    'type' => 'Division',
                    'parent_tree' => '3000'
                  ],
                  [
                    'name' => 'Management Information Systems',
                    'code' => '3030',
                    'type' => 'Division',
                    'parent_tree' => '3000'
                  ],
                  [
                    'name' => 'Contracting',
                    'code' => '3200',
                    'type' => 'Division',
                    'parent_tree' => '3000',
                    'departments' => [
                      [
                        'name' => 'Contracting 1',
                        'code' => '3220',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3200'
                      ],
                      [
                        'name' => 'Contracting 2',
                        'code' => '3230',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3200'
                      ]
                    ]
                  ],
                  [
                    'name' => 'Financial Management Division',
                    'code' => '3300',
                    'type' => 'Division',
                    'parent_tree' => '3000',
                    'departments' => [
                      [
                        'name' => 'Budget & Funds Management',
                        'code' => '3310',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3300'
                      ],
                      [
                        'name' => 'Financial Systems, Reports & Accounting',
                        'code' => '3350',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3300'
                      ]
                    ]
                  ],
                  [
                    'name' => 'Supply',
                    'code' => '3400',
                    'type' => 'Division',
                    'parent_tree' => '3000',
                    'departments' => [
                      [
                        'name' => 'Perchasing',
                        'code' => '3410',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ],
                      [
                        'name' => 'Technical Information Services',
                        'code' => '3430',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ],
                      [
                        'name' => 'Customer Support & Program Management',
                        'code' => '3440',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ],
                      [
                        'name' => 'Material Control',
                        'code' => '3450',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ],
                      [
                        'name' => 'Administrative Services',
                        'code' => '3460',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ],
                      [
                        'name' => 'Automated Inventory Management',
                        'code' => '3470',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ],
                      [
                        'name' => 'Disposal & Storage',
                        'code' => '3480',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ],
                      [
                        'name' => 'Store Material Issues',
                        'code' => '3490',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3400'
                      ]
                    ]
                  ],
                  [
                    'name' => 'Research & Development Services',
                    'code' => '3500',
                    'type' => 'Division',
                    'parent_tree' => '3000',
                    'departments' => [
                      [
                        'name' => 'Technical/Support Services',
                        'code' => '3520',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3500'
                      ],
                      [
                        'name' => 'Operations',
                        'code' => '3524',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3500'
                      ],
                      [
                        'name' => 'Safety',
                        'code' => '3540',
                        'type' => 'Branch',
                        'parent_tree' => '3000/3500'
                      ]
                    ]
                  ]
                ]
              ],
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
                        ]
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
                  ],
                  [
                    'name' => 'Optical Sciences',
                    'code' => '5600',
                    'type' => 'Division',
                    'parent_tree' => '5000',
                    'departments' => [
                      [
                        'name' => 'Optical Physics',
                        'code' => '5610',
                        'type' => 'Branch',
                        'parent_tree' => '5000/5600'
                      ],
                      [
                        'name' => 'Optical Materials and Devices',
                        'code' => '5620',
                        'type' => 'Branch',
                        'parent_tree' => '5000/5600'
                      ],
                      [
                        'name' => 'Photonics Technology',
                        'code' => '5650',
                        'type' => 'Branch',
                        'parent_tree' => '5000/5600'
                      ],
                      [
                        'name' => 'Applied Optics',
                        'code' => '5660',
                        'type' => 'Branch',
                        'parent_tree' => '5000/5600'
                      ],
                      [
                        'name' => 'Optical Techniques',
                        'code' => '5670',
                        'type' => 'Branch',
                        'parent_tree' => '5000/5600'
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
                    'parent_tree' => '6000',
                    'departments' => [
                        [
                          'name' => 'Laboratory for Propulsion, Energetic, and Dynamic Systems',
                          'code' => '6041',
                          'type' => 'Branch',
                          'parent_tree' => '6000/6040',
                        ],
                        [
                          'name' => 'Laboratory for Advanced Computational Physics',
                          'code' => '6042',
                          'type' => 'Branch',
                          'parent_tree' => '6000/6040',
                        ],
                        [
                          'name' => 'Laboratory for Multiscale Reactive Flow Physics',
                          'code' => '6043',
                          'type' => 'Branch',
                          'parent_tree' => '6000/6040',
                        ]
                      ]
                  ],
                  [
                    'name' => 'Chemistry',
                    'code' => '6100',
                    'type' => 'Division',
                    'parent_tree' => '6000',
                    'departments' => [
                      [
                        'name' => 'Chemical Dynamics & Diagnostics',
                        'code' => '6110',
                        'type' => 'Branch',
                        'parent_tree' => '6000/6100',
                      ],
                      [
                        'name' => 'Materials Chemistry',
                        'code' => '6120',
                        'type' => 'Branch',
                        'parent_tree' => '6000/6100',
                      ],
                      [
                        'name' => 'Center for Corrosion Science & Engineering',
                        'code' => '6130',
                        'type' => 'Branch',
                        'parent_tree' => '6000/6100',
                      ],
                      [
                        'name' => 'Surface Chemistry',
                        'code' => '6170',
                        'type' => 'Branch',
                        'parent_tree' => '6000/6100',
                      ],
                      [
                        'name' => 'Navy Technical Center For Safety & Survivability',
                        'code' => '6180',
                        'type' => 'Branch',
                        'parent_tree' => '6000/6100',
                      ]
                    ]
                  ]
                ]
              ],
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
