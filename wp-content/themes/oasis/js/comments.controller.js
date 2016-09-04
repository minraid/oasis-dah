(function() {
    'use strict';

    angular
        .module('app')
        .controller('commentsCtrl', commentsCtrl);

    commentsCtrl.$inject = ['$timeout', '$http'];

    / @ngInject /
    function commentsCtrl($timeout, $http) {
        var vm = this;
        vm.init = init;
        vm.send = send;

        function init(comments, post_id){
            for (var i = 0; i < comments.length; i++) {
                comments[i].comment_date = new Date(comments[i].comment_date);
            }
            vm.post_id = post_id;
            vm.comments = comments;
        }

        function send(form) {
            if(form.$invalid) {
                return;
            }
            vm.sent = false;
            vm.error = false;
            vm.loading = true;
            vm.data.action = 'comment';
            vm.data.ID = vm.post_id;
            $http.get('/wp-admin/admin-ajax.php', {params :vm.data}).then(function(res) {
                insert(res.data);
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

        function insert(comment) {
            comment.comment_date = new Date(comment.comment_date);
            vm.comments.push(comment);
        }
    }
})();