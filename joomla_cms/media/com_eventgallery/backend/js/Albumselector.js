const template = document.createElement('template');
template.innerHTML = `
  <style>
    .list {
      font-family:sans-serif;
      margin:0;
      padding:20px 0 0;
    }
    
    table {
    width: 100%;
    }
    
    tr:nth-child(even) {background: #EEE}
    tr:nth-child(odd) {}
    
    img {
      max-width: 100%;
    }
    input {
      border:solid 1px #ccc;
      border-radius: 5px;
      padding:7px 14px;
      margin-bottom:10px
    }
    input:focus {
      outline:none;
      border-color:#aaa;
    }
    .sort {
      padding:8px 30px;
      border-radius: 6px;
      border:none;
      display:inline-block;
      color:#fff;
      text-decoration: none;
      background-color: #28a8e0;
    }
    .sort:hover {
      text-decoration: none;
      background-color:#1b8aba;
    }
    .sort:focus {
      outline:none;
    }
    .sort:after {
      width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-bottom: 5px solid transparent;
      content:"";
      position: relative;
      top:-10px;
      right:-5px;
    }
    .sort.asc:after {
      width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-top: 5px solid #fff;
      content:"";
      position: relative;
      top:13px;
      right:-5px;
    }
    .sort.desc:after {
      width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-bottom: 5px solid #fff;
      content:"";
      position: relative;
      top:-10px;
      right:-5px;
    }
  </style>
 
    <div id="albumlist">
    
      <input class="search" />
      <span class="sort" data-sort="title">Sort by title</span>
      <span class="sort" data-sort="mediaItemsCount">Sort by count</span>
    
      <table class="list">
      </table>
      
    </div>

    <div id="loading" class="well">
        <p id="loading_label"></p>
    </div>
  
`;


import List from 'list.js';

class Albumselector extends HTMLElement {
    constructor() {
        super();
        this._shadowRoot = this.attachShadow({mode: 'open'});
        this._shadowRoot.appendChild(template.content.cloneNode(true));
        this.$loadingLabel = this._shadowRoot.querySelector('#loading_label');
        this.$loading = this._shadowRoot.querySelector('#loading');
        this.$albumlist = this._shadowRoot.querySelector('#albumlist');

        this['accountid'] = 1;

        //the url for the iframe can't be changed dynamically, so we need to grab this from the parent.
        let element = parent.document.getElementById('foldertype_4_account');
        if (element) {
            this['accountid'] = element.value;
        }

    }

    getData() {

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                let data = JSON.parse(xhr.response);
                this.createTable(data.albums);
            }
        };

        xhr.open('GET', this.url +'&id=' + this.accountid, true);
        xhr.send('');
    }

    createTable(albums) {


        var options = {
            page: 5000,
            valueNames: [
                    {name: 'previewThumbnail', attr: 'src'},
                    {name: 'encodedTitle', attr: 'data-title'},
                    {name: 'albumid', attr: 'data-albumid'},
                    'title',
                    'mediaItemsCount',
                    {name: 'link', attr: 'href'}
                ],
            item: '<tr>' +
                '<td><button class="encodedTitle albumid" data-title="" data-albumid="">Select</button></td>' +
                '<td><img class="previewThumbnail" src=""></td>' +
                '<td><span class="title"></span></td>'+
                '<td><span class="mediaItemsCount"></span></td>'+
                '<td><a class="link" href="" target="_blank">Link</a></td>'+
                '</tr>'
        };

        let values = [];

        for (let i = 0; i < albums.length; i++) {
            let album = albums[i];

            values.push(
               {
                   previewThumbnail: album.coverPhotoBaseUrl + '=w200-h200',
                   encodedTitle: encodeURI(album.title),
                   title: album.title,
                   mediaItemsCount: album.mediaItemsCount,
                   albumid: album.id,
                   link: album.productUrl
               }
           );
        }

        let myList = new List(this.$albumlist, options);

        myList.add(values, () => {
            let buttons = this._shadowRoot.querySelectorAll('button.albumid');
            for(let i=0; i<buttons.length;i++) {
                let button = buttons[i];
                button.addEventListener('click', (e)=> {
                    e.preventDefault();
                    e.stopPropagation();

                    let data = {
                        albumid: button.getAttribute("data-albumid"),
                        title: decodeURI(button.getAttribute("data-title"))
                    };

                    parent.postMessage('eventgalleryGooglePhotosAlbum_' + JSON.stringify(data), '*');
                })
            }
        });

        this.$loading.style.display = 'none';
    }

    static get observedAttributes() {
        return ['label', 'url'];
    }

    attributeChangedCallback(name, oldVal, newVal) {
        this[name] = newVal;
    }

    connectedCallback() {
        this.$loadingLabel.innerHTML = this.label;
        this.getData();
    }

}


window.customElements.define('album-selector', Albumselector);