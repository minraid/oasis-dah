(function() {
    'use strict';

    angular
        .module('app')
        .controller('contactCtrl', contactCtrl);

    contactCtrl.$inject = ['$http', '$timeout'];

    / @ngInject /
    function contactCtrl($http, $timeout) {
        var vm = this;
        vm.send = send;

        function send(form) {
            if(form.$invalid) {
                return;
            }
            vm.sent = false;
            vm.error = false;
            vm.loading = true;
            $http.get('/wp-admin/admin-ajax.php', vm.data).then(function(res) {
                vm.loading = false;
                vm.sent = true;
                vm.data = {};
                form.$setPristine();
                form.$setUntouched();
                $timeout(function(){
                    vm.sent = false;
                }, 5000);
            }, function(res) {
                vm.loading = false;
                vm.error = true;
                $timeout(function(){
                    vm.error = false;
                }, 5000);
            })
        }
    }
})();