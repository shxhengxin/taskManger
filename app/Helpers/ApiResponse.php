<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/24 0024
 * Time: 下午 9:44
 */

namespace App\Helpers;


trait ApiResponse
{
    protected $statusCode = 200;
    protected $responseCode = 0;

    /**
     * 获取http响应码
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;

    }

    /**
     * 设置http响应码
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * 获取返回code码
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;

    }

    /**
     * 设置返回code码
     * @param $responseCode
     * @return $this
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;

        return $this;
    }

    /**
     * 手动返回api 404响应
     * @param string $message
     * @return mixed
     */
    public function responseNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->responseError($message);
    }

    /**
     * 返回错误信息
     *
     * @param $message
     * @return mixed
     */
    public function responseError($message)
    {
        return $this->response([
            'code' => $this->getResponseCode(),
            'message' => $message
        ]);
    }

    /**
     * 统一返回输出json
     *
     * @param $data
     * @return mixed
     */
    public function response($data)
    {

        if ($this->getResponseCode() === 0) {
            $data = [
                'code' => $this->getResponseCode(),
                'message' => 'success',
                'data' => $data
            ];
        }

        return Response::json($data, $this->getStatusCode());
    }
}