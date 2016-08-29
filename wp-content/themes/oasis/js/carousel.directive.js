angular
	.module('app')
	.directive('carousel', carousel)

carousel.$inject = ['$timeout'];
function carousel($timeout){
	var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;

    function link(scope, element, attrs) {
        
        var list = element.find('ul'),
            listWidth = parseInt(list.css('width')),
            transformWidth = 100 / listWidth * 100,
            i = 0,
            pages = Math.ceil(100/transformWidth);
        
        scope.move = function(back) {
            if(back && i>0) {
                i--;
                transform = 'translateX(' + i*transformWidth + '%)';
                list.css('transform', transform);
            } else if(!back && i < pages-1) {
                i++;
                transform = 'translateX(-' + i*transformWidth + '%)';
                list.css('transform', transform);
            } else if(back && i===0) {
                list.css('transition-duration', '0.3s');
                list.css('transform', 'translateX(15%)');
                $timeout(function(){
                    list.css('transform', 'translateX(0)');
                    $timeout(function(){
                        list.css('transition-duration', '0.5s');
                    }, 300)
                }, 300)
            } else {
                list.css('transition-duration', '0.3s');
                list.css('transform', 'translateX(-' + (i*transformWidth + 15) + '%)');
                $timeout(function(){
                    list.css('transform', 'translateX(-' + i*transformWidth + '%)');
                    $timeout(function(){
                        list.css('transition-duration', '0.5s');
                    }, 300)
                }, 300)
            }
        }
    }
}