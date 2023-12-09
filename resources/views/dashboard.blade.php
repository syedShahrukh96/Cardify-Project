<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="about_section layout_padding">
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 style="font-weight: bold; text-transform: uppercase;">Welcome to Cardify</h1>
                                <h3 class="m-0 fs-2" style="color: black; font-weight: 400; font-size: 18px;">Welcome to our ATM Card Editing App! To get started, please select the card you'd like to edit by clicking on <br>it. You can manage both your debit and credit cards from this home page. Simply choose the card<br> you wish to update, and let's make your banking experience even better!</h3>
                            </div>
                        </div>
                    </div>

                    <div class="container mb-4">
                        <div class="row mx-auto my-auto">
                            <div class="col-md-5">
                                <div class="credit-area p-4 ">
                                    <h4 class="about_taital" style="font-size: 20px;">Credit card</h4>
                                    <img src="./images/chip (2).png" style="width: 40px; height:auto;" class="img-fluid pb-4 credit-img">

                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="read_bt"><a href="{{ route('credit') }}">Credit</a></div>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-md-5  ">
                                <div class="debit-area p-4">
                                    <h4 class="about_taital"  style="font-size: 20px;">Debit card</h4>
                                    <img src="./images/chip (2).png" style="width: 30px; height:auto;" class="img-fluid pb-4 credit-img">

                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="read_bt"><a href="{{ route('debit') }}">Debit</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="cardify-comment text-center mt-5">
                                    <h3 class="mb-0 text-center">Cardify is designed with you in mind. Explore more features and make the most of your <br>banking experience. Questions? Our support team is ready to assist.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>