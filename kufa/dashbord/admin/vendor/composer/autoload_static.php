<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0fcd715d1250d71dd15cbc656b4436f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0fcd715d1250d71dd15cbc656b4436f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0fcd715d1250d71dd15cbc656b4436f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0fcd715d1250d71dd15cbc656b4436f::$classMap;

        }, null, ClassLoader::class);
    }
}
