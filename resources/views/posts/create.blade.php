@extends('layouts.app')
@section('content')
    <div class="container">
        <x-alert/>
        <a href="{{route('posts.index')}}" class="btn btn-outline-dark">back</a>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create</div>
                    <div class="card-body">
                        <form action="{{route('posts.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control " name="name" placeholder="Enter name" id="name">
                                @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <input type="text" class="form-control" name="comment" placeholder="Enter comment"
                                       id="comment">
                                @error('comment')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="employee">Employee:</label>
                                <select name="employee_id" class="form-control employee">
                                    <option >select an option</option>
                                    @foreach($employees as $employee)

                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('.employee').select2({
        placeholder: "Select an option",
        allowClear: true 
    });
});
</script>
    
@endsection