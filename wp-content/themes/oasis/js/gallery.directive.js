angular
	.module('app')
	.directive('gallery', gallery)

gallery.$inject = ['$timeout'];
function gallery($timeout){
	var directive = {
        link: link,
        templateUrl: '/wp-content/themes/oasis/js/gallery.directive.html',
        scope: {
        	images: '=gallery'
        },
        restrict: 'A'
    };
    return directive;

    function link(scope, element, attrs) {
    	scope.i = 0;
    	var list = element.find('ul'),
            transformWidth = 100 / scope.images.length,
            pages = Math.ceil(100/transformWidth);
        
        scope.move = function(back) {
            if(back && scope.i>0) {
                scope.i--;
                transform = 'translateX(' + scope.i*transformWidth + '%)';
                list.css('transform', transform);
            } else if(!back && scope.i < pages-1) {
                scope.i++;
                transform = 'translateX(-' + scope.i*transformWidth + '%)';
                list.css('transform', transform);
            } else if(back && scope.i===0) {
                list.css('transition-duration', '0.3s');
                list.css('transform', 'translateX(5%)');
                $timeout(function(){
                    list.css('transform', 'translateX(0)');
                    $timeout(function(){
                        list.css('transition-duration', '0.5s');
                    }, 300)
                }, 300)
            } else {
                list.css('transition-duration', '0.3s');
                list.css('transform', 'translateX(-' + (scope.i*transformWidth + 5) + '%)');
                $timeout(function(){
                    list.css('transform', 'translateX(-' + scope.i*transformWidth + '%)');
                    $timeout(function(){
                        list.css('transition-duration', '0.5s');
                    }, 300)
                }, 300)
            }
        }
    }
}