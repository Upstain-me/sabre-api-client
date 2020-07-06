<?php

namespace Upstain\SabreApiClient\Exception;

class SabreException extends \Exception
{
    public static function authError(\Throwable $e): SabreException
    {
        $message = 'Sabre Auth error: ' . $e->getMessage();
        return new static($message, $e->getCode());
    }

    public static function authCacheError(\Throwable $e)
    {
        $message = 'Sabre Auth cache error: ' . $e->getMessage();

        return new static($message, $e->getCode());
    }
}
