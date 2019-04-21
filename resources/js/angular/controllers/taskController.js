(function () {
    'use strict';

    angular
        .module('app')
        .controller('TaskController', TaskController);

        TaskController.$inject = ['$scope', '$http'];

    function TaskController($scope, $http) {
        var taskCtrl = this;
        //variables
        taskCtrl.clients = [];
        taskCtrl.errors = [];
        taskCtrl.initData = {
            produto: '',
            descricao: ''
        };
        taskCtrl.meunome = "Fabrício";

        //functions
        taskCtrl.init = init;
        taskCtrl.initTask = initTask;
        taskCtrl.deleteProduto = deleteProduto;
        taskCtrl.addProduto = addProduto;
        taskCtrl.openModal = openModal;
        taskCtrl.recordErrors = recordErrors;
        taskCtrl.resetForm = resetForm;

        function init(){
            initTask();
        }

        //List produtos
        function initTask(){
            
            $http.get('/task')
                .then(function success(e){
                    taskCtrl.produtos = e.data;
                    console.log(e.data);
                });
        }

        //Delete Produto
        function deleteProduto(index){
            var index = index;

            var conf = confirm("Tem a certeza que deseja apagar esse item?");

            if(conf === true){
                $http.delete('/task/' + taskCtrl.produtos[index].id)
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
            taskCtrl.resetForm();
            $("#add_new_produto").modal('show');

        }

        function addProduto(){
            $http.post('/task', {
                produto: taskCtrl.initData.produto,
                descricao: taskCtrl.initData.descricao
                }).then(function success(e){
                    taskCtrl.resetForm();
                    taskCtrl.produtos.push(e.data.produtos);
                    $("#add_new_produto").modal('hide');
                },function error(error){
                    taskCtrl.recordErrors(error);
                });
        }

        function recordErrors(error) {
            taskCtrl.errors = [];
            if (error.data.errors.produto) {
                taskCtrl.errors.push(error.data.errors.produto[0]);
            }
    
            if (error.data.errors.descricao) {
                taskCtrl.errors.push(error.data.errors.descricao[0]);
            }
        };

        function resetForm(){
            taskCtrl.initData.produto = '';
            taskCtrl.initData.descricao = '';
            taskCtrl.errors = [];
        }
        
    }
})();

