<?php
namespace VacationApartments\Utility;

class Utility {

    public static function doDefine($constant, $value) {
        if (!defined($constant)) {
            define($constant, $value);
        }
    }

    /**
     * @param string $section
     * @param string $key
     * @return array
     */
    public static function getConfig($section = null, $key = null) {
        if (defined('VA_CONFIG_PATH')) {
            $configFile = constant('VA_CONFIG_PATH') . '/sdk-config.ini';
        } else {
            $configFile = implode(
                DIRECTORY_SEPARATOR,
                array(dirname(__FILE__), "../../../../../../", "config", "sdk-config.ini")
            );
        }

        $ini = parse_ini_file($configFile, true);

        if ($section != null) {
            if ($key != null) {
                return $ini[$section][$key];
            }
            return $ini[$section];
        }

        return $ini;
    }

    public static function underscoreToCamelCase($string, $capitalizeFirstCharacter = false) {

        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

    public static function camelCaseToUnderscore($string) {

        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}
