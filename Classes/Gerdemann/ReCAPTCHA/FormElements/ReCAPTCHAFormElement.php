<?php
namespace Gerdemann\ReCAPTCHA\FormElements;

use Neos\Flow\Annotations as Flow;
use Neos\Form\Core\Model\AbstractFormElement;

class ReCAPTCHAFormElement extends AbstractFormElement
{
    /**
     * @var string
     * @Flow\InjectConfiguration(package="Gerdemann.ReCAPTCHA", path="sitekey")
     */
    protected $sitekey;

    /**
     * @return string|null the site key from the settings
     */
    public function getSiteKey()
    {
        return $this->sitekey;
    }
}
