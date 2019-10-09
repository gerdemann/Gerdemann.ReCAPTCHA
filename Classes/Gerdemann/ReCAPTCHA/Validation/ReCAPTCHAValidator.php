<?php
namespace Gerdemann\ReCAPTCHA\Validation;

use GuzzleHttp\Psr7\Uri;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Http\Client\Browser;
use Neos\Flow\Http\Client\CurlEngine;
use Neos\Flow\Validation\Validator\AbstractValidator;

/**
 * ReCAPTCHA Validator
 */
class ReCAPTCHAValidator extends AbstractValidator
{
    /**
     * @var string
     * @Flow\InjectConfiguration(package="Gerdemann.ReCAPTCHA", path="secret")
     */
    protected $secret;

    /**
     * @var array
     */
    protected $supportedOptions = array(
        'secret' => array('', ' The shared key between your site and reCAPTCHA', 'string', false)
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

        $uri = new Uri('https://www.google.com/recaptcha/api/siteverify');
        $uri = $uri->withQueryValue($uri, 'secret', $this->getOptions()['secret'] ? $this->getOptions()['secret'] : $this->secret);
        $uri = $uri->withQueryValue($uri, 'response', $value);
        $response = $browser->request((string)$uri);
        $responseArray = json_decode($response->getBody()->getContents(), true);
        if (!$responseArray['success']) {
            $this->addError('Captcha failed. Please try again.', 1485462189);
        }
    }
}
