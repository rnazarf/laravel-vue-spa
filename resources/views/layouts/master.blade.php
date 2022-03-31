<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrator Area</title>

    @include('partials.head')

</head>

<body>

    <div id="app">

        @include('partials.navbar')

        <main class="content">

            @include('partials.navbar-sub')

            <router-view></router-view>

            <vue-progress-bar></vue-progress-bar>

            @include('partials.footer')

        </main>

    </div>

    @include('partials.script')

</body>

</html>
