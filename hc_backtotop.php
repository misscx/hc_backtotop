<?php
/*
Plugin Name: 返回顶部
Version: 1.0.0
Plugin URL: https://www.emlog.net
Description: 返回顶部插件。
Author: 寒川
Author URL: https://www.emlog.net
*/

defined('EMLOG_ROOT') || exit('access denied!');

function button(){
$plugin_storage = Storage::getInstance('hc_backtotop');
$name =   $plugin_storage->getValue('name');
echo <<<html
<button id="scrollToTopBtn" onclick="scrollToTop()">{$name}</button>
<script>
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.style.display = 'block';
        } else {
            scrollToTopBtn.style.display = 'none';
        }
    });

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>
html;
}

addAction('index_footer','button');

function back_to_top_css(){
$plugin_storage = Storage::getInstance('hc_backtotop');
$backgroundcolor =   $plugin_storage->getValue('backgroundcolor');
$hovercolor =   $plugin_storage->getValue('hovercolor');
echo <<<css
<style>
#scrollToTopBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: {$backgroundcolor};
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

#scrollToTopBtn:hover {
    background-color: {$hovercolor};
}
</style>
css;

}
addAction('index_head','back_to_top_css');