<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Vue Datatables Component Example - ItSolutionStuff.com</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
<!--        <div id="app">
            <example-component></example-component>
        </div>-->
        <div id="vue-root">
            <example1-component :columns="columns" :data="rows"></example1-component>
        </div>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.js" defer></script> 
        <script src="/dist/vuejs-datatable.js" defer></script> 
        <script src="/myscript.js" defer></script> 
        <script src="{{asset('js/app.js')}}" ></script>
    </body>
</html>