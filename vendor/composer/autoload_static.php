<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0c840ae0ff98cbe5ac44eab961f5ad7
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Common\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/fufu70/reflection-class/src',
        ),
    );

    public static $classMap = array (
        'Yii' => __DIR__ . '/..' . '/yiisoft/yii/framework/yii.php',
        'YiiBase' => __DIR__ . '/..' . '/yiisoft/yii/framework/YiiBase.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0c840ae0ff98cbe5ac44eab961f5ad7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0c840ae0ff98cbe5ac44eab961f5ad7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0c840ae0ff98cbe5ac44eab961f5ad7::$classMap;

        }, null, ClassLoader::class);
    }
}
