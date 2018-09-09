<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4fac531f82c2de846617b4f9503ba06
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pcode\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/patrickchagas21/php-classes/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4fac531f82c2de846617b4f9503ba06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4fac531f82c2de846617b4f9503ba06::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd4fac531f82c2de846617b4f9503ba06::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd4fac531f82c2de846617b4f9503ba06::$classMap;

        }, null, ClassLoader::class);
    }
}