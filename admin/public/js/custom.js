$(document).ready(function () {
$('#VisitorDt').DataTable();
$('.dataTables_length').addClass('bs-select');
});


function getServiceData() {
    
    axios
        .get("/getservicedata")
        .then(function (response) {
            if (response.status == 200) {
                $("#mainDiv").removeClass("d-none");
                $("#loadingDiv").addClass("d-none");
                $("#service_table").empty();
                
                //Service Data-table
                var jsonData = response.data;
                $.each(jsonData, function (i, item) {
                    $("<tr>")
                        .html(
                            "<td><img class='table-img' src='" +
                                jsonData[i].service_img +
                                "'></td>" +
                                "<td>" +
                                jsonData[i].service_name +
                                "</td>" +
                                "<td>" +
                                jsonData[i].service_des +
                                "</td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='serviceEditBtn' ><i class='fas fa-edit'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='serviceDeleteBtn' ><i class='fas fa-trash-alt'></i></a></td>"
                        )
                        .appendTo("#service_table");

                    //Service Table Icon Click
                    $(".serviceDeleteBtn").click(function () {
                        var id = $(this).data("id");
                        $("#serviceDeleteId").html(id);
                        $("#deleteModal").modal("show");
                    });

                    //Services table edit icon
                    $(".serviceEditBtn").click(function () {
                        var id = $(this).data("id");

                        $("#serviceEditId").html(id);
                        ServiceDetails(id);
                        $("#editModel").modal("show");
                    });

                    

                });

            }else{
                $("#loadingDiv").addClass("d-none");
                $("#errorDiv").removeClass("d-none");
            }

        })
        .catch(function (error) {
            $("#loadingDiv").addClass("d-none");
            $("#errorDiv").removeClass("d-none");
        });

}


    //Service Delete Modal Yes button
    $("#serviceDeleteConfirmBTN").click(function () {
        var id = $("#serviceDeleteId").html();
        getServiceDelete(id);
    });

    
//Service Delete
function getServiceDelete(deleteId) {

    $("#serviceDeleteConfirmBTN").html(
        "<div class='spinner-border spinner-border-sm' role='status'></div>"
    ); //Loading Animation

    axios.post("/servicedelete",{id:deleteId})
    .then(function(response){
        
        $("#serviceDeleteConfirmBTN").html("Yes");
        if (response.status == 200) {

            if (response.data == 1) {
                $("#deleteModal").modal("hide");
                //Toaster Msg
                getServiceData();
            } else {
                $("#deleteModal").modal("hide");
                //Toaster Msg
                getServiceData();
            }

        }else{
            $("#deleteModal").modal("hide");
            //Toaster Msg
        }
        
    }).catch(function(error){
        $("#deleteModal").modal("hide");
        //Toaster Msg
    });
}

//Each Service Update Details
function ServiceDetails(detailsId) {
    axios
        .post("/serviceDetails", { id: detailsId })

        .then(function (response) {
            if (response.status == 200) {
                $("#serviceEditLoader").addClass("d-none");
                $("#serviceEditForm").removeClass("d-none");
                var jsonData = response.data
                $("#serviceNameId").val(jsonData[0].service_name);
                $("#serviceDesId").val(jsonData[0].service_des);
                $("#serviceImageId").val(jsonData[0].service_img);
            }else{
                $("#serviceEditLoader").addClass("d-none");
                $("#serviceEditWrong").removeClass("d-none");
            }
        })
        .catch(function (error) {
            $("#serviceEditLoader").addClass("d-none");
            $("#serviceEditWrong").removeClass("d-none");
        });
}

    //Service Edit Save BTN
    $("#serviceEditConfirmBTN").click(function () {
        var id = $("#serviceEditId").html();
        var name = $("#serviceNameId").val();
        var des = $("#serviceDesId").val();
        var img = $("#serviceImageId").val();
        ServiceUpdateDetails(id, name, des, img);
    });

//Service Update
function ServiceUpdateDetails(serviceId,serviceName,serviceDes,serviceImg) {
    if (serviceName.length == 0) {
        //Toaster Msg
    } else if (serviceDes.length == 0) {
        //Toaster Msg
    } else if (serviceImg.length == 0) {
        //Toaster Msg
    } else {

        $("#serviceEditConfirmBTN").html(
            "<div class='spinner-border spinner-border-sm' role='status'></div>"
        ); //Loading Animation

        axios
            .post("/serviceUpdate", {
                id: serviceId,
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })

            .then(function (response) {

                $("#serviceEditConfirmBTN").html("Save");

                if (response.status == 200) {

                    if (response.data == 1) {
                        $("#editModel").modal("hide");
                        //Toaster Msg
                        getServiceData();
                    } else {
                        $("#editModel").modal("hide");
                        //Toaster Msg
                        getServiceData();
                    }
                } else {
                    $("#editModel").modal("hide");
                    //Toaster Msg
                }
            })
            .catch(function (error) {
                $("#editModel").modal("hide");
                //Toaster Msg
            });
    }
}




/* Toast */

// ;(function(window, $){
//   "use strict";

//   var defaultConfig = {
//     type: '',
//     autoDismiss: false,
//     container: '#toasts',
//     autoDismissDelay: 4000,
//     transitionDuration: 500
//   };

//   $.toast = function(config){
//     var size = arguments.length;
//     var isString = typeof(config) === 'string';
    
//     if(isString && size === 1){
//       config = {
//         message: config
//       };
//     }

//     if(isString && size === 2){
//       config = {
//         message: arguments[1],
//         type: arguments[0]
//       };
//     }
    
//     return new toast(config);
//   };

//   var toast = function(config){
//     config = $.extend({}, defaultConfig, config);
//     // show "x" or not
//     var close = config.autoDismiss ? '' : '&times;';
    
//     // toast template
//     var toast = $([
//       '<div class="toast ' + config.type + '">',
//       '<p>' + config.message + '</p>',
//       '<div class="close">' + close + '</div>',
//       '</div>'
//     ].join(''));
    
//     // handle dismiss
//     toast.find('.close').on('click', function(){
//       var toast = $(this).parent();

//       toast.addClass('hide');

//       setTimeout(function(){
//         toast.remove();
//       }, config.transitionDuration);
//     });
    
//     // append toast to toasts container
//     $(config.container).append(toast);
    
//     // transition in
//     setTimeout(function(){
//       toast.addClass('show');
//     }, config.transitionDuration);

//     // if auto-dismiss, start counting
//     if(config.autoDismiss){
//       setTimeout(function(){
//         toast.find('.close').click();
//       }, config.autoDismissDelay);
//     }

//     return this;
//   };
  
// })(window, jQuery);

// /* ---- start demo code ---- */

// var count = 1;
// var types = ['default', 'error', 'warning', 'info'];

// $('button').click(function(){
//   var data = this.dataset;

//   switch(data.type){
//     case 'types':
//       $.toast(data.kind, 'This is a ' + data.kind + ' toast.');
//       break;
//     case 'html':
//       $.toast('<div class="custom-toast"><img src="https://dysfunc.github.io/animat.io/images/ron_burgundy.png"><p>You stay classy San Deigo</p></div>');
//       break;

//     case 'auto':
//       $.toast({
//         autoDismiss: true,
//         message: 'This is my auto-dismiss toast message'
//       });

//       break;
      
//     default:
//        $.toast('Hello there!');
//   }
// });


/* ---- end demo code ---- */