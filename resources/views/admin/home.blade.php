@extends('admin.layouts.index')

@section('content')
    <div class="table-name">{{ucfirst($table)}} list</div>
    <button class="create">Create</button>
    <table class="table-control">
        <tr>
            @foreach ($data[0] as $key => $value)
                <th>{{ ucfirst($key) }}</th>
            @endforeach
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($data as $row)
            <tr>
                @foreach ($row as $value)
                    <td>{{ $value }}</td>
                @endforeach
                <td>
                @if ($table === 'product' && isset($row->productDetailId))
                    <a href="/adminn/{{ $table }}/edit/{{ $row->productDetailId }}">
                @else
                    <a href="/adminn/{{ $table }}/edit/{{ isset($row->id) ? $row->id : '' }}">
                @endif
                        <i class="fa-solid fa-pen"></i>
                    </a>
                </td>
                <td>
                @if ($table === 'product' && isset($row->productDetailId))
                    <a  class="delete-btn" value="{{$row->productDetailId}}">
                @else
                    <a  class="delete-btn" value="{{isset($row->id) ? $row->id : ''}}">
                @endif
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection


@section('script')
<script>
    // DELETE PRODUCT
    var table = {!! json_encode($table) !!};
    var createBtn = document.getElementsByClassName('create')[0]
    createBtn.addEventListener('click',function(){
        if (table === 'user'){
            window.location.href = '/adminn/user/create'
        }
        else if (table === 'product'){
            window.location.href = '/adminn/product/create'
        }
    })
    var deleteBtns = document.querySelectorAll('.delete-btn')
    deleteBtns.forEach((item) => {
        item.addEventListener('click', function() {
            let id = item.getAttribute('value');
            if (table === 'user'){
                // Send a DELETE request using Fetch API
                fetch('/api/delete-user?id=' + id, {
                    method: 'DELETE'
                })
                .then(response=>response.json())
                .then(data => {
                    console.log(data)
                    if (data.errCode === '200') {
                        window.location.href = '/adminn/users'
                    } 
                })
                .catch(error => {
                    // Error occurred during the request
                    alert('An error occurred while processing the request.');
                    console.error(error);
                });
            } else if (table === 'product'){
                fetch('/api/delete-product?productDetailId=' + id, {
                    method: 'DELETE'
                })
                .then(response=>response.json())
                .then(data => {
                    console.log(data)
                    if (data.errCode === '200') {
                        window.location.href = '/adminn/products'
                    } 
                })
                .catch(error => {
                    // Error occurred during the request
                    alert('An error occurred while processing the request.');
                    console.error(error);
                });
            }
        })
    })
</script>

@endsection