@extends('layouts.app')
@section('content')
    <a href="{{route('blogs.create')}}" class="btn btn-outline-primary float-right">create</a>
</br>
</br>
    <div class="container">
        <x-alert/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lists</div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable">
                            <tr>
                                <th>Sr No.</th>
                                <th>Title</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            @php $i = 1; @endphp
                            @foreach($blogs as $blog)
                                <tr id="blog{{$blog->id}}" >
                                    <td>{{$i++}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        <a href="{{route('blogs.show',$blog->id)}}" class="btn btn-success">show</a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger blog_delete" data-id="{{$blog->id}}">delete</button>
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

let urldelete ="{{route('blogs.index')}}"
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".blog_delete").on('click',function (){
                var id = $(this).data("id");
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
                        $.ajax({
                            type: "DELETE",
                            url: urldelete +'/'+ id,
                            success: function () {
                                $('#blog'+id).remove()
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                console.log('success')
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection






