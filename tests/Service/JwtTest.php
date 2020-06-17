<?php

namespace Tests\Unit;

use App\Hope\Services\JwtService;
use Tests\TestCase;

class JwtTest extends TestCase
{
    public function testJwt()
    {
        $user_id = rand(1, 100000);

        /**
         * @var JwtService $jwtService
         */
        $jwtService = app(JwtService::class);

        $token = $jwtService->getToken($user_id);

        $res = $jwtService->check($token);

        $this->assertEquals($res, $user_id);
    }
}
