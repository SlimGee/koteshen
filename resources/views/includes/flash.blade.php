@foreach (['success', 'error', 'status'] as $type)
    @if (Session($type))
        <div class="" data-controller="toast" data-turbo-temporary="true"
            data-toast-type-value="{{ $type == 'status' ? 'success' : $type }}"
            data-toast-message-value="{{ Session($type) }}">
        </div>
    @endif
@endforeach

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="" data-controller="toast" data-toast-type-value="error"
            data-toast-message-value="{{ $error }}">
        </div>
    @endforeach
@endif
