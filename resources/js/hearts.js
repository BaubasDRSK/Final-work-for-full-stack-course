import axios from "axios";

export default class Hearts {

    constructor() {

        window.addEventListener('load', _ => {
            this.init();
            this.registerEvents(document);
        });
    }

    init() {
        document.querySelectorAll('[data-heart-load]').forEach(load => {
            axios.get(load.dataset.url)
                .then(res => {
                    load.innerHTML = res.data.html;
                    this.registerEvents(load);
                })
                .catch(err => {
                    console.log(err);
                });
        });
    }

    registerEvents(dom) {
        dom.querySelectorAll('[data-heart-action]').forEach(button => {
            button.addEventListener('click', _ => {
                this.handleAction(button);
            });
        });
    }

    handleAction(action) {
        switch (action.dataset.heartActionType) {
            case 'addHeart':
                this.handleAdd(action);
                break;
            default:
        }
    }


     // Handlers

     handleAdd(action) {

        // console.log('piuyi piyui');

        axios.get(action.dataset.url)
             .then(res => {
                if (res['data']['status']=='error'){
                    console.log(res['data']['error']);

                    // Create a new <div> element with some content
                    const newDiv = document.createElement('div');
                    newDiv.innerHTML = ` <div id='animatedDiv' class="info-container alert-danger">
                                            <div class="info-error">
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        <li>${res['data']['error']}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>`;
                    const mainDom = document.getElementById('main');
                    mainDom.insertBefore(newDiv, mainDom.firstChild);

                    setTimeout(() => {
                        mainDom.removeChild(newDiv);
                      }, 5000);

                    const animatedElement = document.getElementById('animatedDiv');
                    function restartAnimation() {
                    animatedElement.classList.remove('info-container');
                    void animatedElement.offsetWidth; // Trigger a reflow (optional but can improve reliability)
                    animatedElement.classList.add('info-container');
                    }


                    restartAnimation();

                }
                 this.init();

                 // this.m.addMessage(res.data.message);
             })
             .catch(err => {
                console.log(action.dataset.url);
                 // this.handleError(err);
             });
     }


}
