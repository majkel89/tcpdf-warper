<?php
/**
 * Created by PhpStorm.
 * User: majkel
 * Date: 25-Jan-16
 * Time: 14:52
 */

namespace org\majkel\tcpdfwarper;

class Utils {

    /**
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function getKeyAsArray($array, $key) {
        return is_array($array) && isset($array[$key]) && is_array($array[$key]) ? $array[$key] : array();
    }

}
