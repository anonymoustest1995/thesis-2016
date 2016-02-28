// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.controllers' is found in controllers.js
angular.module('starter', ['ionic', 'starter.controllers', 'ionic-material', 'checklist-model', 'ionMdInput', 'ngResource', 'ngRoute', 'starter.services','ngCordova' ])

.run(function($ionicPlatform) {
    $ionicPlatform.ready(function() {
        // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
        // for form inputs)
        if (window.cordova && window.cordova.plugins.Keyboard) {
            cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
        }
        if (window.StatusBar) {
            // org.apache.cordova.statusbar required
            StatusBar.styleDefault();
        }
    });
})

.config(function($stateProvider, $urlRouterProvider, $ionicConfigProvider) {

    // // Turn off caching for demo simplicity's sake
    // $ionicConfigProvider.views.maxCache(0);

    /*
    // Turn off back button text
    $ionicConfigProvider.backButton.previousTitleText(false);
    */

    $stateProvider

    .state('login', {
    url: '/login',
    templateUrl: 'templates/login.html',
    controller: 'LoginController'
  })


/****************************************/
/******* INSPECTION CATEGORIES **********/
/****************************************/
    
/* Others State
==================================*/
    .state('others', {
        url: '/others',
        abstract: true,
        templateUrl: 'templates/others/menu.html',
        controller: 'AppCtrl'
    })

    .state('others.home', {
        url: '/home',
        views: {
            'menuContent': {
                templateUrl: 'templates/others/home.html',
                controller: 'HomeController'
            }
        }
    })

    .state('others.occupancy', {
        url: '/occupancy',
        views: {
       'menuContent': {
                templateUrl: 'templates/others/occupancy.html',
                controller: 'OccupancyController'
            }
        }
    })

    .state('others.occupancy-customer', {
        url: '/occupancy-customer/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/others/occupancy-customer.html',
                controller: 'CustomerInfoController'
            }
        }
    })

    .state('others.form', {
        url: '/form/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/others/form.html',
                controller: 'OthersFormController'
            }
        }
    })



    .state('others.annual', {
        url: '/annual',
        views: {
            'menuContent': {
                templateUrl: 'templates/others/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('others.profile', {
        url: '/profile',
        views: {
            'menuContent': {
                templateUrl: 'templates/others/profile.html',
                controller: 'ProfileController'
            }
        }
    })

    .state('others.developers', {
        url: '/developers',
        views: {
            'menuContent': {
                templateUrl: 'templates/others/developers.html',
                controller: 'DevelopersController'
            }
        }
    })


/* 1. Electronics State
==================================*/
    .state('electronics', {
        url: '/electronics',
        abstract: true,
        templateUrl: 'templates/electronics/menu.html',
        controller: 'AppCtrl'
    })

    .state('electronics.home', {
        url: '/home',
        views: {
            'menuContent': {
                templateUrl: 'templates/electronics/home.html',
                controller: 'HomeController'
            }
        }
    })

    .state('electronics.occupancy', {
        url: '/occupancy',
        views: {
       'menuContent': {
                templateUrl: 'templates/electronics/occupancy.html',
                controller: 'OccupancyController'
            }
        }
    })

    .state('electronics.occupancy-customer', {
        url: '/occupancy-customer/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/electronics/occupancy-customer.html',
                controller: 'CustomerInfoController'
            }
        }
    })

    .state('electronics.form', {
        url: '/form/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/electronics/form.html',
                controller: 'ElectronicsFormController'
            }
        }
    })

     .state('electronics.annual_form', {
        url: '/annual_form/:occupancy_number',
        views: {
            'menuContent': {
                templateUrl: 'templates/others/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('electronics.annual', {
        url: '/annual',
        views: {
            'menuContent': {
                templateUrl: 'templates/electronics/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('electronics.profile', {
        url: '/profile',
        views: {
            'menuContent': {
                templateUrl: 'templates/electronics/profile.html',
                controller: 'ProfileController'
            }
        }
    })

    .state('electronics.developers', {
        url: '/developers',
        views: {
            'menuContent': {
                templateUrl: 'templates/electronics/developers.html',
                controller: 'DevelopersController'
            }
        }
    })


/* 2. Architectural State
==================================*/
    .state('architectural', {
        url: '/architectural',
        abstract: true,
        templateUrl: 'templates/architectural/menu.html',
        controller: 'AppCtrl'
    })

    .state('architectural.home', {
        url: '/home',
        views: {
            'menuContent': {
                templateUrl: 'templates/architectural/home.html',
                controller: 'HomeController'
            }
        }
    })

    .state('architectural.occupancy', {
        url: '/occupancy',
        views: {
       'menuContent': {
                templateUrl: 'templates/architectural/occupancy.html',
                controller: 'OccupancyController'
            }
        }
    })

    .state('architectural.occupancy-customer', {
        url: '/occupancy-customer/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/architectural/occupancy-customer.html',
                controller: 'CustomerInfoController'
            }
        }
    })

    .state('architectural.form', {
        url: '/form/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/architectural/form.html',
                controller: 'ArchitecturalFormController'
            }
        }
    })

    .state('architectural.annual', {
        url: '/annual',
        views: {
            'menuContent': {
                templateUrl: 'templates/architectural/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('architectural.profile', {
        url: '/profile',
        views: {
            'menuContent': {
                templateUrl: 'templates/architectural/profile.html',
                controller: 'ProfileController'
            }
        }
    })

    .state('architectural.developers', {
        url: '/developers',
        views: {
            'menuContent': {
                templateUrl: 'templates/architectural/developers.html',
                controller: 'DevelopersController'
            }
        }
    })

/* 3. Electrical State
==================================*/
    .state('electrical', {
        url: '/electrical',
        abstract: true,
        templateUrl: 'templates/electrical/menu.html',
        controller: 'AppCtrl'
    })

    .state('electrical.home', {
        url: '/home',
        views: {
            'menuContent': {
                templateUrl: 'templates/electrical/home.html',
                controller: 'HomeController'
            }
        }
    })

    .state('electrical.occupancy', {
        url: '/occupancy',
        views: {
       'menuContent': {
                templateUrl: 'templates/electrical/occupancy.html',
                controller: 'OccupancyController'
            }
        }
    })

    .state('electrical.occupancy-customer', {
        url: '/occupancy-customer/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/electrical/occupancy-customer.html',
                controller: 'CustomerInfoController'
            }
        }
    })

    .state('electrical.form', {
        url: '/form/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/electrical/form.html',
                controller: 'ElectricalFormController'
            }
        }
    })

    .state('electrical.annual', {
        url: '/annual',
        views: {
            'menuContent': {
                templateUrl: 'templates/electrical/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('electrical.profile', {
        url: '/profile',
        views: {
            'menuContent': {
                templateUrl: 'templates/electrical/profile.html',
                controller: 'ProfileController'
            }
        }
    })

    .state('electrical.developers', {
        url: '/developers',
        views: {
            'menuContent': {
                templateUrl: 'templates/electrical/developers.html',
                controller: 'DevelopersController'
            }
        }
    })

/* 4. Mechanical State
==================================*/
    .state('mechanical', {
        url: '/mechanical',
        abstract: true,
        templateUrl: 'templates/mechanical/menu.html',
        controller: 'AppCtrl'
    })

    .state('mechanical.home', {
        url: '/home',
        views: {
            'menuContent': {
                templateUrl: 'templates/mechanical/home.html',
                controller: 'HomeController'
            }
        }
    })

    .state('mechanical.occupancy', {
        url: '/occupancy',
        views: {
       'menuContent': {
                templateUrl: 'templates/mechanical/occupancy.html',
                controller: 'OccupancyController'
            }
        }
    })

    .state('mechanical.occupancy-customer', {
        url: '/occupancy-customer/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/mechanical/occupancy-customer.html',
                controller: 'CustomerInfoController'
            }
        }
    })

    .state('mechanical.form', {
        url: '/form/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/mechanical/form.html',
                controller: 'MechanicalFormController'
            }
        }
    })

    .state('mechanical.annual', {
        url: '/annual',
        views: {
            'menuContent': {
                templateUrl: 'templates/mechanical/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('mechanical.profile', {
        url: '/profile',
        views: {
            'menuContent': {
                templateUrl: 'templates/mechanical/profile.html',
                controller: 'ProfileController'
            }
        }
    })

    .state('mechanical.developers', {
        url: '/developers',
        views: {
            'menuContent': {
                templateUrl: 'templates/mechanical/developers.html',
                controller: 'DevelopersController'
            }
        }
    })
/* 5. Plumbing Or Sanitary State
==================================*/
    .state('plumbing-sanitary', {
        url: '/plumbing-sanitary',
        abstract: true,
        templateUrl: 'templates/plumbing-sanitary/menu.html',
        controller: 'AppCtrl'
    })

    .state('plumbing-sanitary.home', {
        url: '/home',
        views: {
            'menuContent': {
                templateUrl: 'templates/plumbing-sanitary/home.html',
                controller: 'HomeController'
            }
        }
    })

    .state('plumbing-sanitary.occupancy', {
        url: '/occupancy',
        views: {
       'menuContent': {
                templateUrl: 'templates/plumbing-sanitary/occupancy.html',
                controller: 'OccupancyController'
            }
        }
    })

    .state('plumbing-sanitary.occupancy-customer', {
        url: '/occupancy-customer/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/plumbing-sanitary/occupancy-customer.html',
                controller: 'CustomerInfoController'
            }
        }
    })

    .state('plumbing-sanitary.form', {
        url: '/form/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/plumbing-sanitary/form.html',
                controller: 'PlumbingSanitaryFormController'
            }
        }
    })

    .state('plumbing-sanitary.annual', {
        url: '/annual',
        views: {
            'menuContent': {
                templateUrl: 'templates/plumbing-sanitary/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('plumbing-sanitary.profile', {
        url: '/profile',
        views: {
            'menuContent': {
                templateUrl: 'templates/plumbing-sanitary/profile.html',
                controller: 'ProfileController'
            }
        }
    })

    .state('plumbing-sanitary.developers', {
        url: '/developers',
        views: {
            'menuContent': {
                templateUrl: 'templates/plumbing-sanitary/developers.html',
                controller: 'DevelopersController'
            }
        }
    })

/* 6. Structural State
==================================*/
    .state('structural', {
        url: '/structural',
        abstract: true,
        templateUrl: 'templates/structural/menu.html',
        controller: 'AppCtrl'
    })

    .state('structural.home', {
        url: '/home',
        views: {
            'menuContent': {
                templateUrl: 'templates/structural/home.html',
                controller: 'HomeController'
            }
        }
    })

    .state('structural.occupancy', {
        url: '/occupancy',
        views: {
       'menuContent': {
                templateUrl: 'templates/structural/occupancy.html',
                controller: 'OccupancyController'
            }
        }
    })

    .state('structural.occupancy-customer', {
        url: '/occupancy-customer/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/structural/occupancy-customer.html',
                controller: 'CustomerInfoController'
            }
        }
    })

    .state('structural.form', {
        url: '/form/:assigned_id',
        views: {
            'menuContent': {
                templateUrl: 'templates/structural/form.html',
                controller: 'StructuralFormController'
            }
        }
    })

    .state('structural.annual', {
        url: '/annual',
        views: {
            'menuContent': {
                templateUrl: 'templates/structural/annual.html',
                controller: 'AnnualController'
            }
        }
    })

    .state('structural.profile', {
        url: '/profile',
        views: {
            'menuContent': {
                templateUrl: 'templates/structural/profile.html',
                controller: 'ProfileController'
            }
        }
    })

    .state('structural.developers', {
        url: '/developers',
        views: {
            'menuContent': {
                templateUrl: 'templates/structural/developers.html',
                controller: 'DevelopersController'
            }
        }
    })




    // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/login');
});
