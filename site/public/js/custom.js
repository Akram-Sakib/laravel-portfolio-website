// Owl Carousel Start..................



$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});








// Owl Carousel End..................

//Contact Send

$("#contactSendBtnID").click(function() {
    
    var contactName     = $("#contactNameId").val();
    var contactMobileId = $("#contactMobileId").val();
    var contactEmailId  = $("#contactEmailId").val();
    var contactMsgId    = $("#contactMsgId").val();

    sendContact(contactName,contactMobileId,contactEmailId,contactMsgId);
});

function sendContact(contact_name, contact_mobile, contact_email, contact_msg) {
    if (contact_name.length == 0) {
        $("#contactSendBtnID").html("আপনার নাম লিখুন !");
        setTimeout(function () {
            $("#contactSendBtnID").html("পাঠিয়ে দিন");
        }, 3000);  
    } else if (contact_mobile.length == 0) {
        $("#contactSendBtnID").html("আপনার মোবাইল নং লিখুন !");
        setTimeout(function () {
            $("#contactSendBtnID").html("পাঠিয়ে দিন");
        }, 3000); 
    } else if (contact_email.length == 0) {
        $("#contactSendBtnID").html("আপনার ইমেইল লিখুন !");
        setTimeout(function () {
            $("#contactSendBtnID").html("পাঠিয়ে দিন");
        }, 3000); 
    } else if (contact_msg.length == 0) {
        $("#contactSendBtnID").html("আপনার ম্যাসেজ লিখুন !");
        setTimeout(function () {
            $("#contactSendBtnID").html("পাঠিয়ে দিন");
        }, 3000); 
    }else{

        $("#contactSendBtnID").html("পাঠানো হচ্ছে...");

        axios
            .post("/contactSend", {
                contact_name: contact_name,
                contact_mobile: contact_mobile,
                contact_email: contact_email,
                contact_msg: contact_msg,
            })
            .then(function (response) {
                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#contactSendBtnID").html("অনুরোধ সফল হয়েছে !");
                        setTimeout(function () {
                            $("#contactSendBtnID").html("পাঠিয়ে দিন");
                        }, 2000);
                        setTimeout(function () {
                            $("#contactNameId").val("");
                        }, 1);
                        setTimeout(function () {
                            $("#contactMobileId").val("");
                        }, 1);
                        setTimeout(function () {
                            $("#contactEmailId").val("");
                        }, 1);
                        setTimeout(function () {
                            $("#contactMsgId").val("");
                        }, 1);
                    }else{
                        $("#contactSendBtnID").html(
                            "অনুরোধ ব্যর্থ হয়েছে ! আবার চেষ্টা করুন !"
                        );
                        setTimeout(function () {
                            $("#contactSendBtnID").html("পাঠিয়ে দিন");
                        }, 2000);
                    }
                }else{
                    $("#contactSendBtnID").html(
                        "অনুরোধ ব্যর্থ হয়েছে ! আবার চেষ্টা করুন !"
                    );
                    setTimeout(function () {
                        $("#contactSendBtnID").html("পাঠিয়ে দিন");
                    }, 2000);
                }
                
            })
            .catch(function (error) {
                $("#contactSendBtnID").html("আবার চেষ্টা করুন !");
                setTimeout(function () {
                    $("#contactSendBtnID").html("পাঠিয়ে দিন");
                }, 3000); 
            });
    }
}