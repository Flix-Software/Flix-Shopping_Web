import {serializeForm} from "../../common/js/Helpers";

(function(){
    "use strict";

    let fireDomLoadEvent = function() {
        window.document.dispatchEvent(new Event("eventgallery.localizableContentLoaded", {
            bubbles: true,
            cancelable: true
        }));
    };

    document.addEventListener('DOMContentLoaded', () =>{
        assignClickEvents();
    });

    let assignClickEvents = function() {
        assignClickEvent('.openInlineForm', openInlineForm);
        assignClickEvent('.saveInlineForm', saveInlineForm);
        assignClickEvent('.closeInlineForm', closeInlineForm);
    };

    let assignClickEvent = function(querySelector, callback) {
        let elements = document.querySelectorAll(querySelector);
        for(let i=0; i<elements.length; i++) {
            let element = elements[i];
            element.removeEventListener('click', callback);
            element.addEventListener('click', callback);
        }
    };

    let openInlineForm = function(e) {
        e.preventDefault();
        let currentContainer = e.target.closest('div[data-id]');

        currentContainer.innerHTML='Loading...';

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                currentContainer.innerHTML = this.responseText;
                fireDomLoadEvent();
                assignClickEvents();
            }
        };
        xhttp.open("GET", currentContainer.getAttribute('data-editlink'), true);
        xhttp.send();
    };

    let saveInlineForm = function(e) {
        e.preventDefault();

        let id = e.target.getAttribute('data-id');
        let form = e.target.closest('div[data-action]');
        let currentContainer = document.querySelector('div[data-id="' + id + '"]');
        let url = form.getAttribute('data-action');
        form.querySelector('input[name="task"]').value = e.target.getAttribute('data-task');

        currentContainer.innerHTML = 'Loading.. ';

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                currentContainer.innerHTML = this.responseText;
                fireDomLoadEvent();
                assignClickEvents();
            }
        };

        xhttp.open("POST", url, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(serializeForm(form));
    };

    let closeInlineForm = function(e) {
        e.preventDefault();
        let id = e.target.getAttribute('data-id');
        let currentContainer = document.querySelector('div[data-id="' + id + '"]');
        let url = e.target.getAttribute('data-href');

        currentContainer.innerHTML = 'Loading.. ';

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                currentContainer.innerHTML = this.responseText;
                assignClickEvents();
            }
        };

        xhttp.open("GET", url, true);
        xhttp.send();
    };

})();