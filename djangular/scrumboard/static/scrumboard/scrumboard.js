(function() {
	'use strict';
	angular.module('scrumboard.demo',[])
		.controller('ScrumboardController',['$scope','$http',ScrumboardController]);

	function ScrumboardController($scope,$http) {
		$scope.add = function(list,title){
			var card = {
				title:title,
				list: list.id,
			};
			$http.post('/scrumboard/cards/',card)
				.then(function(response){
					list.cards.push(response.data);
				},
				function(){
					alert('could not create card');
				});
			// list.cards.push(card);
		};
		$scope.login = function(){
			$http.post('/auth_api/login/',
				{username: 'weiwang', password:'thisistemp1'});
		};

		$scope.data= [];

		$http.get('/scrumboard/lists/').then(function(response){
			$scope.data = response.data;
		});
	}
/*		$scope.data = [
			{
				name: 'Django demo',
				cards: [
					{
						title: 'Create Models'
					},
					{
						title: 'Create View'
					},
					{
						title: 'Migrate Database'
					},
				]
			},
			{
				name: 'Angular demo',
				cards: [
					{
						title: 'Write HTML'
					},
					{
						title: 'Write javascripts'
					},
				]
			}

		]

	};
*/
}());
