<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

$('<div></div>')
		.attr('id','scrolltotop')
		.hide()
		.css({'z-index':'1000','position':'fixed','bottom':'25px','right':'35px','cursor':'pointer','width':'40px','height':'40px','background':'#111111'})
		.appendTo('body')
		.click(function(){
			$('html,body').animate({scrollTop: 0}, 'slow');
		});
	 $('<div></div>')
		.css({'width':'6px','height':'6px','transform':'rotate(-135deg)','border':'solid #ffffff','border-width':'0 3px 3px 0','padding':'3px','margin-top':'16px','margin-left':'12px'})
		.appendTo('#scrolltotop');
	 $(window).scroll(function(){
		if($(window).scrollTop()<500){
			$('#scrolltotop').fadeOut();
		}else{
			$('#scrolltotop').fadeIn();
		}
	});
	// js panel de controle
	
/**
 * 
 */
 
var myApp = angular.module("myApp", ["ngRoute"]);
 
myApp.config(function($routeProvider) {
	$routeProvider
 
	// route for the home page
	.when('/', {
		templateUrl : '../vues/home.html',
		controller : 'mainController'
	})
 
	// route for the about page
	.when('/about', {
		templateUrl : '../vues/about.html',
		controller : 'aboutController'
	})
 
	// route for the contact page
	.when('/contact', {
		templateUrl : '../vues/contact.html',
		controller : 'contactController'
	})
 
	// route for the contact page
	.when('/users', {
		templateUrl : 'vues/users.html',
		controller : 'usersController'
	});		
 
});
 
myApp.controller('mainController', function($scope) {
	console.log("mainController");
	$scope.message = 'Bonjour !';
});
 
myApp.controller('aboutController', function($scope, $http) {
	console.log("aboutController");
	$scope.messageList = [];
	$http.get('gestMessage').then(function(response) {
		console.log("response : " + response.data.messageList);
		$scope.messageList = response.data.messageList;
	});
});
 
myApp.controller('usersController', function($scope, $http) {
	console.log("usersController");
	$scope.usersList = [{"usersList":[{"user_id":1,"user_name":"francky","user_mail":"francky@mail","user_reg_id":"liuhqsmdihmqsdoigjh3654","user_country":3,"user_language":3,"user_latitude":12.0,"user_longitude":32.0,"user_password":"pass","user_time":1482102000000},{"user_id":2,"user_name":"Matthieu","user_mail":"matthieu@mail","user_reg_id":"g41fgh6h5f2fd2y5jh5r52","user_country":3,"user_language":3,"user_latitude":14.0,"user_longitude":22.0,"user_password":"pass","user_time":1481756400000},{"user_id":3,"user_name":"Jerome","user_mail":"jerome@mail","user_reg_id":"g41fgh6h5f2f48flkghjh5r52","user_country":3,"user_language":3,"user_latitude":14.0,"user_longitude":22.0,"user_password":"pass","user_time":1482015600000}]}];
	$http.get('gestUsers').then(function(response) {
		console.log("response : " + response.data.usersList);
		$scope.users = response.data.usersList;
	});
});
 
myApp.controller('contactController', function($scope) {
	console.log("contact controller");
	$scope.message = 'Contact page';
 
 

});