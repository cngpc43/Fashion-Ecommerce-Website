@extends('admin.layouts.index')
@section('content')
<div class="table-name">{{$table}} edit</div>

@foreach($data as $key => $value)
    <div class="form-edit">
        <label>{{$key}}</label>
        <input {{ $key === 'email' ? 'disabled' : '' }} type="text" name="{{ $key }}" value="{{ $value }}"></input>
    </div>
@endforeach
    <div style="padding: 40px;">
        <button onclick=HandleChange() class="submit-change-btn" type="submit">Change</button>
    </div>
@endsection



@section('script')
<script>
var table = {!! json_encode($table) !!};
var productDetailId={{$productDetailId}};
var id={{$id}};


let btn = document.getElementsByClassName('submit-change-btn')[0]
function HandleChange(){
    if (table === 'Product'){
        let img = document.getElementsByName('img')[0].value;
        let color = document.getElementsByName('color')[0].value;
        let stock = document.getElementsByName('stock')[0].value;
        let name = document.getElementsByName('name')[0].value;
        let size = document.getElementsByName('size')[0].value;

        let categoryId = document.getElementsByName('categoryId')[0].value;
        let collectionId = document.getElementsByName('collectionId')[0].value;
        let price = document.getElementsByName('price')[0].value;
        let description = document.getElementsByName('description')[0].value;
        let salePercent = document.getElementsByName('salePercent')[0].value;
        var requestBody = {
        img: img,
        color: color,
        stock: stock,
        name: name,
        size:size,
        categoryId: categoryId,
        collectionId: collectionId,
        price: price,
        description: description,
        salePercent: salePercent,
        productDetailId:productDetailId,
        };
        fetch(`/api/update-product`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Replace with the actual CSRF token
        },
        body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.errCode === 200) {
                // Redirect to the /admin/products page
                window.location.href = '/adminn/products';
            }
            // Process the response data as needed
        })
        .catch(error => {
            console.log(error)
            // Handle the error
        });
    } else if (table === 'User'){
        let name = document.getElementsByName('name')[0].value;
        let address = document.getElementsByName('address')[0].value;
        let phoneNumber = document.getElementsByName('phoneNumber')[0].value;
        let roleId = document.getElementsByName('roleId')[0].value;
        let email = document.getElementsByName('email')[0].value;

        var requestBody = {
            email:email,
            name: name,
            address: address,
            phoneNumber: phoneNumber,
            roleId: roleId,
        };
        fetch(`/api/update-user`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Replace with the actual CSRF token
        },
        body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.errCode === 200) {
                // Redirect to the /admin/products page
                window.location.href = '/adminn/users';
            }
            // Process the response data as needed
        })
        .catch(error => {
            console.error(error);
            // Handle the error
        });
    }
}

</script>
@endsection