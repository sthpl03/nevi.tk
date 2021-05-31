let canSubmit = false;
const invalidDiv = document.getElementById('invalid');

function captchaCallback() {
    if(hcaptcha.getResponse()) canSubmit = true;
}

function captchaLoad() {
    hcaptcha.render('h-captcha', {
        'sitekey': '24aa322a-5d4d-40f1-a2c3-9d62f467ad88',
        'callback': 'captchaCallback',
    });
}

document.forms['verify-form'].addEventListener('submit', e => {
    if(!canSubmit || invalidDiv) {
        const warning = document.getElementById('warning');
        e.preventDefault();
        if(invalidDiv) warning.textContent = 'There was an error while trying to submit.';
        warning.style.display = 'block';
    }
});