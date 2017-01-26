var formsCollection = document.getElementsByTagName("form");
var reCAPTCHAexecute = true;
var submitButton;

for(var i = 0; i < formsCollection.length; i++) {
    if (formsCollection[i].querySelector('.recaptcha') != null) {
        if (formsCollection[i].addEventListener) {
            formsCollection[i].addEventListener("submit", onReCAPTCHAFormSubmit, false);
        } else if (formsCollection[i].attachEvent) {
            formsCollection[i].attachEvent('onsubmit', onReCAPTCHAFormSubmit);
        }
    }
}

function onReCAPTCHAFormSubmit(e) {
    if (reCAPTCHAexecute) {
        e.preventDefault();

        var submitButtons = document.getElementsByName('--' + e.target.id + '[__currentPage]');
        submitButton = submitButtons[0];
        reCAPTCHAexecute = false;

        grecaptcha.execute();

        return false;
    }
}

function onReCAPTCHASubmit() {
    reCAPTCHAexecute = false;
    var reCAPTCHAElement = document.getElementById('g-recaptcha-response');
    var parentReCAPTCHAElement = reCAPTCHAElement.parentElement;
    var reCAPTCHAFormElements = document.getElementsByClassName('recaptcha');
    var reCAPTCHAFormElement = reCAPTCHAFormElements[0];
    reCAPTCHAFormElement.value = reCAPTCHAElement.value;
    parentReCAPTCHAElement.removeChild(reCAPTCHAElement);

    submitButton.click();
}
