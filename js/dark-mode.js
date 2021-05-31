const dark_mode = localStorage.getItem('dark-mode');
const toggle = document.getElementById('dark-toggle');

const enable_dark = function() {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem('dark-mode', 'enabled');
    toggle.checked = true;
};

const disable_dark = function() {
    document.documentElement.setAttribute('data-theme', 'light');
    localStorage.setItem('dark-mode', 'disabled');
    toggle.checked = false;
};

if(dark_mode == 'disabled') disable_dark();

toggle.addEventListener('change', () => {
    if(toggle.checked) enable_dark();
    else disable_dark();
});