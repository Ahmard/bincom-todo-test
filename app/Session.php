<?php


namespace App;


class Session
{
    private static array $flashes = [];


    public static function init()
    {
        self::$flashes = $_SESSION['flashes'] ?? [];
        unset($_SESSION['flashes']);
    }

    public static function flash(string $key, string $value): void
    {
        $oldFlashes = json_decode($_SESSION['flashes'] ?? "[]");
        $_SESSION['flashes'] = json_encode(array_merge($oldFlashes, [$key => $value]));
    }

    public static function get(string $key): ?string
    {
        return $_SESSION[$key] ?? null;
    }

    public static function getFlash(string $key): ?string
    {
        return self::$flashes[$key] ?? null;
    }

    public static function all(): array
    {
        return $_SESSION;
    }

    public static function allFlashes(): array
    {
        return json_decode($_SESSION['flashes']);
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }
}