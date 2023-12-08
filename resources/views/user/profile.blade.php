@extends('layouts.app')
<style>
    .dropdown-menu {
        height: auto;
        max-height: 200px;
        overflow-x: hidden;
    }
</style>
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100 d-flex align-items-center">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body p-3 m-1 justify-content-center d-flex flex-column">

                            <div class="user-avatar mb-3 d-flex justify-content-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin"
                                    class="img-fluid">
                            </div>


                            <h3 class="user-name text-center">{{ $user->name }}</h3>
                            <h6 class="user-email text-center">{{ $user->email }}</h6>


                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 normal-text fs-2">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="fullName" class="form-control" placeholder="Nguyen Van A"
                                            value="{{ $user->name }}">
                                        <label for="floatingInput">Full name</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="fullName" class="form-control" value="{{ $user->email }}"
                                            placeholder="Nguyen Van A" value="{{ $user->email }}">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="eMail"
                                            value="{{ $user->email }}">
                                    </div> --}}
                                </div>

                            </div>
                            <div class="row gutters">

                                <div class="col-6 d-flex align-items-stretch" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <div class="bg-white card addresses-item mb-4 shadow-sm w-100">
                                        <div class="default-address p-3">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i></div>
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <p class="fw-bolder">Default</p>

                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <i class="fas fa-edit"></i>
                                                            {{-- <i class="fas fa-chevron-right"></i> --}}
                                                        </div>
                                                    </div>
                                                    <p class="mb-1">{{ $address->receiver }} {{ $address->phone }}</p>
                                                    <p class="mb-1">{{ $address->street }}, {{ $address->ward }}</p>
                                                    <p>
                                                        {{ $address->city }},
                                                        {{ $address->state }}
                                                    </p>
                                                    {{-- <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3"
                                                            data-toggle="modal" data-target="#add-address-modal"
                                                            href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a
                                                            class="text-danger" data-toggle="modal"
                                                            data-target="#delete-address-modal" href="#"><i
                                                                class="icofont-ui-delete"></i> DELETE</a></p> --}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mt-3 mb-2 normal-text fs-2">Default address</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="receiver" class="form-control"
                                                placeholder="inputhere" value="{{ $address->receiver }}">
                                            <label>Receiver</label>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="phone" id="phone" class="form-control"
                                                placeholder="inputhere" value="{{ $address->phone }}">
                                            <label>Phone number</label>

                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-floating mb-3">
                                            <input id="street" class="form-control" placeholder="inputhere"
                                                value="{{ $address->street }}">
                                            <label>Đường</label>

                                        </div>

                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="province" class="form-control dropdown-toggle"
                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                value="{{ $address->state }}" oninput="proSearch()">
                                            <label>Tỉnh/Thành</label>
                                            <ul class="dropdown-menu" id="province_list"></ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-floating mb-3">

                                            <input type="text" id="district" class="form-control dropdown-toggle"
                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                value="{{ $address->city }}" oninput="disSearch()">
                                            <label>Quận/Huyện</label>
                                            <ul class="dropdown-menu" id="district_list"></ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                        <div class="form-floating mb-3">
                                            <input type="text" id="ward" class="form-control dropdown-toggle"
                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                value="{{ $address->ward }}" oninput="warSearch()">
                                            <label>Phường/Xã</label>
                                            <ul class="dropdown-menu" id="ward_list"></ul>
                                        </div>

                                    </div> --}}
                                </div>
                                <div class="col-6 d-flex align-items-stretch">
                                    <div class="bg-white card addresses-item mb-4 shadow-sm w-100">
                                        <div
                                            class="other-address p-3 d-flex justify-content-center align-items-center h-100">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i></div>
                                                <div class="media-body d-flex flex-column align-items-center">
                                                    <p class="m-2">{{ $nonDefaultAddress->count() }} address more</p>

                                                    <p>
                                                        <i class="fal fa-info-circle fs-3"></i>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Default address</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters mt-4">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button>
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-primary update-address">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Import jquery --}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <script>
            updateAddress = document.querySelector('.update-address');

            updateAddress.addEventListener('click', function() {
                let userId = {{ $user->id }};
                let receiver = document.querySelector('#receiver').value;
                let phone = document.querySelector('#phone').value;
                let province = document.querySelector('#province').value;
                let district = document.querySelector('#district').value;
                let ward = document.querySelector('#ward').value;
                let address = document.querySelector('#street').value;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let url = "{{ route('api.create-new-address') }}";
                axios.post(url, {
                        userId: userId,
                        receiver: receiver,
                        phone: phone,
                        state: province,
                        city: district,
                        ward: ward,
                        street: address,
                        userId: userId
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(function(response) {
                        console.log(response);
                        if (response.data.statusCode === 200) {
                            var alertSuccess = document.getElementById('alert-success');
                            alertSuccess.innerHTML = response.data.Message;
                            alertSuccess.classList.remove('visually-hidden');
                            setTimeout(function() {
                                alertSuccess.classList.add('visually-hidden');
                            }, 2000);

                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });

            function toQuery(str) {
                str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
                str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
                str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
                str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
                str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
                str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
                str = str.replace(/đ/g, "d");
                str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
                str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
                str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
                str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
                str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
                str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
                str = str.replace(/Đ/g, "D");
                str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
                str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
                str = str.replace(/ + /g, "");
                str = str.replace(/\s/g, "");
                str = str.toLowerCase();
                str = str.trim();
                str = str.replace(
                    /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
                    ""
                );
                return str;
            }

            function httpGet(theUrl) {

                var xmlHttp = new XMLHttpRequest();

                xmlHttp.open("GET", theUrl, false);
                xmlHttp.setRequestHeader("Access-Control-Allow-Origin", "*");
                xmlHttp.send(null);
                return xmlHttp.responseText;
            }

            // var dvhcData = JSON.parse(httpGet('https://173.netlify.app/cuong/dvhc.json'))
            var dvhcData = [];
            var pdaData = {};
            fetch('/dvhc.json')
                .then(response => response.json())
                .then(data => {
                    dvhcData = data;
                    proSearch();
                    disSearch();
                    warSearch();
                })
                .catch(error => {
                    console.error('Error:', error);
                });


            function proSearch() {
                var pro = $("#province").val();
                $("#province_list").empty();
                for (i in dvhcData["province"]) {
                    var dpro = dvhcData["province"][i]["name"],
                        dproid = dvhcData["province"][i]["id"];
                    if (pro) {
                        if (toQuery(dpro).indexOf(toQuery(pro)) >= 0) {
                            $("#province_list").append(
                                '<li><a class="dropdown-item" onclick="' +
                                "addpda('province', '" +
                                dpro +
                                "', {'province_id': '" +
                                dproid +
                                "'}); disSearch()" +
                                '">' +
                                dpro +
                                "</a></li>"
                            );
                        }
                    } else {
                        $("#province_list").append(
                            '<li><a class="dropdown-item" onclick="' +
                            "addpda('province', '" +
                            dpro +
                            "', {'province_id': '" +
                            dproid +
                            "'}); disSearch()" +
                            '">' +
                            dpro +
                            "</a></li>"
                        );
                    }
                }
                disSearch();
            }

            function disSearch() {
                var dis = $("#district").val();
                $("#district_list").empty();

                if ($("#province").val()) {
                    if (pdaData["province_id"]) {
                        for (i in dvhcData["province"]) {
                            if (pdaData["province_id"] == dvhcData["province"][i]["id"]) {
                                for (j in dvhcData["province"][i]["district"]) {
                                    var d = dvhcData["province"][i]["district"][j]["name"],
                                        did = dvhcData["province"][i]["district"][j]["id"];
                                    if (dis) {
                                        if (toQuery(d).indexOf(toQuery(dis)) >= 0) {
                                            $("#district_list").append(
                                                '<li><a class="dropdown-item" onclick="' +
                                                "addpda('district', '" +
                                                d +
                                                "', {'district_id': '" +
                                                did +
                                                "'}); warSearch()" +
                                                '">' +
                                                d +
                                                "</a></li>"
                                            );
                                        }
                                    } else {
                                        $("#district_list").append(
                                            '<li><a class="dropdown-item" onclick="' +
                                            "addpda('district', '" +
                                            d +
                                            "', {'district_id': '" +
                                            did +
                                            "'}); warSearch()" +
                                            '">' +
                                            d +
                                            "</a></li>"
                                        );
                                    }
                                }
                            }
                        }
                    } else {
                        $("#district_list").append(
                            '<li><a class="dropdown-item">Vui lòng chọn Tỉnh/Thành</a></li>'
                        );
                    }
                } else {
                    pdaData["province_id"] = "";
                    $("#district_list").append(
                        '<li><a class="dropdown-item">Vui lòng chọn Tỉnh/Thành</a></li>'
                    );
                }
                warSearch();
            }

            function warSearch() {
                var war = $("#ward").val();
                $("#ward_list").empty();

                if ($("#district").val() && $("#province").val()) {
                    if (pdaData["province_id"] && pdaData["district_id"]) {
                        for (i in dvhcData["province"]) {
                            if (pdaData["province_id"] == dvhcData["province"][i]["id"]) {
                                for (j in dvhcData["province"][i]["district"]) {
                                    if (
                                        pdaData["district_id"] ==
                                        dvhcData["province"][i]["district"][j]["id"]
                                    ) {
                                        for (k in dvhcData["province"][i]["district"][j]["ward"]) {
                                            var d =
                                                dvhcData["province"][i]["district"][j]["ward"][k]["name"],
                                                did = dvhcData["province"][i]["district"][j]["ward"][k]["id"];
                                            if (war) {
                                                if (toQuery(d).indexOf(toQuery(war)) >= 0) {
                                                    $("#ward_list").append(
                                                        '<li><a class="dropdown-item" onclick="' +
                                                        "addpda('ward', '" +
                                                        d +
                                                        "', {'ward_id': '" +
                                                        did +
                                                        "'});" +
                                                        '">' +
                                                        d +
                                                        "</a></li>"
                                                    );
                                                }
                                            } else {
                                                $("#ward_list").append(
                                                    '<li><a class="dropdown-item" onclick="' +
                                                    "addpda('ward', '" +
                                                    d +
                                                    "', {'ward_id': '" +
                                                    did +
                                                    "'});" +
                                                    '">' +
                                                    d +
                                                    "</a></li>"
                                                );
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        $("#ward_list").append(
                            '<li><a class="dropdown-item">Vui lòng chọn Quận/Huyện</a></li>'
                        );
                    }
                } else {
                    if (!$("#province").val()) {
                        pdaData["province_id"] = "";
                    }
                    if (!$("#district").val()) {
                        pdaData["district_id"] = "";
                    }
                    $("#ward_list").append(
                        '<li><a class="dropdown-item">Vui lòng chọn Quận/Huyện</a></li>'
                    );
                }
            }

            function addpda(id, val, d) {
                $("#" + id).val(val);
                var prop = id + "_id",
                    res = "";
                pdaData[prop] = d[prop];
                for (ig in pdaData) {
                    if (pdaData[ig]) {
                        switch (ig) {
                            case "province_id":
                                res += "Mã tỉnh/thành: " + pdaData[ig];
                                break;
                            case "district_id":
                                res += ", quận/huyện: " + pdaData[ig];
                                break;
                            case "ward_id":
                                res += ", phường/xã: " + pdaData[ig];
                                break;
                        }
                    }
                }
                if (res) {
                    $("#diaphuong_result").text(res);
                } else {
                    $("#diaphuong_result").text("");
                }
            }

            function dvhccodeSearch() {
                var d = $("#dvhc_code").val(),
                    res = [];

                switch ($("#dvhc_code_type").val()) {
                    case "province":
                        if (d) {
                            if (d.length > 2) {
                                res.push(["text", "Nhập tối đa 2 ký tự !"]);
                            } else {
                                for (i in dvhcData["province"]) {
                                    if (dvhcData["province"][i]["id"].indexOf(d) >= 0) {
                                        res.push([
                                            dvhcData["province"][i]["id"],
                                            dvhcData["province"][i]["name"],
                                        ]);
                                    }
                                }
                            }
                        }
                        break;
                    case "district":
                        if (d) {
                            if (d.length > 3) {
                                res.push(["text", "Nhập tối đa 3 ký tự !"]);
                            } else {
                                for (i in dvhcData["province"]) {
                                    for (j in dvhcData["province"][i]["district"]) {
                                        if (
                                            dvhcData["province"][i]["district"][j]["id"].indexOf(d) >= 0
                                        ) {
                                            res.push([
                                                dvhcData["province"][i]["id"],
                                                dvhcData["province"][i]["name"],
                                                dvhcData["province"][i]["district"][j]["id"],
                                                dvhcData["province"][i]["district"][j]["name"],
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                        break;
                    case "ward":
                        if (d) {
                            if (d.length > 5) {
                                res.push(["text", "Nhập tối đa 5 ký tự !"]);
                            } else if (d.length > 2) {
                                for (i in dvhcData["province"]) {
                                    for (j in dvhcData["province"][i]["district"]) {
                                        for (k in dvhcData["province"][i]["district"][j]["ward"]) {
                                            if (
                                                dvhcData["province"][i]["district"][j]["ward"][k][
                                                    "id"
                                                ].indexOf(d) >= 0
                                            ) {
                                                res.push([
                                                    dvhcData["province"][i]["id"],
                                                    dvhcData["province"][i]["name"],
                                                    dvhcData["province"][i]["district"][j]["id"],
                                                    dvhcData["province"][i]["district"][j]["name"],
                                                    dvhcData["province"][i]["district"][j]["ward"][k]["id"],
                                                    dvhcData["province"][i]["district"][j]["ward"][k]["name"],
                                                ]);
                                            }
                                        }
                                    }
                                }
                            } else {
                                res.push(["text", "Vui lòng nhập tối thiểu 3 ký tự !"]);
                            }
                        }
                        break;
                    case "plate":
                        if (d) {
                            if (d.length > 2) {
                                res.push(["text", "Nhập tối đa 2 ký tự !"]);
                            } else if (d == "80") {
                                res.push(["80", "Các đơn vị, cơ quan cấp trung ương"]);
                            } else {
                                for (i in dvhcData["province"]) {
                                    var plate = dvhcData["province"][i]["plate"];
                                    for (j in plate) {
                                        if (plate[j].toString().indexOf(d) >= 0) {
                                            res.push([plate.join(", "), dvhcData["province"][i]["name"]]);
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                        break;
                }

                if (res.length > 0) {
                    if (res[0][0] != "text") {
                        switch ($("#dvhc_code_type").val()) {
                            case "province":
                                var t =
                                    '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tên</th></tr></thead>';
                                for (i in res) {
                                    t +=
                                        "<tr><td>" +
                                        res[i][0] +
                                        "</td>" +
                                        "<td>" +
                                        res[i][1] +
                                        "</td></tr>";
                                }
                                t += "</table>";
                                $("#dvhc_code_result").html(t);
                                break;
                            case "district":
                                var t =
                                    '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tỉnh/Thành</th><th>Mã</th><th>Quận/Huyện</th></tr></thead>';
                                for (i in res) {
                                    t +=
                                        "<tr><td>" +
                                        res[i][0] +
                                        "</td>" +
                                        "<td>" +
                                        res[i][1] +
                                        "<td>" +
                                        res[i][2] +
                                        "<td>" +
                                        res[i][3] +
                                        "</td></tr>";
                                }
                                t += "</table>";
                                $("#dvhc_code_result").html(t);
                                break;
                            case "ward":
                                var t =
                                    '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tỉnh/Thành</th><th>Mã</th><th>Quận/Huyện</th><th>Mã</th><th>Phường/Xã</th></tr></thead>';
                                for (i in res) {
                                    t +=
                                        "<tr><td>" +
                                        res[i][0] +
                                        "</td>" +
                                        "<td>" +
                                        res[i][1] +
                                        "<td>" +
                                        res[i][2] +
                                        "<td>" +
                                        res[i][3] +
                                        "<td>" +
                                        res[i][4] +
                                        "<td>" +
                                        res[i][5] +
                                        "</td></tr>";
                                }
                                t += "</table>";
                                $("#dvhc_code_result").html(t);
                                break;
                            case "plate":
                                var t =
                                    '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tên</th></tr></thead>';
                                for (i in res) {
                                    t +=
                                        "<tr><td>" +
                                        res[i][0] +
                                        "</td>" +
                                        "<td>" +
                                        res[i][1] +
                                        "</td></tr>";
                                }
                                t += "</table>";
                                $("#dvhc_code_result").html(t);
                                break;
                        }
                    } else {
                        $("#dvhc_code_result").html("<p>" + res[0][1] + "</p>");
                    }
                } else {
                    $("#dvhc_code_result").text("");
                }
            }
        </script>

    </section>
@endsection
