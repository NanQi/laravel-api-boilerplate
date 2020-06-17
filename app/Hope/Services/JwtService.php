<?php
/**
 * author: NanQi
 * datetime: 2019/12/8 17:49
 */
declare(strict_types=1);

namespace App\Hope\Services;

use Illuminate\Support\Facades\Request;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;

class JwtService extends BaseService {

    protected $header = 'authorization';
    protected $prefix = 'bearer';

    private $token_ttl;
    private $sign_key;

    public function __construct()
    {
        $this->token_ttl = env('JWT_TTL', 86400);
        $this->sign_key = env('JWT_SECRET', 'nanqi');
    }

    public function getToken($uid, $issuedAt = null, $ttl = null)
    {
        $issuedAt = $issuedAt ?? time();
        $ttl = $ttl ?? $this->token_ttl;

        $signer = new Sha256();

        $token = (new Builder())
            ->issuedAt($issuedAt)
            ->expiresAt($issuedAt + $ttl)
            ->withClaim('uid', $uid)
            ->getToken($signer, new Key($this->sign_key));
        return $token.'';
    }

    private function parse()
    {
        $request = app(Request::class);
        $header = $request->getHeader($this->header);
        if ($header && count($header) > 0 && preg_match('/'.$this->prefix.'\s*(\S+)\b/i', $header[0], $matches)) {
            return $matches[1];
        }
    }

    public function checkToken()
    {
        $headerToken = $this->parse();
        if (!$headerToken) {
            return false;
        }

        return $this->check($headerToken);
    }

    public function check(string $headerToken)
    {
        $curToken = (new Parser())->parse($headerToken);
        $signer = new Sha256();

        $flg = $curToken->verify($signer, $this->sign_key);
        if (!$flg) {
            return false;
        }

        $uid = $curToken->getClaim('uid');

        $flg = $curToken->isExpired();
        if ($flg) {
            return false;
        }

        return $uid;
    }
}
