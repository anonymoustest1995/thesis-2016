/* global angular, document, window */
'use strict';

angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $rootScope, $ionicModal, $window, $location, $route, $state, $ionicPopover, $timeout, $http) {
    // Form data for the login modal
    $scope.loginData = {};
    $scope.isExpanded = false;
    $scope.hasHeaderFabLeft = false;
    $scope.hasHeaderFabRight = false;

    var navIcons = document.getElementsByClassName('ion-navicon');
    for (var i = 0; i < navIcons.length; i++) {
        navIcons.addEventListener('click', function() {
            this.classList.toggle('active');
        });
    }

    ////////////////////////////////////////
    // Layout Methods
    ////////////////////////////////////////

    $scope.hideNavBar = function() {
        document.getElementsByTagName('ion-nav-bar')[0].style.display = 'none';
    };

    $scope.showNavBar = function() {
        document.getElementsByTagName('ion-nav-bar')[0].style.display = 'block';
    };

    $scope.noHeader = function() {
        var content = document.getElementsByTagName('ion-content');
        for (var i = 0; i < content.length; i++) {
            if (content[i].classList.contains('has-header')) {
                content[i].classList.toggle('has-header');
            }
        }
    };

    $scope.setExpanded = function(bool) {
        $scope.isExpanded = bool;
    };

    $scope.setHeaderFab = function(location) {
        var hasHeaderFabLeft = false;
        var hasHeaderFabRight = false;

        switch (location) {
            case 'left':
                hasHeaderFabLeft = true;
                break;
            case 'right':
                hasHeaderFabRight = true;
                break;
        }

        $scope.hasHeaderFabLeft = hasHeaderFabLeft;
        $scope.hasHeaderFabRight = hasHeaderFabRight;
    };

    $scope.hasHeader = function() {
        var content = document.getElementsByTagName('ion-content');
        for (var i = 0; i < content.length; i++) {
            if (!content[i].classList.contains('has-header')) {
                content[i].classList.toggle('has-header');
            }
        }

    };

    $scope.hideHeader = function() {
        $scope.hideNavBar();
        $scope.noHeader();
    };

    $scope.showHeader = function() {
        $scope.showNavBar();
        $scope.hasHeader();
    };

    $scope.clearFabs = function() {
        var fabs = document.getElementsByClassName('button-fab');
        if (fabs.length && fabs.length > 1) {
            fabs[0].remove();
        }
    };

    $scope.logout = function() {
      $scope.formData = $rootScope.userData;
      
      $http.post('http://192.168.1.13/i-inspect-api/Users_api/logout', $scope.formData).
        then(function(reply) {
          console.log(reply);
          $location.path("/login");
          $window.location.reload(true);

        }, function(response) {
          console.log(response);
        });

    }
})


.controller('HomeController', function($scope, $rootScope,$ionicPopup, $stateParams, $timeout, ionicMaterialMotion, ionicMaterialInk) {
    // Set Header
    $scope.$parent.showHeader();
    $scope.$parent.clearFabs();
    $scope.isExpanded = false;
    $scope.$parent.setExpanded(false);
    $scope.$parent.setHeaderFab(false);

    // Set Motion
    $timeout(function() {
        ionicMaterialMotion.slideUp({
            selector: '.slide-up'
        });
    }, 300);

    $timeout(function() {
        ionicMaterialMotion.fadeSlideInRight({
            startVelocity: 3000
        });
    }, 700);

    // Set Ink
    ionicMaterialInk.displayEffect();
})


/*
* Login Controller
*/
.controller('LoginController', function($scope, $ionicLoading, $rootScope, $state, $ionicPopup, $location, $http, $timeout, $stateParams, ionicMaterialInk) {

  $scope.formData = {};


  $scope.show = function() {
    $ionicLoading.show({
        template: '<div class="loader"><svg class="circular"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>'
    });

    // For example's sake, hide the sheet after two seconds
    $timeout(function() {
        $ionicLoading.hide();
    }, 2000);
  };

  $scope.hide = function(){
        $ionicLoading.hide();
  };

  $scope.signIn = function(user, pass){
    // Start showing the progress
    $scope.show($ionicLoading);

    $http.post("http://192.168.1.13/i-inspect-api/Users_api/login",$scope.formData)
     .success( function (reply) {
      console.log(reply['status']);
          if (reply['status']) {
            $rootScope.userData = reply['userData'];
            console.log("Login Sucess");
            $scope.username = $rootScope.userData.user_username; 
            console.log($scope.username);
            console.log($rootScope.userData);
            $scope.formData = "";
                  if ($rootScope.userData.position_description=="Architectural Inspector") {

                        $location.path("/architectural/home");
                      } else if ($rootScope.userData.position_description=="Structural Inspector") {
                        $location.path("/structural/home");
                      } else if ($rootScope.userData.position_description=="Mechanical Inspector") {
                        $location.path("/mechanical/home");
                      } else if ($rootScope.userData.position_description=="Sanitary or Plumbing Inspector") {
                        $location.path("/plumbing-sanitary/home");
                      } else if ($rootScope.userData.position_description=="Electrical Inspector") {
                        $location.path("/electrical/home");
                      } else if ($rootScope.userData.position_description=="Electronics Inspector") {
                        $location.path("/electronics/home");
                      } else {
                        $location.path("/others/home");
                      }
            }
          else {
            var alertPopup = $ionicPopup.alert({
              title: 'Login failed!',
              template: 'Please check your credentials!'
           });
            $scope.formData.user_password = "";
            $location.path();

          console.log(reply['status']);
          }
        })
        .error(function ( error ) {
          console.log('error Response:' + error.message);
        }).finally(function($ionicLoading) { 
           // On both cases hide the loading
          $scope.hide($ionicLoading);  
        });  
     };
})


/* Profile Controller
==================================*/

.controller('ProfileController', function($scope, $rootScope, $ionicPopup, $http, $stateParams, $timeout, ionicMaterialMotion, ionicMaterialInk, $ionicSideMenuDelegate, $ionicModal) {
    // Set Header
    $scope.$parent.showHeader();
    $scope.$parent.clearFabs();
    $scope.isExpanded = false;
    $scope.$parent.setExpanded(false);
    $scope.$parent.setHeaderFab(false);

    // Set Motion
    $timeout(function() {
        ionicMaterialMotion.slideUp({
            selector: '.slide-up'
        });
    }, 300);

    $timeout(function() {
        ionicMaterialMotion.fadeSlideInRight({
            startVelocity: 3000
        });
    }, 700);

    // Set Ink
    ionicMaterialInk.displayEffect();

    $scope.user = $rootScope.userData;
    $scope.id = $rootScope.userData.user_id;
    console.log($scope.id);
    $scope.username = $rootScope.userData.user_username;
    $scope.position = $rootScope.userData.user_position_link;
    $scope.lastname = $rootScope.userData.user_lastname;
    $scope.firstname = $rootScope.userData.user_firstname;
    $scope.middlename = $rootScope.userData.user_middlename;
    $scope.gender = $rootScope.userData.user_gender;
    $scope.email = $rootScope.userData.user_email;


    $ionicModal.fromTemplateUrl('templates/change-password.html', {
        animation: 'slide-in-up',
        scope: $scope
    }).then(function (modal) {
        $scope.modal = modal;
    });
  
    $scope.openMenu = function () {
        $ionicSideMenuDelegate.toggleLeft();
    }
  
    $scope.openModal = function () {
        $scope.modal.show();
    }

    $scope.hide = function () {
        $scope.modal.hide();
    }

     $scope.openForm = function() {
       var confirmPopup = $ionicPopup.confirm({
         title: 'Change Password Alert !',
         template: 'Are you sure you want to Change your Password ?'
       });

       confirmPopup.then(function(res) {
         if(res) {
             $scope.modal.show();
         } else {
              $scope.formData = "";
         }
       });
     };

    $scope.formData = {};
    $scope.change_password = [];
    $scope.formData.user_id = $rootScope.userData.user_id;
    console.log($scope.formData.id)
    $scope.formData.user_username = $rootScope.userData.user_username;
    console.log($scope.formData.user_username)
    $scope.formData.user_position_link = $rootScope.userData.user_position_link;
    console.log($scope.formData.user_position_link)
    $scope.formData.user_lastname = $rootScope.userData.user_lastname;
    console.log($scope.formData.user_lastname)
    $scope.formData.user_firstname = $rootScope.userData.user_firstname;
    console.log($scope.formData.user_firstname)
    $scope.formData.user_middlename = $rootScope.userData.user_middlename;
    console.log($scope.formData.user_middlename)
    $scope.formData.user_gender = $rootScope.userData.user_gender;
    console.log($scope.formData.user_gender)
    $scope.formData.user_email = $rootScope.userData.user_email;
    console.log($scope.formData.user_email)

    $scope.changePassword = function(changeForm){
      $http.post('http://192.168.1.13/i-inspect-api/Users_api/change_password', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.formData.user_id = response.data.user_id;
          $scope.change_password.push($scope.formData);
           var alertPopup = $ionicPopup.alert({
                  title: 'Password Change Confirmation',
                  template: 'Password Successfully Change!'
                });
                alertPopup.then(function(res) {
                  $scope.modal.hide();
                });

        }, function(response) {
          console.log(response);
        });
  }

})


/*
* Occupancy Controller
*/
.controller('OccupancyController', function($scope, $timeout, $ionicLoading, $http, $rootScope, AssignService) {


  $scope.show = function() {
    $ionicLoading.show({
        template: '<div class="loader"><svg class="circular"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>'
    });

    // For example's sake, hide the sheet after two seconds
    $timeout(function() {
        $ionicLoading.hide();
    }, 2000);
  };

  $scope.show($ionicLoading);

  $scope.customer_id = [];

  $scope.user_id = $rootScope.userData.user_id;
    console.log($scope.user_id);

    // Get all customer data   
    $scope.items = []
    AssignService.get({user_id: $scope.user_id})
        .$promise.then(function(response) {
          angular.forEach(response, function(item) {
             $scope.get_data = $scope.items.push(item);
             console.log($scope.get_data);
          });
        });


    $scope.doRefresh = function() {
   AssignService.query({user_id: $scope.user_id})
        .$promise.then(function(response) {
          angular.forEach(response, function(item) {
             $scope.get_data = $scope.items;
             console.log($scope.get_data);
          });
        }).finally(function() {
       // Stop the ion-refresher from spinning
       $scope.$broadcast('scroll.refreshComplete');
     });
    };


})


/* Developers Controller
==================================*/
.controller('DevelopersController', function($scope, $stateParams, $timeout, ionicMaterialInk, ionicMaterialMotion) {
    $scope.$parent.showHeader();
    $scope.$parent.clearFabs();
    $scope.isExpanded = true;
    $scope.$parent.setExpanded(true);
    $scope.$parent.setHeaderFab(false);

    // Activate ink for controller
    ionicMaterialInk.displayEffect();

    ionicMaterialMotion.pushDown({
        selector: '.push-down'
    });
    ionicMaterialMotion.fadeSlideInRight({
        selector: '.animate-fade-slide-in .item'
    });

})


/* Customer Info Controller
==================================*/
.controller('CustomerInfoController', function($scope, $http,  AssignFormService, $stateParams) {
    $scope.formData = {};

    // Get all customer data   
    AssignFormService.get({assigned_id: $stateParams.assigned_id})
        .$promise.then(function(oneCust) {
          $scope.customer_data = [oneCust];
        });
        
})


/****************************************************
********* INSPECTION CATEGORIES CONTROLLERS *********
*****************************************************/

/* 1. Electronics Form Controller
==================================*/
.controller('ElectronicsFormController', function($scope, $rootScope, $stateParams,$timeout, $ionicPopup, $http, $state, AssignFormService) {
    $scope.formData = {};

  $http.get('http://192.168.1.13/i-inspect-api/Get_area/electronics_area').
        then(function(reply) {
        console.log(reply);
         $scope.roles = reply.data;
          $scope.user = {
            roles: [$scope.roles[0]]
          };
          $scope.checkAll = function() {
            $scope.user.roles = angular.copy($scope.roles);
          };
          $scope.uncheckAll = function() {
            $scope.user.roles = [];
          }
      }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });


  $scope.formData.scope_of_work = "Occupancy Inspection";
  $scope.formData.inspection_type = "Electronics Inspection";

  AssignFormService.get({assigned_id: $stateParams.assigned_id})
    .$promise.then(function(oneCust) {
      $scope.electronics = [oneCust];
      $scope.formData.assigned_id_link = oneCust.assigned_id;
    });



  // save data to electronics field
 $scope.addElectronicsReport = function(electronicsForm){

    var confirmPopup = $ionicPopup.confirm({
       title: 'Are you sure you want to Send your Inspection Report ?',
       template: 'Note: Once submitted, you can no longer edit your report!'
        });

     confirmPopup.then(function(res) {
       if(res) {
          var dataLength = $scope.user.roles.length;
          console.log(dataLength);
          var newData = ""
          for (var i = 0; i < dataLength; i++) {
            newData = $scope.user.roles[i].area_description+", "+newData;
          };

          $scope.formData.installation_operation_description = newData;
          console.log($scope.formData.installation_operation_description);

          $http.post('http://192.168.1.13/i-inspect-api/Electronics', $scope.formData).
            then(function(response) {
              console.log(response);
              $scope.formData.inspection_id = response.data.inspection_id;
              $scope.electronics.push($scope.formData);
              $scope.formData = {};
              $scope.user.roles = {};
              $state.go($state.current, {}, {reload: true});
               var alertPopup = $ionicPopup.alert({
                      title: 'Adding Confirmation',
                      template: 'Successfully Submitted!'
                    });
                    alertPopup.then(function(res) {
                      $state.go('electronics.occupancy', {}, {reload: true});
                    });

            }, function(response) {
              console.log(response);
            });
       } else {
          
       }
      });
  }


})


/* 2. Architectural - Form Controller
==================================*/
.controller('ArchitecturalFormController', function($scope, $rootScope,$stateParams, $ionicPopup, $http, $state, AssignFormService) {
  $scope.formData = {};

  $scope.formData.scope_of_work = "Occupancy Inspection";
  $scope.formData.inspection_type = "Architectural Inspection";

  // get all architectural data
  AssignFormService.get({assigned_id: $stateParams.assigned_id})
    .$promise.then(function(oneCust) {
      $scope.architectural = [oneCust];
      $scope.formData.assigned_id_link = oneCust.assigned_id;
      console.log($scope.formData.assigned_id_link); 
      console.log($scope.architectural);
    });


  // save data to arhitectural field
 $scope.addArchitecturalReport = function(architecturalForm){
    if($scope.formData.architectural_id){
      $scope.formData = "";
    }
    else{
      $http.post('http://192.168.1.13/i-inspect-api/Architectural', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.formData.architectural_id = response.data.architectural_id;
          $scope.architectural.push($scope.formData);
                var alertPopup = $ionicPopup.alert({
                  title: 'Adding Confirmation',
                  template: 'Successfully Submitted!'
                });
                alertPopup.then(function(res) {
                  $state.go("architectural.occupancy");
                });

        }, function(response) {
          console.log(response);
        });
    }
  }
})


/* 3. Electrical Form Controller
==================================*/
.controller('ElectricalFormController', function($scope, $location,$rootScope, $stateParams, $ionicPopup, $http, $state, AssignFormService) {
  $scope.formData = {};

  $scope.formData.scope_of_work = "Occupancy Inspection";
  $scope.formData.inspection_type = "Electrical Inspection";

  AssignFormService.get({assigned_id: $stateParams.assigned_id})
    .$promise.then(function(oneCust) {
      $scope.electrical = [oneCust];
      $scope.formData.assigned_id_link = oneCust.assigned_id;
      console.log($scope.formData.assigned_id_link); 
    });


  // save data to arhitectural field
 $scope.addElectricalReport = function(electricalForm){
    if($scope.formData.inspection_id){
      $scope.formData = "";
    }
    else{
      $http.post('http://192.168.1.13/i-inspect-api/Electrical', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.electrical.push($scope.formData);
                var alertPopup = $ionicPopup.alert({
                  title: 'Adding Confirmation',
                  template: 'Successfully Submitted!'
                });
                alertPopup.then(function(res) {
                  $state.go("electrical.occupancy");
                });

        }, function(response) {
          console.log(response);
        });
    }
  }

})

/* 4. Mechanical Form Controller
==================================*/
.controller('MechanicalFormController', function($scope, $stateParams, $rootScope, $ionicPopup, $http, $state, AssignFormService) {
  $scope.formData = {};
  
  $http.get('http://192.168.1.13/i-inspect-api/Get_area/mechanical_area').
        then(function(reply) {
        console.log(reply);
         $scope.roles = reply.data;
          $scope.user = {
            roles: [$scope.roles[0]]
          };
          $scope.checkAll = function() {
            $scope.user.roles = angular.copy($scope.roles);
          };
          $scope.uncheckAll = function() {
            $scope.user.roles = [];
          }
      }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

  $scope.formData.scope_of_work = "Occupancy Inspection";
  $scope.formData.inspection_type = "Mechanical Inspection";

  AssignFormService.get({assigned_id: $stateParams.assigned_id})
    .$promise.then(function(oneCust) {
      $scope.mechanical = [oneCust];
      $scope.formData.assigned_id_link = oneCust.assigned_id;
      console.log($scope.formData.assigned_id_link); 
    });

 $scope.addMechanicalReport = function(mechanicalForm){
    if($scope.formData.inspection_id){
      $scope.formData = "";
    }
    else{
      var dataLength = $scope.user.roles.length;
      console.log(dataLength);
      var newData = ""
      for (var i = 0; i < dataLength; i++) {
        newData = $scope.user.roles[i].area_description+", "+newData;
      };

      $scope.formData.mechanical_installation_operation_description = newData;
      console.log($scope.formData.mechanical_installation_operation_description);

      $http.post('http://192.168.1.13/i-inspect-api/Mechanical', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.formData.inspection_id = response.data.inspection_id;
          $scope.mechanical.push($scope.formData);
           var alertPopup = $ionicPopup.alert({
                  title: 'Adding Confirmation',
                  template: 'Successfully Submitted!'
                });
                alertPopup.then(function(res) {
                  $state.go("mechanical.occupancy");
                });

        }, function(response) {
          console.log(response);
        });
    }
  }

})

/* 5. Plumbing or Sanitary Form Controller
==================================*/
.controller('PlumbingSanitaryFormController', function($scope, $rootScope, $stateParams, $ionicPopup, $http, $state, AssignFormService) {
  $scope.formData = {};

  $scope.formData.scope_of_work = "Occupancy Inspection";
  $scope.formData.inspection_type = "Plumbing or Sanitary Inspection";

  AssignFormService.get({assigned_id: $stateParams.assigned_id})
    .$promise.then(function(oneCust) {
      $scope.plumbing_or_sanitary = [oneCust];
      $scope.formData.assigned_id_link = oneCust.assigned_id;
      console.log($scope.formData.assigned_id_link); 
      console.log($scope.plumbing_or_sanitary);
    });

 $scope.addPlumbingSanitaryReport = function(plumbingSanitaryForm){
    if($scope.formData.plumbing_or_sanitary_id){
      $scope.formData = "";
    }
    else{
      $http.post('http://192.168.1.13/i-inspect-api/Plumbing_sanitary', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.formData.plumbing_or_sanitary_id = response.data.plumbing_or_sanitary_id;
          $scope.plumbing_or_sanitary.push($scope.formData);
           var alertPopup = $ionicPopup.alert({
                  title: 'Adding Confirmation',
                  template: 'Successfully Submitted!'
                });
                alertPopup.then(function(res) {
                  $state.go("plumbing-sanitary.occupancy");
                });

        }, function(response) {
          console.log(response);
        });
    }
  }
})

/* 6. Structural Form Controller
==================================*/
.controller('StructuralFormController', function($scope, $stateParams, $rootScope, $ionicPopup, $http, $state, AssignFormService) {
   $scope.formData = {};

  $scope.formData.scope_of_work = "Occupancy Inspection";
  $scope.formData.inspection_type = "Structural Inspection";

  AssignFormService.get({assigned_id: $stateParams.assigned_id})
    .$promise.then(function(oneCust) {
      $scope.structural = [oneCust];
      $scope.formData.assigned_id_link = oneCust.assigned_id;
      console.log($scope.formData.assigned_id_link); 
    });

  // save data to structural field
 $scope.addStructuralReport = function(StructuralForm){
    if($scope.formData.inspection_id){
      $scope.formData = "";
    }
    else{
      $http.post('http://192.168.1.13/i-inspect-api/Structural', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.formData.structural_id = response.data.structural_id;
          $scope.structural.push($scope.formData);
           var alertPopup = $ionicPopup.alert({
                  title: 'Adding Confirmation',
                  template: 'Successfully Submitted!'
                });
                alertPopup.then(function(res) {
                  $state.go("structural.occupancy");
                });

        }, function(response) {
          console.log(response);
        });
    }
  }

})

/* 7. Others - Form Controller
==================================*/
.controller('OthersFormController', function($scope, $rootScope,$stateParams, $ionicPopup, $http, $state, AssignFormService) {
  $scope.formData = {};

  $scope.formData.scope_of_work = "Occupancy Inspection";
  $scope.formData.others = "none";

  AssignFormService.get({assigned_id: $stateParams.assigned_id})
    .$promise.then(function(oneCust) {
      $scope.others = [oneCust];
      $scope.formData.assigned_id_link = oneCust.assigned_id;
      console.log($scope.formData.assigned_id_link); 
      console.log($scope.others);
    });

 $scope.addOthersReport = function(othersForm){
    if($scope.formData.inspection_id){
      $scope.formData = "";
    }
    else{
      $http.post('http://192.168.1.13/i-inspect-api/Others', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.formData.inspection_id = response.data.inspection_id;
          $scope.others.push($scope.formData);
                var alertPopup = $ionicPopup.alert({
                  title: 'Adding Confirmation',
                  template: 'Successfully Submitted!'
                });
                alertPopup.then(function(res) {
                  $state.go("architectural.occupancy");
                });

        }, function(response) {
          console.log(response);
        });
    }
  }
})

/****************************************************
********* ANNUAL CONTROLLER *********
*****************************************************/

.controller('AnnualController', function($scope, $stateParams, $ionicLoading, $timeout, ionicMaterialInk, ionicMaterialMotion, $cordovaBarcodeScanner) {
    $scope.$parent.showHeader();
    $scope.$parent.clearFabs();
    $scope.isExpanded = true;
    $scope.$parent.setExpanded(true);
    $scope.$parent.setHeaderFab(false);

    // Activate ink for controller
    ionicMaterialInk.displayEffect();

    ionicMaterialMotion.pushDown({
        selector: '.push-down'
    });
    ionicMaterialMotion.fadeSlideInRight({
        selector: '.animate-fade-slide-in .item'
    });

    $scope.show = function() {
    $ionicLoading.show({
        template: '<div class="loader"><svg class="circular"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>'
    });

    // For example's sake, hide the sheet after two seconds
    $timeout(function() {
        $ionicLoading.hide();
      }, 2000);
    };
    $scope.show($ionicLoading);

   $scope.scanBarcode = function() {
        $cordovaBarcodeScanner.scan().then(function(imageData) {
            alert(imageData.text);
            console.log("Barcode Format -> " + imageData.format);
            console.log("Cancelled -> " + imageData.cancelled);
            console.log(click);
        }, function(error) {
            console.log("An error happened -> " + error);
        });
    };
})
;
