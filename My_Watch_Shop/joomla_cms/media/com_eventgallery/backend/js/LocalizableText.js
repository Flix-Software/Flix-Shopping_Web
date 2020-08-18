(function(){
    "use strict";

    document.addEventListener("DOMContentLoaded", (event) => {
        window.document.dispatchEvent(new Event("eventgallery.localizableContentLoaded", {
            bubbles: true,
            cancelable: true
        }));
    }, {once: true});

    /**
     * the event eventgallery.localizableContentLoaded is fired and the editor will start
     * initializing.
     */
    document.addEventListener("eventgallery.localizableContentLoaded", (event) => {

        let elements = document.querySelectorAll('input[data-localizabletext]');

        for (let i=0; i<elements.length; i++) {
            let element = elements[i];

            if (element.getAttribute('data-localizedtext-enabled')) {
                continue;
            }
            element.setAttribute('data-localizedtext-enabled', true);

            let container = element.closest(".localizabletext");
            let inputFields = container.getElementsByClassName('lc_' + element.id);

            for (let i=0; i<inputFields.length; i++) {
                inputFields[i].addEventListener('blur', () => collectData(element));
            }
        }
    });


    let collectData = function (element) {
        let data = {};
        let container = element.closest(".localizabletext");
        let inputFields = container.getElementsByClassName('lc_' + element.id);

        for (let i=0; i<inputFields.length; i++) {
               let field = inputFields[i];
            let value = field.value;
            let languageTag = field.getAttribute("data-tag");

            if (value.trim().length > 0) {
                data[languageTag] = value;
            }
        }

        let jsonData = JSON.stringify(data);
        if (jsonData.length < 3) {
            jsonData = "";
        }

        element.value = jsonData;
    }

})();