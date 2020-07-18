<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit446e70dc7442d6ab5fac222632aadd70
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit446e70dc7442d6ab5fac222632aadd70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit446e70dc7442d6ab5fac222632aadd70::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
