<?php

namespace Upstain\SabreApiClient\Response\Authorization;

class AuthorizationResponse
{
    /**
     * @var string
     */
    private string $accessToken;

    /**
     * @var string
     */
    private string $tokenType;

    /**
     * @var string
     */
    private string $expiresIn;

    /**
     * AuthorizationResponse constructor.
     * @param string $accessToken
     * @param string $tokenType
     * @param string $expiresIn
     */
    public function __construct(string $accessToken, string $tokenType, string $expiresIn)
    {
        $this->accessToken = $accessToken;
        $this->tokenType = $tokenType;
        $this->expiresIn = $expiresIn;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @param string $tokenType
     */
    public function setTokenType(string $tokenType): void
    {
        $this->tokenType = $tokenType;
    }

    /**
     * @return string
     */
    public function getExpiresIn(): string
    {
        return $this->expiresIn;
    }

    /**
     * @param string $expiresIn
     */
    public function setExpiresIn(string $expiresIn): void
    {
        $this->expiresIn = $expiresIn;
    }
}
