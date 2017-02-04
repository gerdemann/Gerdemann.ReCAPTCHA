<?php
namespace Gerdemann\ReCAPTCHA\Validation;

use Neos\Flow\Http\Client\Browser;
use Neos\Flow\Http\Client\CurlEngine;
use Neos\Flow\Validation\Validator\AbstractValidator;

/**
 * ReCAPTCHA Validator
 */
class ReCAPTCHAValidator extends AbstractValidator
{
    /**
     * @var array
     */
    protected $supportedOptions = array(
        'secret' => array('', ' The shared key between your site and reCAPTCHA', 'string', true)
    );

    /**
     * ReCAPTCHA validate
     *
     * @return void
     */
    protected function isValid($value)
    {
        $browser = new Browser();
        $browser->setRequestEngine(new CurlEngine());
        $arguments = array(
            'secret' => $this->getOptions()['secret'],
            'response' => $value
        );
        $response = $browser->request('https://www.google.com/recaptcha/api/siteverify', 'POST', $arguments);
        $responseArray = json_decode($response->getContent(), true);
        if (!$responseArray['success']) {
            $this->addError('Captcha failed. Please try again.', 1485462189);
        }
    }
}
