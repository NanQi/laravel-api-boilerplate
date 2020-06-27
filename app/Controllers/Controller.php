<?php


namespace App\Controllers;


use NanQi\Hope\Controllers\BaseController;

/**
 * @OA\Info(
 *     title="API文档",
 *     version="1.0.0",
 *     description="这是API接口文档，只在开发和测试环境部署，请勿公开此地址",
 * )
 */
/**
 * @OA\Server(
 *     description="开发环境",
 *     url="http://api.test/"
 * )
 * @OA\Server(
 *     description="测试环境",
 *     url="http://test-api.youyag.com/"
 * )
 * @OA\Server(
 *     description="生产环境",
 *     url="http://php-api.youyag.com/"
 * )
 * @OA\ExternalDocumentation(
 *     description="项目开发规范",
 *     url="http://php-api.youyag.com/doc"
 * )
 */
class Controller extends BaseController
{

}
