<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit225b0b2ffbeaa784b6f71b8bfb412cbb
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Moh6mmad\\LaravelContent\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Moh6mmad\\LaravelContent\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit225b0b2ffbeaa784b6f71b8bfb412cbb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit225b0b2ffbeaa784b6f71b8bfb412cbb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit225b0b2ffbeaa784b6f71b8bfb412cbb::$classMap;

        }, null, ClassLoader::class);
    }
}