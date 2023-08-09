import axios from "axios";

export default class Tags {

    constructor() {

        window.addEventListener('load', _ => {
            this.init();
            this.registerEvents(document);
        });
    }

    init() {
        document.querySelectorAll('[data-tag-load]').forEach(load => {
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
        dom.querySelectorAll('[data-tag-action]').forEach(button => {
            button.addEventListener('click', _ => {
                this.handleAction(button);
            });
        });
    }

    handleAction(action) {
        switch (action.dataset.tagActionType) {
            case 'load':
                this.handleLoad(action);
                break;
            case 'remove':
                this.handleRemove(action);
                break;
            case 'destroy':
                this.handleDestroy(action);
                break;
            case 'store':
                this.handleStore(action);
                break;
            case 'update':
                this.handleUpdate(action);
                break;
            case 'addTag':
                this.handleAddTag(action);
                break;
            case 'removeTag':
                this.handleRemoveTag(action);
                break;
            default:
        }
    }

     // Handlers

     handleRemoveTag(action) {
        const target = document.querySelector(action.dataset.tagTarget);
        console.log(target);
        console.log(action.dataset.url);
        axios.post(action.dataset.url)
             .then(res => {
                 this.init();
                 // this.m.addMessage(res.data.message);
             })
             .catch(err => {
                 // this.handleError(err);
             });
     }

     handleAddTag(action) {
       const target = document.querySelector(action.dataset.tagTarget);
       const data = this.makeData(target);
       axios.post(action.dataset.url, data)
            .then(res => {
                this.init();
                // this.m.addMessage(res.data.message);
            })
            .catch(err => {
                // this.handleError(err);
            });
    }

     handleLoad(action) {
        axios.get(action.dataset.url)
            .then(res => {
                const target = document.querySelector(action.dataset.tagTarget);
                target.innerHTML = res.data.html;
                this.registerEvents(target);
            })
            .catch(err => {
                console.log(err);
            });
    }

    handleRemove(action) {
        const target = document.querySelector(action.dataset.tagTarget);
        target.innerHTML = '';
    }

    handleDestroy(action) {
        axios.delete(action.dataset.url)
            .then(res => {
                const target = document.querySelector(action.dataset.tagTarget);
                target.innerHTML = '';
                this.init();
                this.m.addMessage(res.data.message);
            })
            .catch(err => {
                this.handleError(err);
            });
    }

    handleStore(action) {
        const target = document.querySelector(action.dataset.tagTarget);
        const data = this.makeData(target);
        axios.post(action.dataset.url, data)
            .then(res => {
                this.resetData(target);
                this.init();
                this.m.addMessage(res.data.message);
            })
            .catch(err => {
                this.handleError(err);
            });
    }

    handleUpdate(action) {
        const target = document.querySelector(action.dataset.tagTarget);
        const data = this.makeData(target);
        action.disabled = true;
        axios.put(action.dataset.url, data)
            .then(res => {
                target.innerHTML = '';
                this.init();
                this.m.addMessage(res.data.message);
            })
            .catch(err => {
                this.handleError(err);
                action.disabled = false;
            });
    }


    makeData(dom) {
        const data = {};
        dom.querySelectorAll('input').forEach(input => {
            data[input.name] = input.value;
        });
        // no need now for future use
        // dom.querySelectorAll('select').forEach(select => {
        //     data[select.name] = select.value;
        // });
        // dom.querySelectorAll('textarea').forEach(textarea => {
        //     data[textarea.name] = textarea.value;
        // });
        // dom.querySelectorAll('checkbox').forEach(checkbox => {
        //     data[checkbox.name] = checkbox.checked;
        // });
        // dom.querySelectorAll('radio').forEach(radio => {
        //     data[radio.name] = radio.checked;
        // });
        return data;
    }

    resetData(dom) {
        dom.querySelectorAll('input').forEach(input => {
            input.value = '';
        });
        // no need now for future use
        // dom.querySelectorAll('select').forEach(select => {
        //     select.value = '';
        // });
        // dom.querySelectorAll('textarea').forEach(textarea => {
        //     textarea.value = '';
        // });
        // dom.querySelectorAll('checkbox').forEach(checkbox => {
        //     checkbox.checked = false;
        // });
        // dom.querySelectorAll('radio').forEach(radio => {
        //     radio.checked = false;
        // });
    }
}