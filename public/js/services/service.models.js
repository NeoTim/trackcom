'use strict'
/**
* service.models Module
*
* Description
*/
angular.module('service.models', [])

.factory("BookService", function($http) {
  return {
    get: function() {
      return $http.get('/books');
    }
  };
})
.factory("CustomerService", function($http) {
 	return {
	    	get: function() {
	      	return $http.get('/api/customers');
	    	},
    		show : function(id) {
			return $http.get('/api/customers/' + id);
		},
		update : function(data, id)
		{
			return $http(
			{
				method: 'PUT',
				url: '/api/customers/' + id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		save : function(data) {
			return $http({
				method: 'POST',
				url: '/api/customers',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		destroy : function(id) {
			return $http.delete('/api/customers/' + id);
		}
  };
})
.factory("Contact", function($http) {

	return {
    		get: function() {
      		return $http.get('/api/contacts');
    		},
    		show : function(id) {
			return $http.get('/api/contacts/' + id);
		},
    		update : function(data, id)
    		{
			return $http(
			{
				method: 'PUT',
				url: '/api/contacts/' + id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		save : function(data) {
			return $http({
				method: 'POST',
				url: '/api/contacts',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		destroy : function(id) {
			return $http.delete('/api/contacts/' + id);
		}
		
  	}
})
.factory("DriversService", function($http) {
  	return {
    		get: function() {
      		return $http.get('/api/drivers');
    		},
    		show : function(id) {
			return $http.get('/api/drivers/' + id);
		},
    		update : function(data, id) {
			return $http({
				method: 'PUT',
				url: '/api/drivers/' + id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		}
  	};
})

.factory('ProductionService', function($http) {

	return {
		get : function() {
			return $http.get('/api/entries');
		},
		show : function(id) {
			return $http.get('/api/entries/' + id);
		},
		save : function(data) {
			return $http({
				method: 'POST',
				url: '/api/entries',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		update : function(data, id) {
			return $http({
				method: 'PUT',
				url: '/api/entries/' + id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		destroy : function(id) {
			return $http.delete('/api/entries/' + id);
		}
	}

})
.factory('BatchService', function($http) {

	return {
		get : function() {
			return $http.get('/api/batches');
		},
		show : function(id) {
			return $http.get('/api/batches/' + id);
		},
		save : function(data) {
			return $http({
				method: 'POST',
				url: '/api/batches',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		update : function(data, id) {
			return $http({
				method: 'PUT',
				url: '/api/batches/' + id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		destroy : function(id) {
			return $http.delete('/api/batches/' + id);
		}
	}

})
.factory("OrdersService", function($http) {

	return {
    		get: function() {
      		return $http.get('/api/orders');
    		},
    		show : function(id) {
			return $http.get('/api/orders/' + id);
		},
    		update : function(data, id)
    		{
			return $http(
			{
				method: 'PUT',
				url: '/api/orders/' + id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		save : function(data) {
			return $http({
				method: 'POST',
				url: '/api/orders',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		destroy : function(id) {
			return $http.delete('/api/orders/' + id);
		}
		
  	}
})
.factory("GroupsService", function($http) {
	return {
    		get: function()
    		{
      		return $http.get('/api/groups');
    		},
    		show : function(id) {
			return $http.get('/api/groups/' + id);
		},
    		update : function(data, id)
    		{
			return $http(
			{
				method: 'PUT',
				url: '/api/groups/' + id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		save : function(data) {
			return $http({
				method: 'POST',
				url: '/api/groups',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(data)
			});
		},
		destroy : function(id) {
			return $http.delete('/api/groups/' + id);
		}
  	};
})

.factory("MethodsService", function($http) {
  return {
    get: function() {
      return $http.get('/api/methods');
    },
    update : function(data, id)
  	{
	return $http(
		{
			method: 'PUT',
			url: '/api/methods/' + id,
			headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
			data: $.param(data)
		});
	},
  };
})

.factory("ProductService", function($http) {
  return {
    get: function() {
      return $http.get('/api/products');
    }
  };
});
