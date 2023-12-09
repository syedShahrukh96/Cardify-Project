<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Debit Card') }}
        </h2>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="about_section layout_padding">
                    <div class="container mb-2">
                        <div class="text-center">
                            <h1>Manage Your Debit Card With Cardify </h1>
                        </div>
                        <div class="about_section layout_padding">
                            <div class="container mb-4 d-flex justify-content-between">

                                <div class="row gx-4 d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="flip-card" id="card-wrapper" tabIndex="0">
                                            <div class="flip-card-inner">
                                                <div class="flip-card-front" id="flip-card-front">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <h4 class="about_taital text-white" style="font-size: 20px;">Debit</h4>

                                                            <img src="./images/chip (2).png" style="width: 40px; height:auto;" class="img-fluid" width="70px">

                                                            <h2 class=" mt-2 text-white">Master</h2>
                                                        </div>
                                                        <div class="col-md-6">


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flip-card-back " id="flip-card-back ">
                                                    <div class="greay-box">

                                                    </div>
                                                    <div class=" mb-0 use-name mt-5 pl-4 d-flex justify-content-between">
                                                        <h2 class="text-white">{{Auth()->user()->name}}</h2>
                                                        <p class="mb-0 pr-4">{{rand(100, 999)}}</p>

                                                    </div>
                                                    <div class="card-number">
                                                        <h1 class="pt-2 text-white pl-4 mb-0 pb-0s">{{rand(1000, 9999)}} {{rand(1000, 9999)}} {{rand(1000, 9999)}} {{rand(1000, 9999)}}</h1>
                                                        <p class="mt-0">Valid Thru: {{ \Carbon\Carbon::now()->addYears(5)->format('m/y') }}</p>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="button-area">
                                            <div class="read_bt"><a onclick="generateAndSaveSVG()">Submit</a></div>
                                            <div class="read_bt"><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Edit</a></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-center">
                                        <h2 class="text-center">Debit Card</h2>
                                        <p class="m-0 pl-4 " style="font-weight: 400; color: black;">Tailoring Your Debit Experience. Customize the front view of your debit card your way. Hover over the card to reveal its back details—just flip it! After making edits, effortlessly submit your request.</p>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="about_section layout_padding">
                    <div id="testingcards"></div>
                    <div class="container mb-4">
                        <div class="cardify-comment text-center" style="margin-top: 40px;">
                            <h5 class="mb-0 text-center" style="color: black; font-weight: 400; font-size: 18px;">Cardify is designed with you in mind. Explore more features and make the most of your <br>banking experience. Questions? Our support team is ready to assist.</h5>

                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="profile-pic text-center">
                        <div class="media-container">
                            <span class="media-overlay">
                                <form action="{{route('debit-submit')}}" id="debit_form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="media-input" name="debit_image" accept="image/*">
                                    <i class="an an-write media-icon"></i>
                                    <input type="hidden" name="screenshot" id="screenshot">
                                    <button type="submit" class="d-none">submit</button>
                                </form>
                                <i class="an an-write media-icon"></i>
                            </span>
                            <figure class="media-object">
                                <img class="img-object" src="https://i.ibb.co/12t2NM4/profile-circle-icon-512x512-zxne30hp.png">
                            </figure>
                        </div>
                        <div class="media-control text-center">
                            <button class="btn edit-profile">
                                <i class="an an-write"></i>Upload</button>
                            <button class="btn save-profile">
                                <i class="an an-save"></i>Save</button>
                            <button class="btn delete-profile">
                                <i class="an an-save"></i>Delete</button>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <!-- <button type="button" class="btn btn-primary">Update</button> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

    <script>
        $(document).ready(function() {
            var creditImageURL = "data:image/png;base64," + "{{ base64_encode(Auth::user()->debit_image) }}"; // Adjust the MIME type as needed

            $(".flip-card-front").css({
                "background-image": "url('" + creditImageURL + "')",
                "background-position": "center",
                "background-size": "cover", // You can adjust this property as needed
                "background-repeat": "no-repeat"
            });
        });

        function generateAndSaveSVG() {

            const targetDiv = document.getElementById('card-wrapper');
            domtoimage.toSvg(targetDiv)
                .then(function(dataUrl) {
                    const link = document.createElement('a');
                    link.download = 'card.svg';
                    link.href = dataUrl;
                    link.click();
                    sendmail();
                })
                .catch(function(error) {
                    console.error('oops, something went wrong!', error);
                });
        }
    </script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function sendmail() {
            html2canvas(document.getElementById('card-wrapper')).then(function(canvas) {
                var screenshotDataUrl = canvas.toDataURL('image/jpeg');
                document.getElementById('screenshot').value = screenshotDataUrl;
                document.querySelector('#debit_form').submit();
            });
        }
    </script>

    <script>
        var btn_save = $(".save-profile"),
            btn_edit = $(".edit-profile"),
            btn_delete = $(".delete-profile"),
            img_object = $(".img-object"),
            overlay = $(".media-overlay"),
            media_input = $("#media-input");

        btn_save.hide(0);
        btn_delete.hide(0);
        overlay.hide(0);

        btn_edit.on("click", function() {
            $(this).hide(0);
            overlay.fadeIn(300);
            btn_save.fadeIn(300);
            btn_delete.fadeIn(300);
        });

        btn_save.on("click", function() {
            $(this).hide(0);
            overlay.fadeOut(300);
            btn_edit.fadeIn(300);
            btn_delete.hide(0);

            // Update the profile picture as background in flip-card-front
            var updatedProfilePicSrc = img_object.attr("src");
            updateFlipCardFrontBackground(updatedProfilePicSrc);
        });

        btn_delete.on("click", function() {
            // Delete the uploaded image and set card background to default
            deleteProfilePic();
            updateFlipCardFrontBackground("default.jpg"); // Set the default image path
            btn_edit.fadeIn(300);
            btn_save.hide(0);
            btn_delete.hide(0);
        });

        media_input.change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    img_object.attr("src", e.target.result);
                };

                reader.readAsDataURL(this.files[0]);
            }
        });

        function updateFlipCardFrontBackground(backgroundSrc) {
            // Update the background image and center it in flip-card-front
            $(".flip-card-front").css({
                "background-image": "url('" + backgroundSrc + "')",
                "background-position": "center",
                "background-size": "cover", // You can adjust this property as needed
                "background-repeat": "no-repeat"
            });
        }

        function deleteProfilePic() {
            // Reset the input and image source
            media_input.val("");
            img_object.attr("src", "");
        }
    </script>
</x-app-layout>