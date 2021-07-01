@extends('layouts.app')
@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-outline-primary float-right">create</a>
</br>
</br>
    <div class="container pt-3">
        <x-alert/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lists</div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable">
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>employee name</th>
                                <th>created by</th>
                                <th>Action</th>
                            </tr>
                            @php $i = 1; @endphp
                            @foreach($posts as $post)
                                <tr id="post{{$post->id}}">
                                    <td>{{$i++}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->comment}}</td>
                                    <td>{{$post->employee->name}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger post_delete"
                                                data-id="{{$post->id}}">delete
                                        </button>
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
        $(document).ready(function () {
            let url = "{{route('posts.index')}}"
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".post_delete").on('click', function () {
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
                            url: url + '/' + id,
                            success: function (response) {
                                $('#post' + id).remove()
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                console.log(response)
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection






