$(document).ready(() => {

    let model_price;
    let roofout_price = 0;
    let roofin_price = 0;
    let wallout_price = 0;
    let wallin_price = 0;
    let floor_price = 0;
    let totalprice;


    // MODEL SELECTION FUNCTION
    $(document).on("click", ".selectModel", function () {
        $(".loadingDiv").removeClass("d-none");
        console.log($(this));
        let modelId = $(this).data('modelid');
        $('.model_id').val(modelId);

        $(".selectModel").find("input[type='radio']").removeAttr("checked");
        // $('.total-price').val($(this).data('price'));

        // console.log(modelId);

        for (let i = 1; i < 5; i++)
            hideModel(`Model ${i}`);

        $(this).find("input[type='radio']").attr("checked", "checked");

        showModel(modelId);

        setTimeout(() => $(".loadingDiv").addClass("d-none"), 500);

        roofout_price = 0;
        roofin_price = 0;
        wallout_price = 0;
        wallin_price = 0;
        floor_price = 0;
        if (modelId == "Model 1") {

            $(".popup-btn[data-tab='.generator-div']").addClass("d-none");
            $(".popup-btn[data-tab='.roof-div'], .glassFrame").removeClass("d-none");
            $(".popup-btn[data-tab='.door-div'], .door-div").removeClass("d-none");
            $(".popup-btn[data-tab='.door-div']").removeClass("d-none");

            $("#Door").attr("data-propname", "no window");
            $("#Glass").attr("data-propname", "windows");
            $(".popup-btn[data-tab='.roof-div']").trigger("click");
        } else if (modelId == "Model 2") {

            $(".popup-btn[data-tab='.roof-div']").addClass("d-none");
            $(".popup-btn[data-tab='.generator-div']").removeClass("d-none");
            $(".popup-btn[data-tab='.door-div'], .door-div").removeClass("d-none");
            $(".popup-btn[data-tab='.door-div']").removeClass("d-none");

            $("#Door").attr("data-propname", "door");
            $("#Glass").attr("data-propname", "window glass");
            $(".popup-btn[data-tab='.wall-div']").trigger("click");
        } else if (modelId == "Model 3") {
            $(".popup-btn[data-tab='.door-div'], .door-div").addClass("d-none");
            $(".popup-btn[data-tab='.generator-div']").addClass("d-none");
            $(".popup-btn[data-tab='.door-div']").addClass("d-none");

            $(".popup-btn[data-tab='.roof-div'], .glassFrame").removeClass("d-none");
            $("#Glass").attr("data-propname", "window glasses");
            $(".popup-btn[data-tab='.roof-div'], .popup-btn[data-tab='.window-div'] ").trigger("click");
        } else if (modelId == "Model 4") {

            // $(".popup-btn[data-tab='.roof-div'], .glassFrame").removeClass("d-none");
            $(".popup-btn[data-tab='.door-div'], .door-div").addClass("d-none");

            // $(".popup-btn[data-tab='.generator-div']").removeClass("d-none");
            $("#Glass").attr("data-propname", "window frame.002");
            $(".popup-btn[data-tab='.window-div'] ").trigger("click");
        }

    });

    // TOGGLING TABS FUNCTION
    $(document).on("click", ".materials .popup-btn", function () {
        $(".materials .popup-btn").removeClass("active-btn");
        $(this).addClass("active-btn");

        $(".textures").addClass("d-none");
        $($(this).data('tab')).removeClass("d-none");
        $(".textures").css("opacity", "0.7")
        setTimeout(() => $(".textures").css("opacity", "1"), 100);
    })


    // TOGGLING INNER TABS FUNCTION
    $(document).on("click", ".inner-btn", function () {
        $(this).parent().find(".inner-btn").removeClass("active-btn");
        $(this).addClass("active-btn");
        $(".textures").css("opacity", "0.5")
        setTimeout(() => $(".textures").css("opacity", "1"), 100);
    })

    $(document).on("click", ".roof-div .inner-btn", function () {
        $(this).parent().find(".inner-btn").removeClass("active-btn");
        $(this).addClass("active-btn");
        $(".roof").css("opacity", "0.5")
        setTimeout(() => $(".roof").css("opacity", "1"), 100);
    })

    // TOGGLING INNNER/OUTTER ROOF FUNCTION
    $(document).on("click", ".out-roof", () => {
        $(".roof").removeClass("roof-in")
        $(".roof").addClass("roof-out")
    })
    $(document).on("click", ".in-roof", () => {
        $(".roof").removeClass("roof-out")
        $(".roof").addClass("roof-in")
    })

    // APPLYING TEXTURE TO OUTTER ROOF FUNCTION
    $(document).on("click", ".roof-out", function () {
        var imgsrc = $(this).data('url');
        $('.roof_texture').val(imgsrc);
        $(".roof").find("input[type='radio']").removeAttr("checked");
        setImage('ROOF', imgsrc);
        $(this).find("input[type='radio']").attr("checked", "checked");
    });

    // APPLYING TEXTURE TO INNER ROOF FUNCTION
    $(document).on("click", ".roof-in", function () {
        var imgsrc = $(this).data('url');
        $('.roof_wood').val(imgsrc);
        $(".roof").find("input[type='radio']").removeAttr("checked");
        setImage('Roof Wood', imgsrc);
        $(this).find("input[type='radio']").attr("checked", "checked");
    });


    // TOGGLING INNNER/OUTTER WALL FUNCTION
    $(document).on("click", ".out-wall", () => {
        $(".wall").removeClass("wall-in")
        $(".wall").addClass("wall-out")
    })
    $(document).on("click", ".in-wall", () => {
        $(".wall").removeClass("wall-out")
        $(".wall").addClass("wall-in")
    })

    // APPLYING TEXTURE TO OUTTER WALL FUNCTION
    $(document).on("click", ".wall-out", function () {
        var imgsrc = $(this).data('url');
        $('.outer_wall').val(imgsrc);
        $(".wall").find("input[type='radio']").removeAttr("checked");
        setImage('eXTERIOR', imgsrc);
        $(this).find("input[type='radio']").attr("checked", "checked");
    });

    // APPLYING TEXTURE TO INNER WALL FUNCTION
    $(document).on("click", ".wall-in", function () {
        var imgsrc = $(this).data('url');
        $('.inner_wall').val(imgsrc);
        $(".wall").find("input[type='radio']").removeAttr("checked");
        setImage('interior', imgsrc);
        $(this).find("input[type='radio']").attr("checked", "checked");
    });


    // TOGGLING TABS FUNCTION
    $(document).on("click", ".door-wind .popup-btn", function () {
        $(".door-wind .popup-btn").removeClass("active-btn");
        $(this).addClass("active-btn");

        $(".door-window").addClass("d-none");
        $($(this).data('tab')).removeClass("d-none");
        $(".door-window").css("opacity", "0.7")
        setTimeout(() => $(".door-window").css("opacity", "1"), 100);
    })

    // TOGGLE DOOR FUNCTION
    $(".doorToggle input").click(function () {
        let propname = $(this).attr("data-propname");
        console.log($(this), propname)
        if ($(this).prop("checked") == true) {
            showPart(propname);
            $('.door_val').val('on');
            $('.door_val').attr('data-name', propname);
            $(".doorToggle").find(".slider").text("OFF");
        } else if ($(this).prop("checked") == false) {
            hidePart(propname);
            $('.door_val').val('off');
            $('.door_val').attr('data-name', propname);
            $(".doorToggle").find(".slider").text("ON");
        }
    });

    // TOGGLE GLASS FUNCTION
    $(".glassToggle input").click(function () {
        // console.log($(this).prop("checked"))
        let propname = $(this).data("propname");
        if ($(this).prop("checked") == true) {
            $('.window_glass').val('on');
            $('.window_glass').attr('data-name', propname);
            showPart(propname);
            $(".glassToggle").find(".slider").text("ON");
        } else if ($(this).prop("checked") == false) {
            hidePart(propname);
            $('.window_glass').val('off');
            $('.window_glass').attr('data-name', propname);
            $(".glassToggle").find(".slider").text("OFF");
        }
    });

    // GLASS FRAME COLOR FUNCTION
    $(document).on("click", ".glassFrame", function () {
        $(".glassFrame").find("input[type='radio']").removeAttr("checked");
        var color = $(this).data('color');
        $('.window_frame').val(color);
        $('.window_frame').attr('data-name', 'fRAME');
        console.log(color);
        setColor('fRAME', color);
        $(this).find("input[type='radio']").attr("checked", "checked");
    });

    // APPLYING TEXTURE TO FLOOR FUNCTION
    $(document).on("click", ".floor", function () {
        $(".wall").find("input[type='radio']").removeAttr("checked");
        var imgsrc = $(this).data('url');
        $('.floor').val(imgsrc);
        console.log(imgsrc);
        setImage('FLOR', imgsrc);
        $(this).find("input[type='radio']").attr("checked", "checked");
    });

    // TOGGLE PANEL CHIMNEY GENERATOR FUNCTION
    $(".panelToggle input").click(function () {
        // console.log($(this))
        let propname = $(this).data("propname");
        console.log(propname);
        if ($(this).prop("checked") == true) {
            $('.solar_panel').val("on");
            $('.solar_panel').attr('data-name', propname);
            showPart(propname);

            $(this).parent().find(".slider").text("ON");
        } else if ($(this).prop("checked") == false) {
            $('.solar_panel').val("off");
            $('.solar_panel').attr('data-name', propname);
            hidePart(propname);
            $(this).parent().find(".slider").text("OFF");
        }
    });

    $(".chimneyToggle input").click(function () {
        console.log($(this))
        let propname = $(this).data("propname");
        if ($(this).prop("checked") == true) {
            $('.chimney').val("on");
            $('.chimney').attr('data-name', propname);
            showPart(propname);
            $(this).parent().find(".slider").text("ON");
        } else if ($(this).prop("checked") == false) {
            $('.chimney').val("off");
            $('.chimney').attr('data-name', propname);
            hidePart(propname);
            $(this).parent().find(".slider").text("OFF");
        }
    });

    $(".generatorToggle input").click(function () {
        console.log($(this))
        let propname = $(this).data("propname");
        if ($(this).prop("checked") == true) {
            $('.gernator').val("on");
            $('.gernator').attr('data-name', propname);
            showPart(propname);
            $(this).parent().find(".slider").text("ON");
        } else if ($(this).prop("checked") == false) {
            $('.gernator').val("off");
            $('.gernator').attr('data-name', propname);
            hidePart(propname);
            $(this).parent().find(".slider").text("OFF");
        }
    });

    // CAMERA FUNCTION
    // CAMERA RE-CENTER FUNCTION
    $(document).on('click', '.front_face', function () {
        var cameras = clara.scene.getAll({ name: 'top', type: 'Camera', property: 'name' });
        // console.log(cameras);
        for (var id in cameras) {
            clara.player.animateCameraTo(id, 300);
            // var ID = cameras[id];
            // console.log(id,cameras[id]);
            //clara.player.setCamera('new 1');
            //clara.scene.set({id:'id',plug:'Transform',property:'rotation'},[15,15,0]);
        }
    });


    //camera function //    

    var roof_camera = "634a762f-8f5b-4719-afdc-82ce3bd51cd8";
    var wall_camera = "74e93592-13d9-45d0-8083-8c300356584a";


    // fron translate camera:0.0892,13.19,13.5965
    $(document).on("click", "#roof_camera", function () {
        // alert("roof camera");
        var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
        clara.player.animateCameraTo(roof_camera, 300);
    });

    $(document).on("click", "#wall_camera", function () {
        // alert("walls camera");
        var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
        clara.player.animateCameraTo(wall_camera, 300);

    });
    var outer_camera = "5e5e2f12-3796-4af2-95f0-b2e232c07e72";
    $(document).on('click', '.default_camera', function () {
        var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
        clara.player.animateCameraTo(outer_camera, 300);

    });

    let lastId;

    $(document).on('click', '.savemodel', function () {

        let modelId = $(".model_id").val();
        let current_price = $(".total-price").val();
        let roof_texture = $(".roof_texture").val();
        let roof_wood = $(".roof_wood").val();
        let out_wall = $(".outer_wall").val();
        let in_wall = $(".inner_wall").val();
        let floor = $(".floor").val();
        let window_frame = $(".window_frame").val();
        let window_frame_name = $(".window_frame").attr('data-name');

        let door = $(".door_val").val();
        let door_name = $(".door_val").attr("data-name");
        let glass = $(".window_glass").val();
        let glass_name = $(".window_glass").attr("data-name");
        let solar = $(".solar_panel").val();
        let solar_name = $(".solar_panel").attr("data-name");
        let chimney = $(".chimney").val();
        let chimney_name = $(".chimney").attr("data-name");
        let generator = $(".gernator").val();
        let generator_name = $(".gernator").attr("data-name");
        let dataString = ` { "modelId" :"${modelId}","currentPrice" :"${current_price}" ,"roof_texture" :"${roof_texture}" ,"roof_wood" :"${roof_wood}" ,"out_wall" :"${out_wall}" ,"in_wall" :"${in_wall}" ,"floor" :"${floor}" ,"window_frame" :"${window_frame}" ,"window_frame_name" :"${window_frame_name}" ,"door" :"${door}" ,"door_name" :"${door_name}" ,"glass" :"${glass}" ,"glass_name" :"${glass_name}" ,"solar" :"${solar}" ,"solar_name" :"${solar_name}" ,"chimney" :"${chimney}" ,"chimney_name" :"${chimney_name}" ,"generator" :"${generator}" , "generator_name" :"${generator_name}" } `;

        // console.log(dataString)

        // let model = parseFloat($(".selectModel").find("input[type='radio']:checked").parent().parent().data("price"));
        // let roof = parseFloat($(".roof-out").find("input[type='radio']:checked").parent().parent().data("price"));
        // let wallout = parseFloat($(".wall-out").find("input[type='radio']:checked").parent().parent().data("price"));
        // let wallin = parseFloat($(".wall-in").find("input[type='radio']:checked").parent().parent().data("price"));

        // (model == NaN) ? model = 0: model - model;
        // (model == NaN) ? model = 0: model - model;
        // (model == NaN) ? model = 0: model - model;
        // (model == NaN) ? model = 0: model - model;

        // let total_price;

        // console.log(model, roof);
        // console.log(wallout, wallin);
        // if (model != NaN || roof != NaN || wallout != NaN || wallin != NaN) {
        //     total_price = model + roof + wallout + wallin;
        // }
        // console.log(total_price);

        // alert(model);
        // alert(roof);
        // alert(wallout);
        // alert(wallin);

        let url = window.location.origin + window.location.pathname + "?id=";

        if (modelId == "") {
            alert("please select model");
        } else {
            $.ajax({
                url: './func.php',
                type: 'POST',
                data: { act: "savechanges", details: dataString, url: url, email: "", userId: '' },
                success: function (data) {
                    //alert(data);
                    // var res = $.parseJSON(data);
                    data = JSON.parse(data);
                    console.log(data);
                    lastId = data['lastId'];
                    $("#url").val(url + lastId)
                    $("#design_url").val(url + lastId);
                },
                error: err => console.log(err)
            });
        }

    });

    // $(document).on('click', '.openurl', function () {
    //     if (lastId != "" || lastId != undefined) {
    //         window.open($("#url").val(), '_blank').focus();
    //     } else {
    //         window.open(window.location.origin + window.location.pathname, '_blank').focus();
    //     }
    //});

    $(document).on('click', '#enquiryBtn', function () {
        let name = $('#full_name').val();
        let email = $('#enquiryEmail').val();
        let contact_number = $('#contactNumber').val();
        let save_url = $('#design_url').val();
        let tot_price = $('.total-price').val();
        let enquiryDetail = $('#enquiryDetail').val();



        console.log(name + email + contact_number + tot_price + save_url + enquiryDetail);


        $.ajax({
            url: 'order_save.php',
            type: 'POST',
            data: { name: name, email: email, contact_number: contact_number, save_url: save_url, total_price: tot_price, enquiryDetail: enquiryDetail },
            success: function (data) {
                // alert(data);
                var res = $.parseJSON(data);
                if (res.statusCode == 200) {
                    // alert(res.statusCode);
                    $('#changes-model').hide();
                    $('.modal-backdrop').css('display', 'none');
                    $('#order_form').trigger('reset');
                    swal("Congrats", "Enquiry Saved Successfully", "success");
                }
                else {
                    swal("Oops", "Something went wrong", "error");

                }

            }
        });




    });



    $('.selectModel').click(function () {
        model_price = parseFloat($(this).data('price'));
        totalprice = model_price;
        $('.dyn-price').text(totalprice);
        $('.total-price').val(totalprice);
    });
    $('.roof-out').click(function () {
        roofout_price = parseFloat($(this).data('price'));
        totalprice = model_price + roofout_price + roofin_price + wallout_price + wallin_price + floor_price;
        $('.dyn-price').text(totalprice);
        $('.total-price').val(totalprice);
    })
    $('.roof-in').click(function () {
        roofin_price = parseFloat($(this).data('price'));
        totalprice = model_price + roofin_price + roofout_price + wallout_price + wallin_price + floor_price;
        $('.dyn-price').text(totalprice);
        $('.total-price').val(totalprice);
    })
    $('.wall-out').click(function () {
        wallout_price = parseFloat($(this).data('price'));
        totalprice = model_price + wallout_price + roofout_price + roofin_price + wallin_price + floor_price;
        $('.dyn-price').text(totalprice);
        $('.total-price').val(totalprice);
    })
    $('.wall-in').click(function () {
        wallin_price = parseFloat($(this).data('price'));
        totalprice = model_price + wallin_price + roofout_price + roofin_price + wallout_price + floor_price;
        $('.dyn-price').text(totalprice);
        $('.total-price').val(totalprice);
    })
    $('.floor').click(function () {
        floor_price = parseFloat($(this).data('price'));
        totalprice = model_price + floor_price + roofout_price + roofin_price + wallout_price + wallin_price;
        $('.dyn-price').text(totalprice);
        $('.total-price').val(totalprice);
    })



})



