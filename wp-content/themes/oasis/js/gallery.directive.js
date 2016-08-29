angular
.module('app')
.directive('gallery', gallery)

gallery.$inject = ['$timeout', '$rootScope'];
function gallery($timeout, $rootScope){
	var directive = {
		link: link,
		templateUrl: '/wp-content/themes/oasis/js/gallery.directive.html',
		scope: {},
		restrict: 'A'
	};
	return directive;

	function link(scope, element, attrs) {
		scope.i = 0;
		var list = element.find('ul'),
			body = angular.element(document.querySelector('body')),
			transformWidth,
			pages;

		$rootScope.$on('popup', function(e, gallery, index){
			scope.i = index;
			scope.images = gallery;
			activate();
		})

		element.on('click', function(){
			element.removeClass('active');
			toogleBody();
		})

		angular.element(document.querySelector('.popup-body')).on('click', function(e){
			e.stopPropagation();
		});

		function activate() {
			transformWidth = 100 / scope.images.length,
			pages = Math.ceil(100/transformWidth);
			list.css('transition-duration', '0s');
			transform = 'translateX(-' + scope.i*transformWidth + '%)';
			list.css('transform', transform);
			$timeout(function(){
				list.css('transition-duration', '0.5s');
			}, 20)
			element.addClass('active');
			toogleBody();
		}

		function toogleBody() {
			body.hasClass('popup') ? body.removeClass('popup') : body.addClass('popup');
		}

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