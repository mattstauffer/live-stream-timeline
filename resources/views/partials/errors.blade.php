@if (! $errors->isEmpty())
<ul class="form-errors alert alert-danger">
    @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach
</ul>
@endif
