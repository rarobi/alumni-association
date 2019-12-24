<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function access()
    {
        return app('access');
    }
}

if (! function_exists('history')) {
    /**
     * Access the history facade anywhere.
     */
    function history()
    {
        return app('history');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require $filename;
            }
        }
    }
}

/* Custom Helpers */

if (! function_exists('checkIsAValidDate')) {
    /**
     * Determine if the date is in a valid date format
     * @param $dateString
     * @return bool
     */
    function checkIsAValidDate($dateString) {
        return (bool) strtotime($dateString);
    }
}

if (! function_exists('checkIsValidJson')) {
    /**
     * Check if the string is in a valid json format
     * @param $string
     * @return bool
     */
    function checkIsValidJson($string) {
        json_decode($string);
        return (bool) (json_last_error() == JSON_ERROR_NONE);
    }
}

if (! function_exists('timeInMinutes')) {
    /**
     * Return the time in minutes format
     * @param $time
     */
    function timeInMinutes($time) {
        $format = '%R';
        $formattedTime = strftime($format, strtotime($time));

        $parsedTime = date_parse($formattedTime);
        $timeInMinutes = $parsedTime['hour'] * 60 + $parsedTime['minute'];

        return $timeInMinutes;
    }
}

if (! function_exists('setActiveClass')) {
    function setActiveClass($path)
    {
        return Request::is($path) ? 'active ' : '';
    }
}

if (! function_exists('setActive')) {
    function setActive($path)
    {
        return Request::is($path . '*') ? ' class=active-item' : '';
    }
}

if (! function_exists('setCollapse')) {
    function setCollapse($path)
    {
        return Request::is($path . '*') ?  '' : 'collapse';
    }
}

if(! function_exists('textshorten')){
    function textshorten($text, $limit = 1000)
    {
    $text = $text . '';
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text . '...';
    return $text;
    }
}

if(! function_exists('convert24HoursTimeToAmPmFormat')) {

    function convert24HoursTimeToAmPmFormat($time) {
        return gmdate("h:i A", (timeInMinutes($time) * 60));
    }
}
if(! function_exists('convertAmPmTo24HoursFormat')) {

    function convertAmPmTo24HoursFormat($time) {
        return date("H:i", strtotime($time));
    }
}


if(! function_exists('isValidTime')) {

    function isValidTime($time) {
        $array = ['am', 'pm', 'AM', 'PM'];

        if(str_contains($time, $array)) {
            return (bool) isValidAmPmFormat($time);
        }

        return (bool) isValid24HoursFormat($time);
    }
}

if(! function_exists('checkIsAValidTimeStamp')) {

    function checkIsAValidTimeStamp($timestamp)
    {
        return ((string) (int) $timestamp === $timestamp)
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }
}

/**
 * Validates Time in 12 hour format (e.g. 12:32 am).
 *
 * @param string  $time  Name of submitted value to be checked.
 * @return boolean
 */
if(! function_exists('isValidAmPmFormat')) {
    function isValidAmPmFormat($time)
    {
        return (bool) preg_match("/^(1[0-2]|0?[1-9]):[0-5][0-9] (AM|PM)$/i", $time);
    }
}

/**
 * Validates Time in 24 hour format (e.g. 20:32).
 *
 * @param string  $time  Name of submitted value to be checked.
 * @return boolean
 */
if(! function_exists('isValid24HoursFormat')) {
    function isValid24HoursFormat($time) {
        return (bool) preg_match('#^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$#', $time);
    }
}

if(! function_exists('dateIsBetween')) {
    function dateIsBetween($from, $to, $date = 'now') {
        $date = is_int($date) ? $date : strtotime($date);
        $from = is_int($from) ? $from : strtotime($from);
        $to = is_int($to) ? $to : strtotime($to);

        return ($date >= $from) && ($date < $to);
    }
}


if(! function_exists('cleanString')) {

    function cleanString($string) {

        $s = trim($string);
        $s = iconv("UTF-8", "UTF-8//IGNORE", $s); // drop all non utf-8 characters

        // this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
        preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F-\x9F]/u', '', $s);
        $s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $s);

        $s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space

        $s = str_replace("’", '', $s);
        $s = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $s);

        return $s;
    }
}

if(! function_exists('isEmptyOrNull')) {

    function isEmptyOrNull($value)
    {
        return (! isset($value) || is_null($value) || empty($value)) ? true : false;
    }
}