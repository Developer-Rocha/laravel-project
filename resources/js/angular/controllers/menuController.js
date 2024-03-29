(function () {
    'use strict';

    angular
        .module('app')
        .controller('menuController', menuController);

    menuController.$inject = ['$scope', '$http'];

    function menuController($scope, $http) {
        var menuCtrl = this;

        //Variables
        menuCtrl.expanded = false;
        menuCtrl.sobrenome = "Lopes Rocha";

        //Functions
        menuCtrl.init = init;
        menuCtrl.openMenu = openMenu;

        function init(){

        };

        function openMenu(){
            menuCtrl.expanded = !menuCtrl.expanded;
        }

    }
})();

