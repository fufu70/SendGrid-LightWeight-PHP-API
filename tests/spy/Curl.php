<?php

/**
 * Contains the CurlSpy class.
 * 
 * @package SendGrid_Restful\Test
 * @author  Christian Micklisch <christian.micklisch@successwithsos.com>
 */

namespace SendGrid_Restful\Test\Spy;

/**
 * CurlSpy class. A class only used for spying.
 *
 * Contains post and get classes.
 * 
 * @author Christian Micklisch <christian.micklisch@successwithsos.com>
 */

class CurlSpy
{

    const DEFAULT_POST = '{"message":"success"}';
    const DEFAULT_GET  = '{"message":"success"}';

    /**
     * Returns the default post response
     * 
     * @param  string     $url     The endpoint to call.
     * @param  array|null $post    The POST data to send.
     * @param  array      $options CURL options to append to the default options.
     * @return string              The Response to the post curl call.
     */
    public static function post($url = "/", array $get = NULL, array $options = []) {
        return self::DEFAULT_POST;
    }

    /**
     * Returns the default get response.
     * 
     * @param  string     $url     The endpoint to call.
     * @param  array|null $get     The GET data to send.
     * @param  array      $options CURL options to append to the default options.
     * @return string              The Response to the get curl call.
     */
    public static function get($url = "/", array $get = NULL, array $options = []) {
        return self::DEFAULT_GET;
    }
}



