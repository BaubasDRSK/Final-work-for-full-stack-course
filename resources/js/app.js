import './bootstrap';

import Tags from './tags';
import ImageLoader from './imageLoader';

import PhotoSwipeLightbox from '../../public/vendor/photoswipe/photoswipe-lightbox.esm.js';

import Alpine from 'alpinejs';

import '../css/test.css';


window.Alpine = Alpine;

Alpine.start();

new Tags();

new ImageLoader();


window.addEventListener('load', _ => {
    const options = {
        gallery: '#gallery--individual a',
        pswpModule: () => import('../../public/vendor/photoswipe/photoswipe.esm.js')
      };
      const lightbox = new PhotoSwipeLightbox(options);
      lightbox.init();
});
