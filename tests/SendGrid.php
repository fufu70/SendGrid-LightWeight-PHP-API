<?php

/**
 * Contains the SendGridTest class.
 * 
 * @package SendGrid_Restful\Test
 * @author  Christian Micklisch <christian.micklisch@successwithsos.com>
 */

namespace SendGrid_Restful\Test;

use \Common\Reflection as Reflect;
use SendGrid_Restful\SendGrid;

/**
 * SendGridTest class. A PHPUnit Test case class.
 *
 * Tests the "test only" (Relfection) class.
 * 
 * @author Christian Micklisch <christian.micklisch@successwithsos.com>
 */

class SendGridTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     *
     *
     * Input 
     *
     *
     * 
     */

    /**
     * to, subject, substitutions, and expected array
     * 
     * @return array Array of arrays matching the test_post parameters
     */
    public function input_send() {
        return [
            [
                "christian.micklisch@successwithsos.com",
                "Are Cookies Even Real?",
                [
                    SendGrid::TEXT => 'This is my text',
                    SendGrid::BUTTON_TEXT => 'This is my button text',
                    SendGrid::BUTTON_LINK => 'This is my button link',
                    SendGrid::PREHEADER => 'This is my preheader'
                ],
                '{"message":"success"}'
            ]
        ];
    }

    /**
     *
     *
     *
     * Test
     *
     *
     * 
     */
    

    /**
     * Tests the send function in SendGrid.
     *
     * @dataProvider input_send
     * 
     * @param  string $to              The email to send to.
     * @param  string $subject         The subject for the user.
     * @param  array  $sub             The substitutions for the template.
     * @param  string $expected_result The expected response from the send request.
     */
    public function test_send(
        $to = "", 
        $subject = "", 
        array $sub = [], 
        $expected_response = ""
    ) {
        $null = null;
        Reflect::setProperty(
            '_curl_class', 
            'SendGrid_Restful\SendGrid', 
            $null, 
            'SendGrid_Restful\Test\Spy\CurlSpy'
        );

        $this->assertEquals($expected_response, SendGrid::send($to, $subject, $sub));
    }
}



