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
          secret: 'ENTER_HERE_YOUR_SHARED_SECRET'
  ```

Settings:
-----------

You can predefine default values for `secret` and `sitekey` in
`Settings.yaml`. If no specific values are given in the form the
captcha-element will fallback to those values.

  ```
 Gerdemann:
   ReCAPTCHA:
     sitekey: ~
     secret: ~
  ```


Hint:
-------

Two javascript files are included in `/Resources/Private/Fusion/Root.fusion` on the page.
If this is not desired, these can be individually removed via a condition.
To ensure the functionality, these files are at least necessary on pages with form.


Version hint
-------

The Version 1.* is compatible with Neos 2.0, but this version is no longer supported.
For Neos 3.0 versions 2. * can be used.

License
-------

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
