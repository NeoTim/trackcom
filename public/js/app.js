'use strict';
var app = angular.module("app", [
    'ngSanitize',
    'ngRoute',

    'ngTable',
    'ui.bootstrap',
    'btford.socket-io',
    'ngAnimate',
    'fx.animations',
    'app.routes',
    'app.auth',
    'app.services',
    'app.controllers',
    'myApp.config', 'myApp.filters', 'myApp.services', 'myApp.directives', 'myApp.controllers',
         'simpleLoginTools', 'routeSecurity'
    ])


.controller('NavigationCtrl', ['$scope', '$location', function ($scope, $location) {
    $scope.isCurrentPath = function (path) {
      return $location.path() == path;
    };
  }])


.run(function($rootScope, $location, AuthenticationService, FlashService, loginService, FBURL) {
  /*OFR FIRE AUTH*/
   if( FBURL === 'https://INSTANCE.firebaseio.com' ) {
         // double-check that the app has been configured
         angular.element(document.body).html('<h1>Please configure app/js/config.js before running!</h1>');
         setTimeout(function() {
            angular.element(document.body).removeClass('hide');
         }, 250);
      }
      else {
         // establish authentication
         $rootScope.auth = loginService.init('/login');
         $rootScope.FBURL = FBURL;
      }

      $rootScope.logout = function(){
        loginService.logout();
      }


      /*FOR SERVER AUTH*/
  // var routesThatRequireAuth = ['/home'];
  // console.log($rootScope)
  // $rootScope.$on('$routeChangeStart', function(event, next, current) {
  //   if(_(routesThatRequireAuth).contains($location.path()) && !AuthenticationService.isLoggedIn()) {
  //     $location.path('/login');
  //     FlashService.show("Please log in to continue.");
  //   }
  // });
})

.factory("FlashService", function($rootScope) {
  return {
    show: function(message) {
      $rootScope.flash = message;
    },
    clear: function() {
      $rootScope.flash = "";
    }
  }
});
