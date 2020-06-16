<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @OA\Get(
     *      path="/token",
     *      tags={"用户"},
     *      summary="授权登录",
     *      description="返回JWT",
     *      @OA\Parameter(
     *          name="Authorization",
     *          in="header",
     *          description="授权登录：Basic {{base64($login:$password)}}",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="invite_code",
     *          in="path",
     *          description="邀请码，未注册用户必须输入邀请码",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="请求成功",
     *          @OA\JsonContent(
     *              @OA\Property(property="id",type="string",description="id"),
     *              @OA\Property(property="must_invite",type="bool",description="必须邀请"),
     *              @OA\Property(property="jwt",type="bool",description="jwt"),
     *              @OA\Property(property="token_type",type="bool",description="jwt类型"),
     *              @OA\Property(property="expires_in",type="bool",description="过期时长"),
     *          )
     *       ),
     *      @OA\Response(response=411, description="验证码错误"),
     *      @OA\Response(response=412, description="请输入邀请码"),
     *      @OA\Response(response=413, description="邀请码错误"),
     *     @OA\Response(response=414, description="邀请码无效，请更换后重试"),
     * )
     * @param Request $request
     * @param SmsService $smsService
     * @return Response
     * @throws \Throwable
     */
}
