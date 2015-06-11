<?php
Yii::setPathOfAlias('', $root);

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Content Management Systems',
    'preload' => array('log', 'bootstrap'),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.extensions.image.helpers.*',
    ),
    'aliases' => array(
        'xupload' => 'application.extensions.xupload'
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'landak',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', '192.168.1.90', '192.168.1.41'),
            'generatorPaths' => array(
                'application.extensions.giiplus'  //Ajax Crud template path
            ),
        ),
    ),
    // application components
    'components' => array(
        'landa' => array(
            'class' => 'LandaCore',
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=' . $db,
            'emulatePrepare' => true,
            'username' => $dbUser,
            'password' => $dbPwd,
            'tablePrefix' => '',
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true
        ),
        'user' => array(
            'loginUrl' => array('/site/login'),
            'allowAutoLogin' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'dashboard' => '/site',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
            'urlSuffix' => '.html',
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'application.extensions.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array('127.0.0.1', '192.168.1.90'),
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
//                    'filter' => 'CLogFilter',
                ),
            ),
        ),
        'bootstrap' => array(
            'class' => 'application.extensions.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
            'fontAwesomeCss' => true,
        ),
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            'params' => array('directory' => '/opt/local/bin'),
        ),
        'themeManager' => array(
            'basePath' => $root . 'themes/backend/',
            'baseUrl' => $themesUrl . 'backend/', //this is the important part, setup a subdomain just for your common dir
        ),
        'cache' => array(
            //'class'=>'system.caching.CMemCache',
            'class' => 'system.caching.CFileCache'
        ),
    ),
    
    'params' => array(
		'appVersion' => 'v.1', 
                'client' => $client, 
                'clientName' => $clientName, 
                'urlImg' => $rootUrl . 'images/', 
                'pathImg' => (isset($pathImg)) ? $pathImg : $root . '/www/' . $client . '/images/',
    ),
);

?>
