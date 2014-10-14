<?php

global $project;
$project = 'mysite';


require_once('conf/ConfigureFromEnv.php');

// Set the site locale
i18n::set_locale('en_US');
Config::inst()->update('HtmlEditorField', 'use_gzip', false);