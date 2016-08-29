(function() {
    'use strict';

    angular
        .module('app')
        .controller('productCtrl', productCtrl);

    productCtrl.$inject = ['$rootScope'];

    / @ngInject /
    function productCtrl($rootScope) {
        var vm = this;
        vm.showGallery = function(gallery, id) {
            $rootScope.$emit('popup', gallery, id)
        }
    }
})();