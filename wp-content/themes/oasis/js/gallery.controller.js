(function() {
    'use strict';

    angular
        .module('app')
        .controller('galleryCtrl', galleryCtrl);

    galleryCtrl.$inject = ['$rootScope'];

    / @ngInject /
    function galleryCtrl($rootScope) {
        var vm = this;
        vm.showGallery = function(gallery, id) {
            $rootScope.$emit('popup', gallery, id)
        }
    }
})();