<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @if(session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif
</div>
