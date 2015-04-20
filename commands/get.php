<?php

	$apps = [];
	foreach(glob('../public/apps/*/manifest.json') as $app)
	{
	    $apps[] = [
	        'manifest' => json_decode(file_get_contents($app)),
	        'install_time' => 0,
	        'path' => str_replace(['../public', '..', 'manifest.json'], '', $app)
	    ];
	}

	$wallpapers = [];
	foreach(glob('../public/images/*') as $wall)
	{
	    $wallpapers[] = [
	        'src' => str_replace(['../public', '..'], '', $wall)
	    ];
	}

	$windows = WindowQuery::create()
	        ->filterByUserId($from->user['id'])
	        ->find()->toArray();

	$windows = array_map(function($w){
	    return array_change_key_case($w, CASE_LOWER);
	}, $windows);

	$labels = LabelQuery::create()
	        ->filterByUserId($from->user['id'])
	        ->find()->toArray();

	$labels = array_map(function($l) use($apps){
	    $l = array_change_key_case($l, CASE_LOWER);
	    $l['app'] = $apps[$l['appid']];
	    return $l;
	}, $labels);


	        
	$config = [
	    'windows' => [
	        'active' => 0,
	        'list' => $windows
	    ],
	    'apps' => [
	        'list' => $apps
	    ],
	    'labels' => $labels,
	    'wallpapers' => $wallpapers,
	    'user' => $from->user,
	    'notify' => []
	];   

	$from->send(json_encode([
	            'callback' => $data->callback,
	            'status' => 'ok',
	            'data' => $config
	]));    