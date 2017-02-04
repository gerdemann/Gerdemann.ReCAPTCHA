Gerdemann.ReCAPTCHA
===========================

Neos plugin for Google reCAPTCHA

How-To:
-------

* Install the package to ``Packages/Plugin/Gerdemann.ReCAPTCHA`` (e.g. via ``composer require gerdemann/recaptcha:~2.0``)
* Get your sitekey and shared secret at https://www.google.com/recaptcha/admin
* Add the reCAPTCHA element to your form:
  
  ```
  -
    type: 'Gerdemann.ReCAPTCHA:ReCAPTCHA'
    identifier: 'recaptcha'
    properties:
      sitekey: 'ENTER_HERE_YOUR_SITEKEY'
    validators:
      - identifier: 'Gerdemann.ReCAPTCHA:ReCAPTCHA'
        options:
          secret: 'ENTER_HERE_YOUR_SHARED_SECRET
  ```
  
Version hint
-------

The Version 1.* is compatible with Neos 2.0, but this version is no longer supported. 
For Neos 3.0 versions 2. * can be used.

License
-------

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
