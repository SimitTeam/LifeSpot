<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	public $signup= [
            'name'       => [
                    'label' => 'Name',
                    'rules' =>'required',
                    'errors' =>[
                            'requried' => 'Your name is required !'
                    ]
            ],
            'email'      => [
                    'label' => 'Mail',
                    'rules' =>'required|valid_email',
                    'errors' =>[
                            'requried' => 'Your mail is required !',
                            'valid_email' => 'Your mail is not gud !'
                    ]
                ],

           ];

	public $login= [
            'username'       => [
                    'label' => 'Name',
                    'rules' =>'required',
                    'errors' =>[
                            'requried' => 'Your name is required !'
                    ]
            ],
            'password'      => [
                    'label' => 'Mail',
                    'rules' =>'required',
                    'errors' =>[
                            'requried' => 'Your mail is required !',
                    ]
                ],

           ];
        
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
