<?php

//exit;
// 1. 读取配置文件时候，可以每次都重复加载配置文件，生产上线时改为false，只在编译时候执行一次
define('APP_DEBUG', TRUE);
define('APP_NAME', 'App');
define('APP_PATH', './App/');
// 1. 加载ThinkPHP.php
require_once('./ThinkPHP/ThinkPHP.php');
// 2. 加载核心文件 \ThinkPHP\Lib\Core
// 3. 加载项目文件 分析url 调用相关控制器



