@extends('layouts.app')
<style>

</style>
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100 d-flex align-items-center justify-content-center">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100 bg-white">
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
                    <div class="card h-100 bg-white">
                        <div class="card-body d-flex flex-column justify-content-center p-5">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 normal-text fs-2">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input id="name-input" type="fullName" class="form-control"
                                            placeholder="Nguyen Van A" value="{{ $user->name }}"
                                            style="background-color: white">
                                        <label for="floatingInput">Full name</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input id="email-input" type="email" class="form-control"
                                            value="{{ $user->email }}" placeholder="nguyenvana@gmail.com"
                                            style="background-color: white">
                                        <label for="floatingInput">Email</label>
                                    </div>

                                </div>

                            </div>
                            <div class="row d-flex justify-content-start">
                                <div class="col-3 d-flex justify-content-start">
                                    <button type="button" class="btn btn-dark update-information">Update</button>
                                </div>
                            </div>
                            @if ($address != null && $nonDefaultAddress != null)
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-items-center">


                                        <h6 class="mb-3 normal-text fs-2 mt-3 me-3">My addresses</h6>
                                        <button class="btn btn-dark">
                                            <i data-bs-toggle="modal" data-bs-target="#createAddress"
                                                class="far fa-map-marker-plus fs-3"></i>
                                        </button>
                                    </div>
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
                                    </div>
                                    <div class="col-6 d-flex align-items-stretch" data-bs-toggle="modal"
                                        data-bs-target="#more-addresses">
                                        <div class="bg-white card addresses-item mb-4 shadow-sm w-100">
                                            <div
                                                class="other-address p-3 d-flex justify-content-center align-items-center h-100">
                                                <div class="media">
                                                    <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i></div>
                                                    <div class="media-body d-flex flex-column align-items-center">
                                                        <p class="other-address-quantity m-2">
                                                            {{ $nonDefaultAddress->count() }} address more
                                                        </p>

                                                        <p>
                                                            <i class="fal fa-info-circle fs-3"></i>
                                                        </p>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for default address --}}
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
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-6">

                                                            <div class="form-floating mb-3">
                                                                <input type="email" class="form-control" id="receiver"
                                                                    value="{{ $address->receiver }}">
                                                                <label for="receiver">Receiver</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input id="street" class="form-control"
                                                                    placeholder="inputhere"
                                                                    value="{{ $address->street }}">
                                                                <label>Đường</label>

                                                            </div>
                                                            <div class="form-floating mb-3">

                                                                <input type="text" id="district"
                                                                    class="form-control district dropdown-toggle"
                                                                    data-bs-toggle="dropdown" placeholder="inputhere"
                                                                    value="{{ $address->city }}" oninput="disSearch()">
                                                                <label>Quận/Huyện</label>
                                                                <ul class="dropdown-menu" id="district_list"></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">

                                                            <div class="form-floating mb-3">
                                                                <input type="email" class="form-control" id="phone"
                                                                    value="{{ $address->phone }}">
                                                                <label for="phone">Phone number</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="province"
                                                                    class="form-control province dropdown-toggle"
                                                                    data-bs-toggle="dropdown" placeholder="inputhere"
                                                                    value="{{ $address->state }}" oninput="proSearch()">
                                                                <label>Tỉnh/Thành</label>
                                                                <ul class="dropdown-menu" id="province_list"></ul>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="ward"
                                                                    class="form-control ward dropdown-toggle"
                                                                    data-bs-toggle="dropdown" placeholder="inputhere"
                                                                    value="{{ $address->ward }}" oninput="warSearch()">
                                                                <label>Phường/Xã</label>
                                                                <ul class="dropdown-menu" id="ward_list"></ul>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary update-address"
                                                        target-id={{ $address->id }}>Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters mt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                {{-- <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button> --}}
                                                <button type="button" id="submit" name="submit"
                                                    class="btn btn-primary update-information">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for more addresses --}}
                                <div class="modal fade" id="more-addresses" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">More</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body position-relative other-address-information">
                                                <div class="row gutters">

                                                    @foreach ($nonDefaultAddress as $address)
                                                        <div class="col-6 d-flex align-items-stretch "
                                                            onclick="showUpdateForm({{ $address->id }})">
                                                            <div class="bg-white card addresses-item mb-4 shadow-sm w-100 other-address-item"
                                                                address="{{ $address->id }}">
                                                                <div class="default-address p-3">
                                                                    <div class="media">
                                                                        <div class="mr-3"><i
                                                                                class="icofont-briefcase icofont-3x"></i>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                </div>
                                                                                <div class="col-2 text-end">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-1">{{ $address->receiver }}
                                                                                {{ $address->phone }}</p>
                                                                            <p class="mb-1">{{ $address->street }},
                                                                                {{ $address->ward }}</p>
                                                                            <p>
                                                                                {{ $address->city }},
                                                                                {{ $address->state }}
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        {{-- Update form --}}
                                                        <div id="update-form-{{ $address->id }}" style="display: none">
                                                            <div class="modal-body">
                                                                <div class="media-body">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-6">

                                                                            <div class="form-floating mb-3">
                                                                                <input type="email" class="form-control"
                                                                                    id="receiver-{{ $address->id }}"
                                                                                    value="{{ $address->receiver }}">
                                                                                <label for="receiver">Receiver</label>
                                                                            </div>
                                                                            <div class="form-floating mb-3">
                                                                                <input id="street-{{ $address->id }}"
                                                                                    class="form-control"
                                                                                    placeholder="inputhere"
                                                                                    value="{{ $address->street }}">
                                                                                <label>Đường</label>

                                                                            </div>
                                                                            <div class="form-floating mb-3">

                                                                                <input type="text"
                                                                                    id="district-{{ $address->id }}"
                                                                                    class="form-control district dropdown-toggle"
                                                                                    data-bs-toggle="dropdown"
                                                                                    placeholder="inputhere"
                                                                                    value="{{ $address->city }}"
                                                                                    oninput="disSearch()">
                                                                                <label>Quận/Huyện</label>
                                                                                <ul class="dropdown-menu"
                                                                                    id="district_list">
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">

                                                                            <div class="form-floating mb-3">
                                                                                <input type="phone" class="form-control"
                                                                                    id="phone-{{ $address->id }}"
                                                                                    value="{{ $address->phone }}">
                                                                                <label for="phone">Phone number</label>
                                                                            </div>
                                                                            <div class="form-floating mb-3">
                                                                                <input type="text"
                                                                                    id="province-{{ $address->id }}"
                                                                                    class="form-control province dropdown-toggle"
                                                                                    data-bs-toggle="dropdown"
                                                                                    placeholder="inputhere"
                                                                                    value="{{ $address->state }}" \
                                                                                    oninput="proSearch()">
                                                                                <label>Tỉnh/Thành</label>
                                                                                <ul class="dropdown-menu"
                                                                                    id="province_list">
                                                                                </ul>
                                                                            </div>
                                                                            <div class="form-floating mb-3">
                                                                                <input type="text"
                                                                                    id="ward-{{ $address->id }}"
                                                                                    class="form-control ward dropdown-toggle"
                                                                                    data-bs-toggle="dropdown"
                                                                                    placeholder="inputhere"
                                                                                    value="{{ $address->ward }}"
                                                                                    oninput="warSearch()">
                                                                                <label>Phường/Xã</label>
                                                                                <ul class="dropdown-menu" id="ward_list">
                                                                                </ul>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        onclick="cancelUpdateForm({{ $address->id }})">Close</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        onclick="deleteAddress({{ $address->id }})">Delete</button>

                                                                    <button type="button"
                                                                        class="btn btn-primary update-address"
                                                                        target-id={{ $address->id }}>Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                {{-- <div class="col-6 d-flex align-items-stretch" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <div class="bg-white card addresses-item mb-4 shadow-sm w-100">
                                                    <div class="default-address p-3">
                                                        <div class="media">
                                                            <div class="mr-3"><i
                                                                    class="icofont-briefcase icofont-3x"></i></div>
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bolder">Default</p>

                                                                    </div>
                                                                    <div class="col-2 text-end">
                                                                        <i class="fas fa-edit"></i>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-1">{{ $address->receiver }}
                                                                    {{ $address->phone }}</p>
                                                                <p class="mb-1">{{ $address->street }},
                                                                    {{ $address->ward }}</p>
                                                                <p>
                                                                    {{ $address->city }},
                                                                    {{ $address->state }}
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div> --}}
                                                {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters mt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                {{-- <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button> --}}
                                                <button type="button" id="submit" name="submit"
                                                    class="btn btn-primary update-information">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for create address --}}
                                <div class="modal fade" id="createAddress" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create new address</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row d-flex">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" id="new-receiver" class="form-control"
                                                                placeholder="inputhere">
                                                            <label>Receiver</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="phone" id="new-phone" class="form-control"
                                                                placeholder="inputhere">
                                                            <label>Phone number</label>

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <div class="col-12">

                                                        <div class="form-floating mb-3">
                                                            <input id="new-street" class="form-control"
                                                                placeholder="inputhere">
                                                            <label>Đường</label>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" id="new-province"
                                                                class="form-control province dropdown-toggle"
                                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                                oninput="proSearch()">
                                                            <label>Tỉnh/Thành</label>
                                                            <ul class="dropdown-menu" id="province_list"></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                        <div class="form-floating mb-3">

                                                            <input type="text" id="new-district"
                                                                class="form-control district dropdown-toggle"
                                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                                oninput="disSearch()">
                                                            <label>Quận/Huyện</label>
                                                            <ul class="dropdown-menu" id="district_list"></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                                        <div class="form-floating mb-3">
                                                            <input type="text" id="new-ward"
                                                                class="form-control ward dropdown-toggle"
                                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                                oninput="warSearch()">
                                                            <label>Phường/Xã</label>
                                                            <ul class="dropdown-menu" id="ward_list"></ul>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        class="btn btn-primary create-new-address">Let's go</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters mt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                {{-- <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button> --}}
                                                <button type="button" id="submit" name="submit"
                                                    class="btn btn-primary update-information">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif(is_null($address))
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 normal-text fs-2">Default address</h6>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="receiver" class="form-control"
                                                placeholder="inputhere">
                                            <label>Receiver</label>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="phone" id="phone" class="form-control"
                                                placeholder="inputhere">
                                            <label>Phone number</label>

                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-12">

                                        <div class="form-floating mb-3">
                                            <input id="street" class="form-control" placeholder="inputhere">
                                            <label>Đường</label>

                                        </div>

                                    </div>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="province"
                                                class="form-control province dropdown-toggle" data-bs-toggle="dropdown"
                                                placeholder="inputhere" oninput="proSearch()">
                                            <label>Tỉnh/Thành</label>
                                            <ul class="dropdown-menu" id="province_list"></ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-floating mb-3">

                                            <input type="text" id="district"
                                                class="form-control district dropdown-toggle" data-bs-toggle="dropdown"
                                                placeholder="inputhere" oninput="disSearch()">
                                            <label>Quận/Huyện</label>
                                            <ul class="dropdown-menu" id="district_list"></ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                        <div class="form-floating mb-3">
                                            <input type="text" id="ward"
                                                class="form-control ward dropdown-toggle" data-bs-toggle="dropdown"
                                                placeholder="inputhere" oninput="warSearch()">
                                            <label>Phường/Xã</label>
                                            <ul class="dropdown-menu" id="ward_list"></ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="row gutters mt-4">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            {{-- <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button> --}}
                                            <button type="button" id="submit" name="submit"
                                                class="btn btn-primary update-new-address">Update</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- Import jquery --}}

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                console.log(@json($nonDefaultAddress));

                function showUpdateForm(id) {
                    document.querySelectorAll('.other-address-item').forEach(function(item) {
                        item.style.display = 'none';
                    });
                    document.getElementById('update-form-' + id).style.display = 'block';
                }

                function cancelUpdateForm(id) {
                    document.getElementById('update-form-' + id).style.display = 'none';
                    document.querySelectorAll('.other-address-item').forEach(function(item) {
                        item.style.display = 'block';
                    });
                }
                const deleteAddress = (id) => {
                    let url = "{{ route('api.delete-address') }}";
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    axios.post(url, {
                            address_id: id,
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        })
                        .then(function(response) {
                            console.log(response);
                            if (response.data.statusCode == 200) {
                                document.querySelector('.other-address-quantity').innerHTML = `${parseInt(document
                                    .querySelector('.other-address-quantity').innerHTML) - 1} address more`;
                                document.querySelectorAll('.other-address-item').forEach(function(item) {
                                    if (parseInt(item.getAttribute('address')) == id) {
                                        item.style.display = 'none';
                                        console.log(item.getAttribute('address'));
                                    } else {
                                        console.log('blocking')
                                        item.style.display = 'block';
                                    }
                                });
                                document.getElementById('update-form-' + id).style.display = 'none';



                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
                const updateAddress = document.querySelectorAll('.update-address');
                if (updateAddress) {
                    updateAddress.forEach(function(item) {
                        item.addEventListener('click', function() {
                            let userId = {{ $user->id }};
                            let receiver = document.querySelector('#receiver-' + item.getAttribute('target-id'))
                                .value;
                            let phone = document.querySelector('#phone-' + item.getAttribute('target-id')).value;
                            let province = document.querySelector('#province-' + item.getAttribute('target-id'))
                                .value;
                            let district = document.querySelector('#district-' + item.getAttribute('target-id'))
                                .value;
                            let ward = document.querySelector('#ward-' + item.getAttribute('target-id')).value;
                            let address = document.querySelector('#street-' + item.getAttribute('target-id')).value;
                            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            let url = "{{ route('api.update-address') }}";
                            axios.post(url, {
                                    address_id: item.getAttribute('target-id'),
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

                                    console.log(response.data);
                                    if (response.data["statusCode"] == 200) {
                                        window.location.reload();
                                        setTimeout(function() {
                                            var alertSuccess = document.getElementById('alert-success');
                                            alertSuccess.innerHTML = response.data.Message;
                                            alertSuccess.classList.remove('visually-hidden');
                                        }, 1000);
                                        setTimeout(function() {
                                            alertSuccess.classList.add('visually-hidden');
                                        }, 2000);

                                    }
                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                        });
                    })
                }

                const updateInformation = document.querySelector('.update-information');
                if (updateInformation) {

                    updateInformation.addEventListener('click', () => {
                        let userId = {{ $user->id }};
                        let name = document.querySelector('#name-input').value;
                        let email = document.querySelector('#email-input').value;
                        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        let url = "{{ route('api.update-profile') }}";
                        axios.post(url, {
                                userId: userId,
                                name: name,
                                email: email,
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
                    })
                }

                const createNewAddress = document.querySelector('.create-new-address');
                if (createNewAddress) {
                    createNewAddress.addEventListener('click', function() {
                        let url = "{{ route('api.create-new-address') }}";
                        let userId = {{ $user->id }};
                        let receiver = document.querySelector('#new-receiver').value;
                        let phone = document.querySelector('#new-phone').value;
                        let province = document.querySelector('#new-province').value;
                        let district = document.querySelector('#new-district').value;
                        let ward = document.querySelector('#new-ward').value;
                        let address = document.querySelector('#new-street').value;
                        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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

                                console.log(response.data);
                                if (response.data["statusCode"] == 200) {
                                    console.log('hello')
                                    // Store a flag in localStorage to show the alert after reload
                                    localStorage.setItem('showAlert', 'true');
                                    // Reload the page
                                    location.reload();

                                }
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    });
                }
                // window.onload = function() {
                //     // Check if the showAlert flag is set in localStorage
                //     if (localStorage.getItem('showAlert') === 'true') {
                //         // Show the alert
                //         var alertSuccess = document.getElementById('alert-success');
                //         alertSuccess.innerHTML = response.data.Message;
                //         alertSuccess.classList.remove('visually-hidden');
                //         setTimeout(function() {
                //             alertSuccess.classList.add('visually-hidden');
                //         }, 4000);

                //         // Remove the showAlert flag from localStorage
                //         localStorage.removeItem('showAlert');
                //     }
                // }

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
                    // var pro = $("#province").val();
                    $(".province").each(function() {
                        var $provinceList = $('<ul class="dropdown-menu province-list"></ul>');
                        for (i in dvhcData["province"]) {
                            var dpro = dvhcData["province"][i]["name"],
                                dproid = dvhcData["province"][i]["id"];
                            $provinceList.append(
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
                        $(this).after($provinceList);
                        disSearch();
                    });
                }

                function disSearch() {
                    $(".district").each(function() {
                        var dis = $(this).val();
                        var $districtList = $('<ul class="district-list dropdown-menu"></ul>');
                        if ($(".province").val()) {
                            if (pdaData["province_id"]) {
                                for (i in dvhcData["province"]) {
                                    if (pdaData["province_id"] == dvhcData["province"][i]["id"]) {
                                        for (j in dvhcData["province"][i]["district"]) {
                                            var d = dvhcData["province"][i]["district"][j]["name"],
                                                did = dvhcData["province"][i]["district"][j]["id"];
                                            if (dis) {
                                                if (toQuery(d).indexOf(toQuery(dis)) >= 0) {
                                                    $districtList.append(
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
                                                $districtList.append(
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
                                $districtList.append(
                                    '<li><a class="dropdown-item">Vui lòng chọn Tỉnh/Thành</a></li>'
                                );
                            }
                        } else {
                            pdaData["province_id"] = "";
                            $districtList.append(
                                '<li><a class="dropdown-item">Vui lòng chọn Tỉnh/Thành</a></li>'
                            );
                        }
                        $(this).after($districtList);
                        warSearch();
                    });
                }

                function warSearch() {
                    $(".ward").each(function() {
                        var war = $(this).val();
                        var $wardList = $('<ul class="ward-list dropdown-menu"></ul>');

                        if ($(".district").val() && $(".province").val()) {
                            if (pdaData["province_id"] && pdaData["district_id"]) {
                                for (i in dvhcData["province"]) {
                                    if (pdaData["province_id"] == dvhcData["province"][i]["id"]) {
                                        for (j in dvhcData["province"][i]["district"]) {
                                            if (pdaData["district_id"] == dvhcData["province"][i]["district"][j]["id"]) {
                                                for (k in dvhcData["province"][i]["district"][j]["ward"]) {
                                                    var d = dvhcData["province"][i]["district"][j]["ward"][k]["name"],
                                                        did = dvhcData["province"][i]["district"][j]["ward"][k]["id"];
                                                    if (war) {
                                                        if (toQuery(d).indexOf(toQuery(war)) >= 0) {
                                                            $wardList.append(
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
                                                        $wardList.append(
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
                                $wardList.append(
                                    '<li><a class="dropdown-item">Vui lòng chọn Quận/Huyện</a></li>'
                                );
                            }
                        } else {
                            if (!$(".province").val()) {
                                pdaData["province_id"] = "";
                            }
                            if (!$(".district").val()) {
                                pdaData["district_id"] = "";
                            }
                            $wardList.append(
                                '<li><a class="dropdown-item">Vui lòng chọn Quận/Huyện</a></li>'
                            );
                        }
                        $(this).after($wardList);
                    });
                }

                function addpda(id, val, d) {
                    $('.' + id).val(val);
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
                    if (id == 'province') {
                        $('.district').val('');
                        $('.ward').val('');
                        pdaData["district_id"] = '';
                        pdaData["ward_id"] = '';
                        setTimeout(disSearch, 100);
                    }
                    if (id == 'district') {
                        $('.ward').val('');
                        pdaData["ward_id"] = '';
                        setTimeout(function() {
                            warSearch(pdaData["district_id"]);
                        }, 100);
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
