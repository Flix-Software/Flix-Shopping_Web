(function(){
    "use strict";

    /**
     * process selector input
     */
    window.addEventListener('message', function(e) {
        if (!e.data) return;

        let dataStr = e.data;

        if (typeof dataStr !== 'string') {
            return;
        }
        if (dataStr.startsWith('eventgalleryGooglePhotosAlbum_')) {
            var data = JSON.parse(dataStr.replace('eventgalleryGooglePhotosAlbum_',''));

            let albumField = document.getElementById('foldertype-4-album')
            albumField.value = data.albumid;

            let titleField = document.getElementById('foldertype-4-title');
            titleField.value = data.title;

            albumField.onchange();

            document.querySelector('#google-photos-album-selector-modal .modal-header button.close').click();
        }
    });

    document.addEventListener('DOMContentLoaded', () =>{

        let button = document.querySelector('.google-photos-api-oauth-trigger-button');
        if (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                var id = e.target.getAttribute('data-id');

                var oauthWindow = window.open("index.php?option=com_eventgallery&view=googlephotos&layout=getauthtoken&tmpl=component&id=" + id, "_blank", "width=700,height=400");
                if (!oauthWindow || oauthWindow.closed || typeof oauthWindow.closed === 'undefined') {
                    alert('Failed');
                }
            });
        }

    });

})();
