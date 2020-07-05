<!DOCTYPE html>
<html ng-app="App" >
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Teste Jociel Usuarios</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   

   <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    <style type="text/css">
        
    </style>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.8/angular.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/init.js') }}"></script>


</head>
<body>
   <div class="container" ng-controller="UsersController">

    <p>Pesquisar: <input type="text" ng-model="filtros.search" ng-keyup="get();" ></p>

      <table class="table table-striped">
         <thead>
         <tr>
            <th ng-repeat="header in headers | filter:headerFilter | orderBy:headerOrder" width="@{{header.width}}" ng-click="change_order(header.data)" style="cursor: pointer;">@{{header.label}}</th>
            </tr>
         </thead>
         <tbody>
            <tr ng-repeat="content in users.data">
                @{{user}}
                <td>@{{content.id}}</td>
                <td>@{{content.name}}</td>
                <td>@{{content.email}}</td>
                <td>@{{content.status_str}}</td>
                <td>@{{content.acessos}}</td>
            </tr>
         </tbody>
      </table>
      <div>Paginação: 
            <select ng-change="get()" ng-model="filtros.limit">
                <option selected ng-value="10">10</option>
                <option ng-value="20">20</option>
                <option ng-value="30">30</option>
                <option ng-value="40">40</option>
            </select>
    </div>
    <div>
        <ul class="pagination" role="navigation">

            <li ng-repeat="pag in paginas" class="page-item" aria-current="page"><span class="page-link" ng-click="get_page(pag)" ng-class="{'active': filtros.page == parseInt(pag) } ">@{{pag}}</span></li>
                    
            </li>
        </ul>
    </div>
   </div>
</body>
</html>