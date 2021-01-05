<?php
/**
 * Created by PhpStorm.
 * User: sogubaby
 * Date: 2021/1/5
 * Time: 下午1:59
 */

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

if (!function_exists('success')) {
    /**
     * Description: 统一响应成功方法
     * Author: WangSx
     * DateTime: 2019-10-31 10:48
     * @param array $data
     * @param string $message
     * @param int $status_code
     * @return array|JsonResponse|int|string
     */
    function success($data = [], $message = '请求成功!', $status_code = 200)
    {
        $time = time();
        if ($data instanceof JsonResponse) {
            return $data;
        }
        if ($message instanceof JsonResponse) {
            return $message;
        }
        if ($status_code instanceof JsonResponse) {
            return $status_code;
        }
        empty($data) && $data = [];

        return Response::json(compact('status_code', 'time', 'message', 'data'));
    }
}

if (!function_exists('failed')) {
    /**
     * Description: 统一错误返回方法
     * Author: WangSx
     * DateTime: 2019-10-31 11:07
     * @param string $message
     * @param array $data
     * @param int $status_code
     * @param int $code
     * @return array|JsonResponse|int|string
     */
    function failed($message = '请求失败!~', $data = [], $status_code = 400, $code = 200)
    {
        $time = time();
        if ($message instanceof JsonResponse) {
            return $message;
        }

        if ($data instanceof JsonResponse) {
            return $data;
        }

        if ($status_code instanceof JsonResponse) {
            return $status_code;
        }

        return Response::json(compact('status_code', 'time', 'message', 'data'), $code);
    }
}