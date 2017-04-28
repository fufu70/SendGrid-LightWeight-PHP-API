<?php

/**
 * Contains the SendGrid class.
 * 
 * @package SendGrid_Restful
 * @author  Christian Micklisch <christian.micklisch@successwithsos.com>
 */

namespace SendGrid_Restful;

/**
 * The SendGrid class.
 * 
 * Calls the sendgrid api to send an email.
 * 
 * @author Christian Micklisch <christian.micklisch@successwithsos.com>
 */
class SendGrid extends \CApplicationComponent
{
    const URL = 'https://api.sendgrid.com/api/mail.send.json';
    const TEXT = '[%text%]';
    const BUTTON_TEXT = '[%button_text%]';
    const BUTTON_LINK = '[%button_link%]';
    const PREHEADER = '[%preheader-text%]';

    /** 
     * Sends a post to the SendGrid api.
     * 
     * @param  string $to      Whom to send the email.
     * @param  string $subject The title of the email.
     * @param  string $sub     The substitutions.
     * @return string          The result of sending the email.
     */
    public static function send($to = '', $subject = '', array $sub = []) 
    {

        $js = [
            'sub' => $sub,
            'filters' => [
                'templates' => [
                    'settings' => [
                        'enable' => 1, 
                        'template_id' => Yii::app()->params->send_grid['template_id']
                    ]
                ]
            ]
        ];

        if (is_array($to))
        {
            $last = '';
            foreach ($to as $email)
                $last = self::send_w_smtp($email, $subject, $js);

            return $last;
        }
        else if (is_string($to))
        {
            return self::send_w_smtp($to, $subject, $js);
        }

    }

    /**
     * Sends the email with the x-smtpapi data.
     * 
     * @param  string $to      Whom to send the email.
     * @param  string $subject Title of the email
     * @param  array  $js      Collection substitutions. with template.
     * @return string          The result of sending the email.
     */
    private static function send_w_smtp($to = '', $subject = '', array $js = [])
    {
        $params = [
            'api_user'  => Yii::app()->params->send_grid['username'],
            'api_key'   => Yii::app()->params->send_grid['password'],
            'to'        => $to,
            'from'      => Yii::app()->params->adminEmail,
            'fromname'  => Yii::app()->params->send_grid['name'],
            'text'      => $js['sub'][self::TEXT][0],
            'html'      => $js['sub'][self::TEXT][0],
            'subject'   => $subject,
            'x-smtpapi' => json_encode($js),
        ];

        $options = [
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . Yii::app()->params->send_grid['key']],
            CURLOPT_SSLVERSION => 6
        ];

        return Curl::curl_post(self::URL, $params, $options);
    }
}