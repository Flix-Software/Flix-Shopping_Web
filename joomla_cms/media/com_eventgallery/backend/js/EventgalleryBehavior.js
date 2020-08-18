(function(Eventgallery){

    document.addEventListener('DOMContentLoaded', () =>{

        let googlePhotosProcessor = new Eventgallery.GooglePhotosProcessor();
        googlePhotosProcessor.processImages();

    });

})(Eventgallery);
