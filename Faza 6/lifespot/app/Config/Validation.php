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
        
            'username'   => [ //is_unique
                    'rules' => 'required',
                    'errors' =>[
                        'required' => 'Your username is required  !', 
                    ]
            ],

            'newpassword'  => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your password is required  !'
                    ]
            ],

            'pass_confirm' =>[
                    'rules' => 'required|matches[newpassword]',
                    'errors' =>[
                        'required' => 'Your password confirmation is required  !',
                        'matches' => 'Your password must match'
                    ]
            ],

            'birth_date' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your birth date is required  !'
                    ]
            ],
        
            'email'      => [
                    'rules' =>'required|valid_email',
                    'errors' =>[
                            'required' => 'Your mail is required !',
                            'valid_email' => 'Your mail is not gud !'
                    ]
                ],

           ];

	public $login= [
            'username'       => [
                    'label' => 'Name',
                    'rules' =>'required',
                    'errors' =>[
                            'required' => 'Your name is required !'
                    ]
            ],
            'password'      => [
                    'label' => 'Mail',
                    'rules' =>'required',
                    'errors' =>[
                            'required' => 'Your mail is required !',
                    ]
                ],

           ];
        
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	
}
