addContactMessage = (form) => {
    var formData = new FormData(form);

    if (formData.get('name').trim() != '') {
        if (formData.get('email').trim() != '') {
            if (formData.get('subject').trim() != '') {
                if (formData.get('message').trim() != '') {
                    $.ajax({
                        method: "POST",
                        url: HOME_API_PATH + "addcontact",
                        data: formData,
                        success: function ($data) {
                            console.log($data);
                            successToast();
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (error) {
                            console.log(`Error ${error}`);
                        }
                    });
                } else { errorMessage("Please Enter Message"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter Email Address"); }
    } else { errorMessage("Please Enter Your Name"); }

}

updatedDate = (form) => {

    var formData = new FormData(form);

    if (formData.get('change_date').trim() != "") {
        var end_date = new Date(formData.get('end_date'));
        var changed_date = new Date(formData.get('change_date'));

        var Difference_In_Time = changed_date.getTime() - end_date.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

        if (Difference_In_Days > 0) {

            var sub_total = Difference_In_Days * formData.get('vehicle_price');
            var new_total = parseInt(sub_total) + parseInt(formData.get('total'));

            document.getElementById('extended_total').value = new_total;
            document.getElementById('changed_date').value = formData.get('change_date');
            document.getElementById('num_ofDays').value = Difference_In_Days;
            document.getElementById('current_total').value = formData.get('total');
        } else { errorMessage("Please Select Future Date"); }

    } else { errorMessage("Please Select the Date"); }
}

requestExtend = (form) => {
    var formData = new FormData(form);

    if (formData.get('changed_date').trim() != '') {
        if (formData.get('request_message').trim() != '') {
            if (formData.get('extended_total').trim() != '') {

                $.ajax({
                    method: "POST",
                    url: HOME_API_PATH + "addExtend",
                    data: formData,
                    success: function ($data) {
                        console.log($data);
                        successToastRedirect("rent_list.php");
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });

            } else { errorMessage("Please Check Date befoure Submit"); }
        } else { errorMessage("Please Enter Message"); }
    } else { errorMessage("Please Enter Date"); }

}

addBooking = (form) => {
    var formData = new FormData(form);

    if (formData.get('service_id') != 0) {
        if (formData.get('booking_date').trim() != '') {
            if (formData.get('booking_time').trim() != '') {
                if (formData.get('speacial_request').trim() != '') {
                    $.ajax({
                        method: "POST",
                        url: HOME_API_PATH + "addBooking",
                        data: formData,
                        success: function ($data) {
                            console.log($data);
                            if ($data > 0) {
                                errorMessage("This Time is Already Taken! Please Select Other Time")
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
                } else { errorMessage("Please Enter Special request"); }
            } else { errorMessage("Please Select Booking Time"); }
        } else { errorMessage("Please Select Booking Date"); }
    } else { errorMessage("Please Select Service"); }

}

addtoCartProductwithQty = (pid, price) => {

    var qty = document.getElementById('qty').value;
    var data = {
        pid: pid,
        price: price,
        qty: qty,
    };

    $.ajax({
        method: "POST",
        url: "add_to_cart.php?pid=" + pid + "&product_price=" + price + "&qty=" + qty,
        data: data,
        success: function ($data) {
            console.log($data);
            if ($data === '"Fail"') {
                window.location.href = 'admin/login.php';
            } else {
                successToastCart();
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

addtoCartProduct = (pid, price) => {

    var data = {
        pid: pid,
        price: price,
    };

    $.ajax({
        method: "POST",
        url: "add_to_cart.php?pid=" + pid + "&product_price=" + price,
        data: data,
        success: function ($data) {
            console.log($data);
            if ($data === '"Fail"') {
                window.location.href = 'admin/login.php';
            } else {
                successToastCart();
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

checkSelection = (id, field) => {
    window.location.href = "shop.php?id=" + id + "&field=" + field;
}

qtryChange = (cart_id, field, action, currentQty) => {

    let val = 0;

    if (action == 1) {
        var currentQtyint = parseInt(currentQty);
        let sum = currentQtyint + 1;
        val = sum.toString();
    } else {
        var currentQtyint = parseInt(currentQty);
        let sum = currentQtyint - 1;
        val = sum.toString();
    }


    var data = {
        cart_id: cart_id,
        field: field,
        value: val,
    }

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "editQty",
        data: data,
        success: function ($data) {
            console.log($data);
            successToast();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}

checkOut = (form) => {
    var formData = new FormData(form);


    if (formData.get('shipping_address').trim() != '') {
        if (formData.get('billing_address').trim() != '') {

            if (formData.get('total') > 0) {

                var data = {
                    customer_id: formData.get('customer_id'),
                    shipping_address: formData.get('shipping_address'),
                    billing_address: formData.get('billing_address'),
                    total: formData.get('total'),
                }

                $.ajax({
                    method: "POST",
                    url: HOME_API_PATH + "checkoutOrder",
                    data: data,
                    success: function ($data) {
                        console.log($data);
                        successToastRedirect("orders.php");
                    },
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });

            } else { errorMessage("Please Select adleast one Item to Buy!"); }

        } else { errorMessage("Please Enter Billing Address"); }
    } else { errorMessage("Please Enter Shipping Address"); }


}


placeOrder = (customer_id, total) => {

    var data = {
        customer_id: customer_id,
        total: total,
    }

    if (total > 0) {


        $.ajax({
            method: "POST",
            url: HOME_API_PATH + "placeOrder",
            data: data,
            success: function ($data) {
                console.log($data);
                successToastRedirect("order.php");
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
    } else { errorMessage("Please Add item to cart!"); }

}

cartDelete = (id, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure? this prodcut will be delete',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id: id,
                table: table,
                id_fild: id_fild,
            }

            console.log(data);

            $.ajax({
                method: "POST",
                url: HOME_API_PATH + "permanantDeleteData",
                data: data,
                success: function ($data) {
                    console.log($data);
                    successToastDelete();
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })

}
//profile changers

changeEmail = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_email').trim() != '') {
        if (formData.get('new_email').trim() != '') {
            if (checkEmail(formData.get('current_email'), formData.get('customer_id')) > 0) {

                var data = {
                    id: formData.get('customer_id'),
                    field: 'email',
                    value: formData.get('new_email'),
                    id_fild: 'customer_id',
                    table: 'customer',
                }

                $.ajax({
                    method: "POST",
                    url: HOME_API_PATH + "updateData",
                    data: data,
                    success: function ($data) {
                        console.log($data);
                        successToastwithLogout();
                    },
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });

            } else { errorMessage("Current Emaiil is Wrong!"); }
        } else { errorMessage("Please Enter Email Address"); }
    } else { errorMessage("Please Enter Your Name"); }

}


changePassword = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_password').trim() != '') {
        if (formData.get('new_password').trim() != '') {
            if (formData.get('confirm_new_password').trim() != '') {
                if (formData.get('new_password') === formData.get('confirm_new_password')) {
                    if (checkPassword(formData.get('current_password'), formData.get('customer_id')) > 0) {

                        var data = {
                            id: formData.get('customer_id'),
                            field: 'password',
                            value: formData.get('new_password'),
                            id_fild: 'customer_id',
                            table: 'customer',
                        }

                        $.ajax({
                            method: "POST",
                            url: HOME_API_PATH + "updateData",
                            data: data,
                            success: function ($data) {
                                console.log($data);
                                successToastwithLogout();
                            },
                            error: function (error) {
                                console.log(`Error ${error}`);
                            }
                        });

                    } else { errorMessage("Current Password is Wrong"); }
                } else { errorMessage("Password is Not Match!"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter New Password"); }
    } else { errorMessage("Please Enter Current Password"); }

}

checkPassword = (password, customer_id) => {
    const data = {
        password: password,
        customer_id: customer_id,
    }
    var values;
    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "checkPassword",
        data: data,
        async: false,
        success: function (data) {
            values = data;
            console.log(data);
        },

        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
    return values;
}

function checkEmail(email, customer_id) {
    const data = {
        email: email,
        customer_id: customer_id,
    }
    var values;

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "checkEmail",
        data: data,
        async: false,
        success: function (data) {
            console.log(data);
            values = data;

        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

    return values;
}


updateDataFromHome = (ele, id, field, table, id_fild) => {

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    var data = {
        id_fild: id_fild,
        id: id,
        field: field,
        value: val,
        table: table,
    }

    if (field == 'email') {
        if (emailvalidation(val)) {
            callUpdateRequestFromHome(data);
        }

    } else if (field == 'phone') {
        if (phonenumber(val)) {
            callUpdateRequestFromHome(data);
        }
    } else {
        callUpdateRequestFromHome(data);
    }

}

updateStatusFromHome = (value, id, field, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id_fild: id_fild,
                id: id,
                field: field,
                value: value,
                table: table,
            }


            callUpdateRequestFromHome(data);

            Swal.fire(
                'Canceled!',
                'Your file has been Canceled.',
                'success'
            )
        }
    })
}

deleteDataFromHome = (id, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id: id,
                table: table,
                id_fild: id_fild,
            }

            console.log(data);

            $.ajax({
                method: "POST",
                url: HOME_API_PATH + "deleteData",
                data: data,
                success: function ($data) {
                    console.log($data);
                    successToastwithLogout();
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}


bookRent = (form) => {

    var formData = new FormData(form);

    if (document.getElementById('p_name').value.trim() != "" && document.getElementById('exdate').value.trim() != "" && document.getElementById('cvv').value.trim() != "") {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't Rent This Vehicle!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Make Booking it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var data = {
                    vehicle_id: formData.get('vehicle_id'),
                    start_date: formData.get('start_date'),
                    end_date: formData.get('end_date'),
                    customer_id: formData.get('customer_id'),
                    total: formData.get('total'),
                }

                $.ajax({
                    method: "POST",
                    url: HOME_API_PATH + "addBookingVehicle",
                    data: data,
                    success: function ($data) {
                        console.log($data);
                        successToastRedirect("rent_confirmation.php?rent_id=" + $data);
                    },
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });
                Swal.fire(
                    'Saved!',
                    'Your Booking has been Saved.',
                    'success'
                )

            }
        })
    } else {
        errorMessage("Please Enter Card Details");
    }
}


bookpackage = (form) => {

    var formData = new FormData(form);

    if (document.getElementById('p_name').value.trim() != "" && document.getElementById('exdate').value.trim() != "" && document.getElementById('cvv').value.trim() != "") {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't Book This Package!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Make Booking it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var data = {
                    customer_id: formData.get('customer_id'),
                    package_id: formData.get('package_id'),
                    total: formData.get('total'),
                    traval_start_date: formData.get('traval_start_date'),
                }

                $.ajax({
                    method: "POST",
                    url: HOME_API_PATH + "bookpackage",
                    data: data,
                    success: function ($data) {
                        console.log($data);
                        successToastRedirect("rent_confirmation.php?order_id=" + $data);
                    },
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });
                Swal.fire(
                    'Saved!',
                    'Your Booking has been Saved.',
                    'success'
                )

            }
        })
    } else {
        errorMessage("Please Enter Card Details");
    }
}

callUpdateRequestFromHome = (data) => {

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "updateData",
        data: data,
        success: function ($data) {
            console.log($data);
            successToast();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}


search = (form) => {
    console.log("clicked");
    var formData = new FormData(form);
    var start_date = formData.get('start_date');
    var end_date = formData.get('end_date');
    var cat_id = formData.get('cat_id');
    if (formData.get('start_date').trim() != "" && formData.get('end_date').trim() != "" && formData.get('cat_id').trim() != "") {

        window.location.href = "cars.php?start_date=" + start_date + "&end_date=" + end_date + "&cat_id=" + cat_id;
    } else {
        window.location.href = "index.php";
    }
}