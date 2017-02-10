<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    public $organizations = [
      'name' => 'Executive Directorate',
      'code' => '1000',
      'type' => 'Executive',
      'departments' => [
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
                  'effective' => '06/06/2010',
                  'assignments' => [
                    [
                      'name' => 'Bruce Danly',
                      'type' => 'Current',
                      'effective' => '08/06/2110'
                    ]
                  ]
                ],
                [
                  'name' => 'Administrative Officer',
                  'type' => 'Administrative Officer',
                  'code' => '5300',
                  'level' => 'Division',
                  'effective' => '06/06/2010',
                  'assignments' => [
                    [
                      'name' => 'Bruce Wayne',
                      'type' => 'Acting',
                      'effective' => '06/06/2010'
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
                  'effective' => '06/06/2010',
                  'assignments' => [
                      [
                      'name' => 'John McLean',
                      'type' => 'Current',
                      'effective' => '06/06/2010'
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
            ],
            [
              'name' => 'Tactical Electronic Warfare',
              'code' => '5700',
              'type' => 'Division',
              'parent_tree' => '5000',
              'departments' => [
                [
                  'name' => 'EW Strategic Planning Organization',
                  'code' => '5701',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'Signature Technology Office',
                  'code' => '5708',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'Offboard Countermeasures',
                  'code' => '5710',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'Electronic Warfare Support Measures',
                  'code' => '5720',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'Aerospace Electronic Warfare Systems',
                  'code' => '5730',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'Surface Electronic Warfare Systems',
                  'code' => '5740',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'Advanced Techniques',
                  'code' => '5750',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'Integrated Electronic Warfare Simulation',
                  'code' => '5760',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
                ],
                [
                  'name' => 'EW Modeling/Simulation',
                  'code' => '5770',
                  'type' => 'Branch',
                  'parent_tree' => '5000/5700'
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
    ];


}
