'use strict';

/**
* dashboard.controllers Module
*
* Description
*/
angular.module('customers.controllers', ['angular-carousel'])

.controller('custCtrl', [
						'$scope',
						'$routeParams',
						'OrdersService',
						'CustomerService',
						'Contact',
						function (
							$scope,
							$RP,
							Order,
							Customer,
							Contact
						) { //Begin Controller Logic ->

	$scope.custId = $RP.customerId;
	Customer.show($scope.custId)
		.success(function (data){
			var customer = _.where(data, {id: $scope.custId});
			$scope.cust = customer[0];
			console.log(customer[0])
		});

	$scope.saveContact = function(contact){
		var data = {first: contact.first, last:contact.last, title: contact.title, email:contact.email, phone: contact.phone, fax: contact.fax, customer_id: $scope.custId,customer_num: $scope.custId, customer_name: $scope.cust.company}
		Contact.save(data)
			.success(function (data){
				$scope.cust.contacts.push(data);
			});
	}
	$scope.updateContact = function(contact){
		var data = {first: contact.first, last:contact.last, title: contact.title, email:contact.email, phone: contact.phone, fax: contact.fax, customer_id: $scope.custId,customer_num: $scope.custId, customer_name: $scope.cust.company}
		Contact.update(data, contact.id);
	}
	$scope.removeContact = function(id){
		Contact.destroy(id)
			.success(function (data){
				Customer.show($scope.custId)
					.success(function (data){
						var customer = _.where(data, {id: $scope.custId});
						$scope.cust = customer[0];
						console.log(customer[0])
					});
			});
	}
}])

.controller('customersCtrl', ['$scope', 'Customer', function ($scope, Customer) {
	
	$scope.customers = Customer.data;

}])