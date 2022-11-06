addCategory = (form) => {
    let fd = new FormData(form);

    if (fd.get('category_name').trim() != '') {
        if (fd.get("file") != '') {

            $.ajax({
                method: "POST",
                url: API_PATH + "addCategory",
                data: fd,
                success: function ($data) {
                    console.log($data);

                    if ($data > 0) {
                        errorMessage("This Category Already Registerd!");
                    } else {
                        successToast();

                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please SelectImage"); }
    } else { errorMessage("Please Enter Category Name"); }
}


insertImage = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "insertImageUpload",
        data: formData,
        success: function ($data) {
            console.log($data);
            loading("Image Uploding...");
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

addRoom = (form) => {
    let fd = new FormData(form);

    if (fd.get("room_name").trim() != "") {
        if (fd.get("room_price").trim() != "") {
            if (fd.get("room_occupancy").trim() != "") {
                if (fd.get("room_details").trim() != "") {
                    if (fd.get("file")) {

                        $.ajax({
                            method: "POST",
                            url: API_PATH + "addRoom",
                            data: fd,
                            success: function ($data) {
                                console.log($data);
                                if ($data > 0) {
                                    errorMessage("This Room is Already Here!");
                                } else {
                                    successToast();
                                }
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            error: function (error) {
                                console.log(`Error ${error}`);
                            }
                        });
                    } else { errorMessage("Please SelectImage"); }
                } else { errorMessage("Please Enter Room Details"); }
            } else { errorMessage("Please Enter Room Occupancy"); }
        } else { errorMessage("Please Enter Room Price"); }
    } else { errorMessage("Please Enter Room Name"); }
}

addVehicle = (form) => {
    let fd = new FormData(form);

    if (fd.get("vehicle_name").trim() != "") {
        if (fd.get("file")) {

            $.ajax({
                method: "POST",
                url: API_PATH + "addVehicle",
                data: fd,
                success: function ($data) {
                    console.log($data);
                    if ($data > 0) {
                        errorMessage("This Vehicle Already Registerd!");
                    } else {
                        successToast();
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please SelectImage"); }
    } else { errorMessage("Please Enter Vehicle Details"); }
}

addCustomer = (form) => {
    let fd = new FormData(form);

    if (fd.get('name').trim() != '') {
        if (fd.get('email').trim() != '') {
            if (fd.get('phone').trim() != '') {
                if (fd.get('nic').trim() != '') {
                    if (fd.get('address').trim() != '') {
                        if (fd.get('password').trim() != '') {
                            if (fd.get('conf_password').trim() != '') {
                                if (fd.get('password') == fd.get('conf_password')) {
                                    if (emailvalidation(fd.get('email'))) {
                                        if (phonenumber(fd.get('phone'))) {

                                            $.ajax({
                                                method: "POST",
                                                url: API_PATH + "addCustomer",
                                                data: fd,
                                                success: function ($data) {
                                                    console.log($data);

                                                    if ($data > 0) {
                                                        errorMessage("This Customer Already Registerd!");
                                                    } else {
                                                        successToastRedirect('login.php');
                                                    }
                                                },
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                error: function (error) {
                                                    console.log(`Error ${error}`);
                                                }
                                            });

                                        }
                                    }
                                } else { errorMessage("Password is Not Match"); }
                            } else { errorMessage("Please Confirm Password"); }
                        } else { errorMessage("Please Enter Password"); }
                    } else { errorMessage("Please Enter Address"); }
                } else { errorMessage("Please Enter NIC"); }
            } else { errorMessage("Please Enter Phone number"); }
        } else { errorMessage("Please Enter Email"); }
    } else { errorMessage("Please Enter Full Name"); }
}

addDriver = (form) => {
    let fd = new FormData(form);

    if (fd.get('name').trim() != '') {
        if (fd.get('email').trim() != '') {
            if (fd.get('phone').trim() != '') {
                if (fd.get('nic').trim() != '') {
                    if (fd.get('address').trim() != '') {

                        if (emailvalidation(fd.get('email'))) {
                            if (phonenumber(fd.get('phone'))) {

                                $.ajax({
                                    method: "POST",
                                    url: API_PATH + "addDriver",
                                    data: fd,
                                    success: function ($data) {
                                        console.log($data);

                                        if ($data > 0) {
                                            errorMessage("This Customer Already Registerd!");
                                        } else {
                                            successToast();
                                        }
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    error: function (error) {
                                        console.log(`Error ${error}`);
                                    }
                                });

                            }
                        }

                    } else { errorMessage("Please Enter Address"); }
                } else { errorMessage("Please Enter NIC"); }
            } else { errorMessage("Please Enter Phone number"); }
        } else { errorMessage("Please Enter Email"); }
    } else { errorMessage("Please Enter Full Name"); }
}

addGuide = (form) => {
    let fd = new FormData(form);

    if (fd.get('name').trim() != '') {
        if (fd.get('email').trim() != '') {
            if (fd.get('phone').trim() != '') {
                if (fd.get('nic').trim() != '') {
                    if (fd.get('address').trim() != '') {

                        if (emailvalidation(fd.get('email'))) {
                            if (phonenumber(fd.get('phone'))) {

                                $.ajax({
                                    method: "POST",
                                    url: API_PATH + "addGuide",
                                    data: fd,
                                    success: function ($data) {
                                        console.log($data);

                                        if ($data > 0) {
                                            errorMessage("This Guide Already Registerd!");
                                        } else {
                                            successToast();
                                        }
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    error: function (error) {
                                        console.log(`Error ${error}`);
                                    }
                                });

                            }
                        }

                    } else { errorMessage("Please Enter Address"); }
                } else { errorMessage("Please Enter NIC"); }
            } else { errorMessage("Please Enter Phone number"); }
        } else { errorMessage("Please Enter Email"); }
    } else { errorMessage("Please Enter Full Name"); }
}


addStaff = (form) => {
    let fd = new FormData(form);

    if (fd.get('name').trim() != '') {
        if (fd.get('email').trim() != '') {
            if (fd.get('phone').trim() != '') {
                if (fd.get('nic').trim() != '') {
                    if (fd.get('address').trim() != '') {
                        if (fd.get('password').trim() != '') {
                            if (fd.get('conf_password').trim() != '') {
                                if (fd.get('password') == fd.get('conf_password')) {
                                    if (emailvalidation(fd.get('email'))) {
                                        if (phonenumber(fd.get('phone'))) {

                                            $.ajax({
                                                method: "POST",
                                                url: API_PATH + "addStaff",
                                                data: fd,
                                                success: function ($data) {
                                                    console.log($data);

                                                    if ($data > 0) {
                                                        errorMessage("This Staff Already Registerd!");
                                                    } else {
                                                        successToast();
                                                    }
                                                },
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                error: function (error) {
                                                    console.log(`Error ${error}`);
                                                }
                                            });

                                        }
                                    }
                                } else { errorMessage("Password is Not Match"); }
                            } else { errorMessage("Please Confirm Password"); }
                        } else { errorMessage("Please Enter Password"); }
                    } else { errorMessage("Please Enter Address"); }
                } else { errorMessage("Please Enter NIC"); }
            } else { errorMessage("Please Enter Phone number"); }
        } else { errorMessage("Please Enter Email"); }
    } else { errorMessage("Please Enter Full Name"); }
}