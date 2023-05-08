import './bootstrap';
// import 'flowbite';
import lozad from 'lozad'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
});
