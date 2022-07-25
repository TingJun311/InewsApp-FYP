<div wire:init="getArticles">
    <div wire:loading>
        <div class="text-center" style="width: 100%; height: 100%">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    @unless ($data == null)
        <div id="background" class="text-center overflow-hidden">
            <img 
                src="{{ $data['article']['top_image'] }}" 
                alt="{{ $data['article']['title'] }}" 
                data-source="{{ $data['article']['source_url'] }}" 
                class="img-fluid " 
                id="myImg">
        </div>
        <br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-10">

                    <h2 class="m-5 float-start">{{ $data['article']['title'] }}</h2>
                </div>
                <div class="col-2 d-flex align-items-center text-center">
                    <button wire:click="bookmark">Bookmark</button>
                </div>
            </div>
        </div>

        <div class="d-flex flex-row justify-content-center">
            <div class="p-5">
                <h4>Summary</h4>
                <p>
                    {{ $data['article']['text'] }}
                </p>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-evenly mb-3 ">
            <div class="p-2">
                <h5>Author</h5>
                <p>
                    {{ $data['article']['authors'][0] }}
                </p>
            </div>
            <div class="p-2">
                <h5>Published date</h5>
                <p>
                    {{ $data['article']['published'] }}
                </p>
            </div>
            <div class="p-2">
                <h5>Source</h5>
                <p>
                    {{ $data['article']['source_url'] }}
                </p>
            </div>
            <div class="p-2">
                <h5>Description</h5>
                <p>
                    {{ $data['article']['meta_description'] }}
                </p>
            </div>
        </div>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption">
            </div>
        </div>
    @endunless
    <style>
        #background {
            background-position: center;
            background-size: cover;
            background: black;
            height: 400px; 
            max-width: 100%;
            filter: brightness(70%);
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            }

        #myImg:hover {
            opacity: 0.7;
        }

            /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

            /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

            /* Add Animation - Zoom in the Modal */
        .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

            /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <a href=""></a>
    <script>
        // Get the modal
        const modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        const img = document.getElementById("myImg");
        const modalImg = document.getElementById("img01");
        const captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = `Source: <a href="${this.dataset.source}">${this.dataset.source}</a>`;
        }

        // Get the <span> element that closes the modal
        const span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
</div>
