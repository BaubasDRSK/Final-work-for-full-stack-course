export default class ImageLoader {

    constructor() {

        window.addEventListener('load', _ => {
            this.registerEvents(document);
        });
    }

    registerEvents(dom) {
        dom.querySelectorAll('[data-select-image]').forEach(input => {
            input.addEventListener('change', event => {
                const imagePreview = document.getElementById('imagePreview');
                if (event.target.files && event.target.files[0]) {
                    const selectedFile = event.target.files[0];
                    
                    const reader = new FileReader();                    
                    reader.onload = function(e) {
                      imagePreview.src = e.target.result;
                    };
                    

                    reader.readAsDataURL(selectedFile);
                  }

            });
        });
    }

    // showImage() {

    // }

}