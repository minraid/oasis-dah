angular
	.module('app')
	.directive('slider', slider)

slider.$inject = ['$timeout'];
function slider($timeout){
	var directive = {
        link: link,
        restrict: 'A',
        templateUrl: '/wp-content/themes/oasis/js/slider.directive.html',
        scope: {
            banners: '=slider'
        }
    };
    return directive;

    function link(scope, element, attrs) {

        var list = element.find('ul'),
            listWidth = scope.banners.length*100,
            transformWidth = 100 / listWidth * 100,
            pages = Math.ceil(listWidth/100);
            i = 0;
            scope.i = 0;
        
        scope.slide = function(back) {
            if(back && i>0) {
                scope.onChange = true;
                $timeout(function(){
                    scope.i--;
                    scope.onChange = false;
                }, 250)
                i--;
                transform = 'translateX(-' + i*transformWidth + '%)';
                list.css('transform', transform);
            } else if(!back && i < pages-1) {
                scope.onChange = true;
                $timeout(function(){
                    scope.i++
                    scope.onChange = false;
                }, 250)
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