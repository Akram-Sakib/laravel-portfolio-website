@extends("Layout.app")

@section("title","Contact")

@section("content")

<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <h1 class="page-top-title mt-3">Contact</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            
        <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1486337.7811429705!2d90.38672932433846!3d23.54849209544682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b7aba09d5aff%3A0xce98e5bc6fd9d131!2z4Kah4KeH4Kau4Kaw4Ka-LCDgpqLgpr7gppXgpr4!5e0!3m2!1sbn!2sbd!4v1628788479688!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
        <div class="col-md-6">
            
        <h5 class="service-card-title">Contact</h5>
                <div class="form-group ">
                    <input id="contactNameId" type="text" class="form-control w-100" placeholder="Your name">
                </div>
                <div class="form-group">
                    <input id="contactMobileId" type="text" class="form-control  w-100" placeholder="Mobile no.">
                </div>
                <div class="form-group">
                    <input id="contactEmailId" type="text" class="form-control  w-100" placeholder="Email">
                </div>
                <div class="form-group">
                    <input id="contactMsgId" type="text" class="form-control  w-100" placeholder="Message">
                </div>
                <a id="contactSendBtnID" class="btn btn-block normal-btn w-100">Send</a>
                

        </div>
    </div>
</div>

@endsection