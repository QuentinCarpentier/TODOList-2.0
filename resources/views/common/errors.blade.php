@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
    <strong>BADABOOM ! Il semblerait que quelque chose se soit mal passé !</strong>

    <br><br>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif