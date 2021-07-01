@extends('layouts.app')

@section('content')

<a href="{{route('roles.index')}}" class="btn btn-outline-dark">back</a>
    <div class="card">
        <div class="card-header">Add New Role</div>

        <div class="card-body">

            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="title" class="required col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permissions" class="col-md-4 col-form-label text-md-right">Permissions</label>

                    <div class="col-md-6">
                        <select name="permissions[]" class="form-control permissions" multiple>
                            @foreach ($permissions as $id => $permission)
                                <option value="{{ $id }}">{{ $permission }}</option>
                            @endforeach
                        </select>
           
                        @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('.permissions').select2({
        placeholder: "Select an option",
        allowClear: true 
    });
});
</script>
    
@endsection
{{-- @foreach ($permissions as $id => $permission)
<option value="{{ $id }}" {{ (in_array($id, old('permissions', []))) ? 'selected' : '' }}>{{ $permission }}</option>
@endforeach --}}