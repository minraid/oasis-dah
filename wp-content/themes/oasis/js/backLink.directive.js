angular
	.module('app')
	.directive('backLink', backLink)

backLink.$inject = ['$window'];
function backLink($window){
	var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;

    function link(scope, element, attrs) {
    	element.on('click', function(e){
    		$window.history.back();
    		e.preventDefault();
    	})
    }
}