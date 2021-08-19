var repuesto = angular.module("repuesto",[]);


repuesto.controller('RepuestomodalController',['$scope','$http',"$filter",function($scope,$http,$filter){
    $scope.repuesto =[];
    $scope.url =("").val();
    $scope.cargarrepuesto = function(){
        $http.get($scope.url + "repuesto/todos").then(function($request){
            $scope.repuesto = $request.data;
        });

    };

$scope.seleccionarrepuesto = function($id_repuesto){

}

$scope.agregarrepuesto= function(){
    
}
}])