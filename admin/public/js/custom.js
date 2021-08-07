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
                                "<td><a href='' ><i class='fas fa-edit'></i></a></td>" +
                                "<td><a data-id='" +
                                jsonData[i].id +
                                "' class='serviceDeleteBtn' href='' ><i class='fas fa-trash-alt'></i></a></td>"
                        )
                        .appendTo("#service_table");

                        $(".serviceDeleteBtn").click(function(){

                            var id = $(this).data["id"];
                            
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

