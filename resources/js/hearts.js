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
       
        console.log('piuyi piyui');
       
        // axios.post(action.dataset.url)
        //      .then(res => {
        //          this.init();
        //          // this.m.addMessage(res.data.message);
        //      })
        //      .catch(err => {
        //          // this.handleError(err);
        //      });
     }

     
}