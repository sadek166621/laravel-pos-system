
//----------Start brands Module----------

$(function(){
    $("#addbrandform").on("submit", function(e){
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();

        $.ajax({

            url: url,
            data: data,
            type: type,
            dataType: "JSON",
            success: function(data){
                if(data == "success"){
                    $("#addBrand").modal("hide");
                    swal("Great", "Successfully Brands Data Inputed", "success");
                    form[0].reset();
                    return getBrandData();
                }
            },

        });

    });


    function getBrandData(){
        var url = $("#getalldata").data("url");

        $.ajax({
            url: url,
            type: "get",
            dataType: "HTMl",
            success: function(response){
                $("#showAllBrandsHere").html(response);
            }
        })
    }


    // Edit
    $(document).on("click", "#edit", function(arg){
        arg.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");

        $.ajax({
            url: url,
            data: {id:id},
            dataType:"JSON",
            type: "GET",
            success: function(response){
                $("#UpdateBrand").modal("show");
                $("#brands").val(response.brands);
                $("#brandid").val(response.id);
                $("#updatebrandtitle").text("Update " + response.brands + "'s Data");
            }
        })

    });



    $("#updatebrandform").on("submit", function(arg){
        arg.preventDefault();
        var form =$(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();

        $.ajax({
            url: url,
            type: type,
            dataType: "JSON",
            data: data,
            success: function(response){
                if(response == "success"){
                    swal("Data Updated", "Success", "success");
                    $("#UpdateBrand").modal("hide");
                    return getBrandData();
                }
            },
        });

    });


    $(document).on("click", ".pagination li a", function(e){
        e.preventDefault();
        var page = $(this).attr("href");
        var pagenumber = page.split("?page=")[1];
        return getPagination(pagenumber);
    });

    function getPagination(pagenumber){
        var geturl = $("#getalldatabypagination").data("url");
        var url = geturl+"?page=" + pagenumber;

        $.ajax({
            url: url,
            type: "GET",
            dataType: "HTML",
            success: function(response){
                $("#showAllBrandsHere").html(response);
            }
        });
    }


});
//----------Start End brand Module----------
