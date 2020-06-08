<?php namespace Config;

class Validation
{
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	public $signup= [
            'name'       => [
                    'rules' =>'required',
                    'errors' =>[
                        'required' => 'Your name is required !'
                    ]
            ],
            'surname'    => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your surname is required !'
                    ]
            ],
        
            'newusername'   => [ //is_unique
                    'rules' => 'required|is_unique[user.username]',
                    'errors' =>[
                        'required' => 'Your username is required  !', 
                        'is_unique' => 'Username already exists'
                    ]
            ],

            'newpassword'  => [
                    'rules' => 'required|min_length[3]',
                    'errors' => [
                        'required' => 'Your password is required  !',
                        'min_length' => "Password must be at least 3 chars long"
                    ]
            ],

            'cpassword' =>[
                    'rules' => 'required|matches[newpassword]',
                    'errors' =>[
                        'required' => 'Your password confirmation is required  !',
                        'matches' => 'Your password must match'
                    ]
            ],

            'date' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your birth date is required  !'
                    ]
            ],
        
            'email'      => [
                    'rules' =>'required|valid_email|is_unique[user.mail]',
                    'errors' =>[
                            'required' => 'Your mail is required !',
                            'valid_email' => 'Your mail is not gud !',
                            'is_unique' => 'Email already exists'
                    ]
                ],

           ];

	public $login= [
            'username'       => [
                    'label' => 'Name',
                    'rules' =>'required',
                    'errors' =>[
                            'required' => 'Your username is required !'
                    ]
            ],
            'password'      => [
                    'rules' =>'required',
                    'errors' =>[
                            'required' => 'Your password is required !',
                    ]
                ],

           ];
        
        public $marker= [
            'search_species'       => [
                    'rules' =>'required|is_not_unique[species.species_name]',
                    'errors' =>[
                        'required' => 'Species is required !',
                        'is_not_unique' => 'Species does not exist'
                        
                    ]
            ],
            'date'    => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Date is required !'
                    ]
            ],
        
            'lon'  => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your password is required  !'
                    ]
            ],

            'lat' =>[
                    'rules' => 'required',
                    'errors' =>[
                    ]
            ],
        
            'text'      => [
                    'rules' =>'max_length[500]',
                    'errors' =>[
                            'max_length' => 'Max text lengt is 500 characters !',
                    ]
                ],
            

           ];
        
        
        public $species= [
            'species_name'       => [
                    'rules' =>'required|is_unique[species.species_name]',
                    'errors' =>[
                            'required' => 'Species name is required !',
                            'is_unique' => 'Species name already exists'
                    ]
            ],
            'imgs'  =>[
                'rules' => 'uploaded[imgs]|is_image[imgs]',
                'errors' => [
                    'uploaded' =>'No file uploaded',
                    'is_image' => 'File has to be image'
                ]
            ]
           ];
        
        public $synonym= [
            'search_species'       => [
                    'rules' =>'required|is_not_unique[species.species_name]',
                    'errors' =>[
                            'required' => 'Species name is required !',
                            'is_not_unique' => 'Species name does not exist'
                    ]
            ],
            'synonym_name'      => [
                    'rules' =>'required',
                    'errors' =>[
                            'required' => 'Synonym is required !',
                    ]
                ],

           ];
        
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	
}
