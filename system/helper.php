<?php
/**
 *  进入模块 Module
 * @param $action   site/post     site:控制器    post:执行动作
 * @param string $module 模块名称
 * @param array $params module下面的功能名称 :button
 * @http_build_query 数组生成一个经过 URL-encode 的请求字符串
 */
function site_url($action, $module = '', $params = [])
{
    $module = $module ?: v('module.name');
    //地址栏: site/post&t=site&m=button
    $params = http_build_query($params);
    //将admin/
    return __ROOT__ . "/?s=admin/module/entry&a={$action}&t=admin&m=$module&" . $params;
}