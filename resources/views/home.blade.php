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

    <div class="row">
        <div col-md-4>
            <p>Pesquisar: <input type="text" ng-model="filtros.search" ng-keyup="get();" ></p>
        </div>

        <div col-md-3>
            <input type="radio" value="1" name="max_acess"  selected="selected" ng-click="set_acessos(false, false)"> Todos.
        </div>
        <div col-md-3>
            <input type="radio" value="2" name="max_acess" ng-click="set_acessos(true, false)"> 10 com mais acessos.
        </div>
        <div col-md-3>
            <input type="radio" value="3" name="max_acess" ng-click="set_acessos(false, true)"> 10 com menos acessos.
        </div>
    </div>


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
      <div class="row">
          <div class="col-md-2">Paginação: 
                <select ng-change="get()" ng-model="filtros.limit">
                    <option selected ng-value="10">10</option>
                    <option ng-value="20">20</option>
                    <option ng-value="30">30</option>
                    <option ng-value="40">40</option>
                </select>
        </div>
        <div class="col-md-8">
            <ul class="pagination" role="navigation">

                <li ng-repeat="pag in paginas" class="page-item" aria-current="page"><span class="page-link" ng-click="get_page(pag)" ng-class="{'active': filtros.page == parseInt(pag) } ">@{{pag}}</span></li>
                        
                </li>
            </ul>
        </div>
    </div>
   </div>
</body>
</html>