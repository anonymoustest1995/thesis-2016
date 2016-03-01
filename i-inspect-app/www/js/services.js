angular.module('starter.services', [])

.factory('UserService', function ($resource) {
    return $resource('http://192.168.1.13/i-inspect-api/get-customer-data/:building_permit_number',{building_permit_number: "@_building_permit_number"}, {
    	'get':    {method:'GET'},
 		'query':  {method:'GET', isArray:true},
    });
})


.factory('CustomerService', function ($resource) {
    return $resource('http://192.168.1.13/i-inspect-api/get_data/', {
    	'get':    {method:'GET'},
 		'query':  {method:'GET', isArray:true},
    });
})


.factory('AssignService', function ($resource) {
    return $resource('http://192.168.1.13/i-inspect-api/get-assign-data/:user_id',{user_id: "@_user_id"}, {
    	'get':    {method:'GET', isArray:true},
    });
})


.factory('AssignFormService', function ($resource) {
    return $resource('http://192.168.1.13/i-inspect-api/get-assign-customer-data/:assigned_id',{assigned_id: "@_assigned_id"}, {
    	'get':    {method:'GET'},
    });
});