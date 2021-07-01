@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <br>
                    <strong>{{Auth::user()->name}}</strong>
                        <br>
                        <table class="table table-bordered" >
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="name" placeholder="Enter title" class="form-control" /></td>
                                <td><button type="button" name="add" id="add_btn" class="btn btn-success">+</button></td>
                            </tr>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
    $(document).ready(function(){
    $("#add_btn").on('click',function (){
        var html='';
        html +='<tr>';
        html +='<td><input type="text" name="name" placeholder="Enter title" class="form-control" /></td>';
        html +=' <td><button type="button" name="sub" id="sub_btn" class="btn btn-primary">-</button></td>';
        html +='</tr>';
        $("tbody").append(html)
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'new input-box'
        })

        $(document).on('click',"#sub_btn",function (){
          $(this).closest('tr').remove()
        });

    });
    });
    </script>
@endsection
