<?php

namespace Muratbsts\MailTemplate;

use Illuminate\Contracts\Mail\Mailer;

/**
 * Class MailTemplate
 * @package Muratbsts\MailTemplate
 */
class MailTemplate
{

    /**
     * Settings for MailTemplate
     *
     * @var
     */
    protected $settings;

    /**
     * The Mailer instance
     * @var \Illuminate\Contracts\Mail\Mailer
     */
    protected $mailer;


    /**
     * MailTemplate constructor.
     *
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->mailer = app()->make('Illuminate\Contracts\Mail\Mailer');
    }


    /**
     * @param $view
     * @param array $data
     * @param null $callback
     */
    public function send($view, array $data = [], $callback = null)
    {
        $data = array_merge($this->settings, $data);
        $this->mailer->send($view, $data, $callback);
    }

    /**
     * Get the array of failed recipients.
     *
     * @return array
     */
    public function failures()
    {
        return $this->mailer->failures();
    }
}
