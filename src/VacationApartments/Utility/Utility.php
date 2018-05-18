<?php
namespace VacationApartments\Utility;

class Utility {

    function doDefine($constant, $value) {
        if (!defined($constant)) {
            define($constant, $value);
        }
    }

    /**
     * @param string $section
     * @param string $key
     * @return array
     */
    function getConfig($section = null, $key = null) {
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
}
