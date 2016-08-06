<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sambhu Raj Singh">
    <meta name="description" content="Browse Public Repository">
    <meta name="theme-color" content="#d50000">
    <title>
        @yield('pageTitle', 'Code Explorer')
    </title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    @yield('pageSpecificCss')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    @include('layout.partials.nav')

    <div class="container-fluid browse-section">
        <div class="container browse-form">
            <form class="form-inline" action="/" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="RepositoryOwner"><small>Owner</small></label>
                    <br>
                    <input
                        type="text"
                        class="form-control"
                        id="RepositoryOwner"
                        name="repositoryOwner"
                        value="{{ $repositoryOwner }}"
                    >
                </div>

                <div class="form-group">
                    <label for="RepositoryName"><small>Repository Name</small></label>
                    <br>
                    <input
                        type="text"
                        class="form-control"
                        id="RepositoryName"
                        name="repositoryName"
                        value="{{ $repositoryName }}"
                    >
                </div>

                <div class="form-group">
                    <label><small>&nbsp;</small></label>
                    <br>
                    <button type="submit" class="btn btn-default">View Commits</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container body-container">
        @yield('content')
    </div>

    <script src="{{ elixir('js/all.js') }}"></script>

    @yield('pageSpecificScript')

</body>
</html>
