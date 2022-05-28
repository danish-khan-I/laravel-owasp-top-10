<?php
/**
 * Put this file into root of your project for IDE helper
 * Note: This file don't need to be require/include
 */
namespace {
    function jwt_encode(array $payload, string $key, string $algorithm = 'HS256'): string
    {
        return '';
    }

    function jwt_decode(string $token, string $key, string $algorithm = 'HS256'): array
    {
        return [];
    }
}

namespace Cdoco {
    // @codingStandardsIgnoreStart
    abstract class JWT
    // @codingStandardsIgnoreEnd
    {
        abstract public static function encode(array $payload, string $key, string $algorithm = 'HS256'): string;

        abstract public static function decode(string $token, string $key, string $algorithm = 'HS256'): array;
    }
}