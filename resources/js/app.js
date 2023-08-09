import './bootstrap';

import Tags from './tags';
import ImageLoader from './imageLoader';


import Alpine from 'alpinejs';

import '../css/test.css';


window.Alpine = Alpine;

Alpine.start();

new Tags();

new ImageLoader();


