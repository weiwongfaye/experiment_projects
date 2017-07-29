(function() {
	'use strict';
	angular.module('scrumboard.demo',['ngRoute'])
		.controller('ScrumboardController',['$scope','$http','Login',ScrumboardController]);

	function ScrumboardController($scope,$http,Login) {
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

		//$scope.logout = function(){
		//	$http.get('/auth_api/logout/')
		//		.then(function(){
         //           //alert('test');
		//			$location.url('/login');
		//	});
		//};

        Login.redirectIfNotLoggedIn();


		$scope.data= [];
		$http.get('/scrumboard/lists/').then(function(response){
			$scope.data = response.data;
		});
        $scope.sortBy='story_point';
        $scope.reverse = true;
        $scope.showFilters=false;
        $scope.logout = Login.logout;

	}


}());
