<?php

namespace App\Security;

use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\User\InMemoryUser;
use Symfony\Component\Security\Http\AccessToken\AccessTokenHandlerInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;

class AccessTokenHandler implements AccessTokenHandlerInterface
{
    public function getUserBadgeFrom(string $accessToken): UserBadge
    {
        if ($accessToken !== "abc123") {
            throw new BadCredentialsException;
        }

        return new UserBadge(
            'api-user',
        fn($username) => new InMemoryUser($username, null, ['ROLE_USER'])
        );
    }
}