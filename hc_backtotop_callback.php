<?php
defined('EMLOG_ROOT') || exit('access denied!');

function callback_init() {
    $plugin_storage = Storage::getInstance('hc_backtotop');
    $plugin_storage->setValue('backgroundcolor', '#007BFF');
    $plugin_storage->setValue('hovercolor', '#007BFF');
    $plugin_storage->setValue('name', '返回顶部');
}

function callback_rm() {
    $plugin_storage = Storage::getInstance('hc_backtotop');
	$plugin_storage->deleteAllName('YES');
}

function callback_up() {
    // do something
}
