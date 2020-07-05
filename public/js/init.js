
var App = angular.module('App', []);

angular.module('App').controller('UsersController', function ($window, $scope, $rootScope, $http, $timeout, $interval)
{

  $scope.headers = [
      { "order": 1, "width": 50, "label": "ID", "data": "id", "type": "string", "visible": true },
      { "order": 2, "width": 120, "label": "Name", "data": "name", "type": "string", "visible": true },
      { "order": 3, "width": 200, "label": "E-mail", "data": "email", "type": "string", "visible": true },
      { "order": 4, "width": 100, "label": "Status", "data": "status_str", "type": "string", "visible": true },
      { "order": 4, "width": 120, "label": "Acessos", "data": "acessos", "type": "string", "visible": true },
  ];

  $scope.headerOrder = "order";

  $scope.headerFilter = function(header) {
      return header.visible;
  };

  $scope.users = [];
  
  $scope.filtros = {
      search: '',
      limit : 10,
      page : 1,
      max_acess : false,
      min_acess : false,
      order : 'asc',
  };

  $scope.change_order = function($key)
  {
    if($key==='name')
    {
      $scope.filtros.order = $scope.filtros.order === 'asc' ? 'desc' : 'asc';
      $scope.get();
    };
  }
  $scope.paginas = []

  $scope.paginacao = function($total)
  {
    $scope.paginas = [];
    for (var i = 0; i < $total; i++) {
      $scope.paginas[i] = parseInt(i)+1;
    };


  };

  $scope.get_page = function($pag)
  {
    $scope.filtros.page = parseInt($pag);
    $scope.get();
  }

  $scope.get  = function() 
  {

    $http({
      url: './api/get',
      headers: { 'Content-Type': 'application/json' },
      dataType: 'json',
      data : $scope.filtros,
      method: "POST"
    }).then(function( r)
      {
        var response = r.data;

        if(response.status === true)
        {
          $scope.users = response.data;
          $timeout(function(){
            $scope.paginacao(response.data.last_page);
          }, 0, true);
        };

      }, function( e )
      {
        $scope.users = [];
      }
    );

  }

  $scope.get();


  $scope.userOrder = function(key)
  {
      angular.forEach($scope.headers, function(header){
          if(header.data == key)
          {
              if(header.visible)
              {
                  return header.order;
              };
          };
      });

      return -1;
  };
});
