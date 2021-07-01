@extends('layouts.app')

@section('content')
    <a href="{{route('employees.create')}}" class="btn btn-outline-primary float-right">create</a>
</br>
</br>
    <div class="container">
        <x-alert/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header">List</div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable">
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>created by</th>
                                <th>photos</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            @php $i = 1; @endphp
                            @foreach($employees as $employee)
                                <tr id="employee{{$employee->id}}">
                                    <td>{{$i++}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->author}}</td>
                                    <td>{{$employee->user->name}}</td>
                                        <td><img height="100px" src="{{asset($employee->image)}}"></td>
                                    <td>
                                        <a href="{{route('employees.show',$employee->id)}}"
                                           class="btn btn-success">show</a>
                                    </td>
                                    <td>
                                        <a href="{{route('employees.edit',$employee->id)}}"
                                           class="btn btn-success">edit</a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger delete" data-id="{{$employee->id}}">delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        {{--let Url = "{{ route('employees.index') }}";--}}

        {{--$(document).ready(function () {--}}
        {{--    $.ajaxSetup({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $(".delete").on('click',function (){--}}
        {{--        Swal.fire({--}}
        {{--            title: 'Are you sure?',--}}
        {{--            text: "You won't be able to revert this!",--}}
        {{--            icon: 'warning',--}}
        {{--            showCancelButton: true,--}}
        {{--            confirmButtonColor: '#3085d6',--}}
        {{--            cancelButtonColor: '#d33',--}}
        {{--            confirmButtonText: 'Yes, delete it!'--}}
        {{--        }).then((result) => {--}}
        {{--            if (result.isConfirmed) {--}}
        {{--                Swal.fire(--}}
        {{--                    'Deleted!',--}}
        {{--                    'Your file has been deleted.',--}}
        {{--                    'success'--}}
        {{--                )--}}
        {{--            }--}}
        {{--        })--}}
        {{--        var id = $(this).data("id");--}}
        {{--        Swal.fire({--}}
        {{--            title: 'Are you sure?',--}}
        {{--            text: "You won't be able to revert this!",--}}
        {{--            icon: 'warning',--}}
        {{--            showCancelButton: true,--}}
        {{--            confirmButtonColor: '#3085d6',--}}
        {{--            cancelButtonColor: '#d33',--}}
        {{--            confirmButtonText: 'Yes, delete it!'--}}
        {{--        }).then((result) => {--}}
        {{--            if (result.isConfirmed) {--}}
        {{--        $.ajax({--}}
        {{--            type: "DELETE",--}}
        {{--            url: Url + '/' + id,--}}
        {{--            success: function (response) {--}}
        {{--                $('#employee'+id).remove()--}}
        {{--                Swal.fire(--}}
        {{--                    'Deleted!',--}}
        {{--                    'Your file has been deleted.',--}}
        {{--                    'success'--}}
        {{--                )--}}
        {{--                console.log(response)--}}
        {{--            }--}}
        {{--        });--}}
        {{--            }--}}
        {{--        });--}}
        {{--    });--}}
        {{--});--}}
    </script>

@endsection
