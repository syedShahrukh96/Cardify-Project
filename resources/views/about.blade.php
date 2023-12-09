<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="about_section layout_padding">
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>About Us</h1>
                                <p class="m-0" style="color: black; font-weight: 400;">
                                    Introducing Cardify, the ultimate app/website that empowers you to personalize and request customized Credit/Debit cards like never before. With dedicated sections for both credit and debit cards, Cardify gives you the freedom to customize your cards according to your unique style and preferences.<br><br>
                                    Our user-friendly platform is designed to make the customization process seamless. You have the power to personalize your cards by uploading any image you want to be displayed, allowing you to carry your favorite memories, designs, or artwork right in your wallet.<br><br>
                                    At Cardify, we believe in putting the control in your hands, ensuring that your banking experience reflects your individuality. Dive into the world of personalized banking with Cardify</p>
                                <div class="read_bt"><a href="#">Read More</a></div>
                            </div>
                            <div class="col-md-6">
                                <div><img src="images/debit_cards.jpg" class="image_1"></div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--about section end -->

                <div class="cardify-comment text-center" style="margin-top: 40px;">
                    <h5 class="mb-0 text-center" style="color: black; font-weight: 400; font-size: 18px;">Cardify is designed with you in mind. Explore more features and make the most of your <br>banking experience. Questions? Our support team is ready to assist.</h5>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>