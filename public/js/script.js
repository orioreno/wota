const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
$.fn.selectpicker.Constructor.BootstrapVersion = '5.1.3';

var datepickers = [];
tempusDominus.DefaultOptions.display.theme = 'light';
tempusDominus.DefaultOptions.display.buttons.today = true;
tempusDominus.DefaultOptions.display.components.seconds = false;
tempusDominus.DefaultOptions.display.components.decades = false;
tempusDominus.DefaultOptions.localization.dateFormats = {
    LT: 'HH:mm',
    LTS: 'HH:mm:ss',
    L: 'yyyy-MM-dd',
};
