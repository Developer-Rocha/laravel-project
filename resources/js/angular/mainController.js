var app = angular.module('LaravelCRUD', [],
    ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);

app.controller('TaskController', ['$scope', '$http', function ($scope, $http){
    
    //variables
    $scope.clients = [];
    $scope.errors = [];
    $scope.initData = {
        produto: '',
        descricao: ''
    };
    $scope.meunome = "Fabrício";

    //functions
    $scope.init = init;
    $scope.initTask = initTask;
    $scope.deleteProduto = deleteProduto;
    $scope.addProduto = addProduto;
    $scope.openModal = openModal;
    $scope.recordErrors = recordErrors;
    $scope.resetForm = resetForm;

    function init(){
        initTask();
    }

    //List produtos
    function initTask(){
        
        $http.get('/task')
            .then(function success(e){
                $scope.produtos = e.data;
                console.log(e.data);
            });
    }

    //Delete Produto
    function deleteProduto(index){
        var index = index;

        var conf = confirm("Tem a certeza que deseja apagar esse item?");

        if(conf === true){
            $http.delete('/task/' + $scope.produtos[index].id)
            .then(function (e){
                if(e.data.Error){
                    console.log('Deu erro,cara');
                } else{
                    initTask();
                    console.log(e.data.msgSuccess);
                }
            });
        }
    }

    function openModal(){
        $scope.resetForm();
        $("#add_new_produto").modal('show');

    }

    function addProduto(){
        $http.post('/task', {
            produto: $scope.initData.produto,
            descricao: $scope.initData.descricao
            }).then(function success(e){
                $scope.resetForm();
                $scope.produtos.push(e.data.produtos);
                $("#add_new_produto").modal('hide');
            },function error(error){
                $scope.recordErrors(error);
            });
    }

    function recordErrors(error) {
        $scope.errors = [];
        if (error.data.errors.produto) {
            $scope.errors.push(error.data.errors.produto[0]);
        }
 
        if (error.data.errors.descricao) {
            $scope.errors.push(error.data.errors.descricao[0]);
        }
    };

    function resetForm(){
        $scope.initData.produto = '';
        $scope.initData.descricao = '';
        $scope.errors = [];
    }
    
}]);