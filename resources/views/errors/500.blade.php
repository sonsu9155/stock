<!DOCTYPE html>
<html>

<head>
    <title>500 | {!! Config::get('app.name') !!}</title>
    @include('bsb.partials.head')
</head>

<body class="five-zero-zero">
    <div class="five-zero-zero-container">
        <div class="error-code">500</div>
        <div class="error-message">Internal Server Error</div>
        <div class="button-place">
            <a href="../../index.html" class="btn btn-default btn-lg waves-effect">GO TO HOMEPAGE</a>
        </div>
    </div>

    {!! Assets::add('default')->js() !!}
</body>

</html>
