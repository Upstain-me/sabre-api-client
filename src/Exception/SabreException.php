<?php

namespace Upstain\SabreApiClient\Exception;

final class SabreException extends \Exception
{
    public static function authError(\Throwable $e): SabreException
    {
        $message = 'Sabre Auth error: ' . $e->getMessage();
        return new static($message, $e->getCode());
    }

    public static function authCacheError(\Throwable $e): SabreException
    {
        $message = 'Sabre Auth cache error: ' . $e->getMessage();

        return new static($message, $e->getCode());
    }

    public static function jsonError(\Throwable $e): SabreException
    {
        return new static($e->getMessage(), $e->getCode());
    }
}
