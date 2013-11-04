<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
    Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Mallow Soft',
    'defaultController' => 'site/login',


	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.bootstrap.widgets.*',
//        'application.modules.rights.*',
//        'application.modules.rights.components.*',
        'application.components.ERowClass',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
             'generatorPaths'=>array(
                                     'bootstrap.gii',
                                     ),
        ),
//                     'rights'=>array(
//                                     'userClass'=>'usertable',
//                                     'superuserName'=>'Admin',
//                                     'authenticatedName'=>'Authenticated',
//                                     'userIdColumn'=>'id',
//                                     // Name of the role with super user privileges. // Name of the authenticated user role.
//                                     // Name of the user id column in the database.
//                                     'userNameColumn'=>'username',
//                                     'install'=>true,
//                                     // Allows super users access implicitly.
//                                     // Provides support authorization item sorting.
//                                     // Enables the installer.
//                                     ),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
//            'class'=>'RWebUser',
		),
//        'authManager'=>array(
//                             'class'=>'RDbAuthManager',
//                             'assignmentTable' => 'authassignment',
//                             'itemTable' => 'authitem',
//                             'itemChildTable' => 'authitemchild',
//                             'rightsTable' => 'rights',
//                             ),
    'bootstrap'=>array(
                       'class'=>'bootstrap.components.Bootstrap',
                       ),
    'localtime'=>array(
                       'class'=>'LocalTime',
                       ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
         */
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
        'db'=>array(
                    'connectionString' => 'pgsql:host=localhost;port=5432;dbname=mallowsoft',
                    'username' => 'postgres',
                    'password' => 'password',
                    'tablePrefix' => '',
                    ),
                        
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
                             ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
                      ),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/           
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'ldap' => array(
                        'host' => 'server.local',
                        'cn' => 'users', // such as "people" or "users"
                        'dc' => array('server','local'),
        ),
   ),
);
?>