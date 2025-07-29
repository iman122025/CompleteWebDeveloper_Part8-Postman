var api = "http://localhost/myproject/api/employee/allemployees.php";

$("#view-employees").on("click", function () {
    var button = $(this);
    $.ajax({
        url: api,
        method: "GET",
        cache: false,
        dataType: "json",
    })
        .always(function () {
            $(button).html("Load Employees Data...");
        })
        .done(function (evt) {
            // Disable button
            $(button).prop("disabled", true);
            // Set timeout for lazy loading
            setTimeout(function () {
                var result = evt;

                var html = "<h2 class='data-title'>Data Employees</h2>";

                html += '<div class="tables-employees-content">';
                console.log(result);
                if (result) {
                    console.log(result);
                    html +=
                        '<table class="table table-striped table-bordered table-hover align-middle text-center">' +
                        "<thead>" +
                        "<tr>" +
                        '<th scope="col">Name</th>' +
                        '<th scope="col">Position</th>' +
                        '<th scope="col">Experience</th>' +
                        '<th scope="col">Salary</th>' +
                        "</tr>" +
                        "</thead>" +
                        "<tbody>";

                    for (var i = 0; i < result.length; i++) {
                        html +=
                            "<tr>" +
                            '<td scope="row">' +
                            result[i].name +
                            "</td>" +
                            "<td>" +
                            result[i].position +
                            "</td>" +
                            "<td>" +
                            result[i].experience +
                            "</td>" +
                            "<td>" +
                            result[i].salary +
                            "</td>" +
                            "</tr>";
                    }
                    html += "</tbody></table>";
                }

                html += "</div>";

                // Set all content
                $(".table-employees").html(html);
            }, 1000);
        })
        .fail(function () {
            alert("Error : Failed to reach API Url or check your connection");
            $(button).prop("disabled", false);
        })
        .then(function (evt) {
            setTimeout(function () {
                $(button).css({ "background-color": "#ccc" }).hide();
            }, 1000);
        });
});

$("#create-new").on("click", function (e) {
    e.preventDefault();
    console.log("Create button clicked");
    let sampleForm = document.getElementById("sample-form");

    let formFields = new FormData(sampleForm);

    var settings = {
        url: "http://localhost/myproject/api/employee/create.php",
        method: "POST",
        timeout: 0,
        processData: false,
        mimeType: "multipart/form-data",
        contentType: false,
        data: formFields,
    };

    $.ajax(settings)
        .done(function (response) {
            console.log(response);
            Swal.fire({
                title: "Sweet!",
                text: "Created.",
                imageUrl: "https://i.imgur.com/4NZ6uLY.jpg",
            }).then(() => {
                sampleForm.reset();
                window.location.href = "index.html";
            });
        })
        .fail(function () {
            Swal.fire(
                "Error",
                "Failed to submit. Please check your connection or the create.php file.",
                "error"
            );
        });
});
