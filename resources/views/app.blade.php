<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


    @viteReactRefresh
    @vite(['resources/js/app.jsx', 'resources/js/app.js', "resources/js/Pages/{$page['component']}.jsx"])

    @inertiaHead
</head>

<body>
    @inertia

</body>
