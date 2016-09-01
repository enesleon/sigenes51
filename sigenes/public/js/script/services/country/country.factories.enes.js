/**
 * Created by taxque on 27/02/16.
 */
angular.module('Enes')
    .factory('countryFactory', function (HOST, $http) {
    return{
        getAllCountry : function(){
            return $http.get(HOST + 'api/v1/countrys')
        },
        getNameCountry : function(id){
            return $http.get(HOST+'api/v1/getNameCountry/'+ id)
        },
        save : function(country){
            return $http.post(HOST+'api/v1/countrys', country)
        },
        update : function(country){
            return $http.put(HOST+'api/v1/countrys', country)
        },
        delete : function(country){
            return $http.delete(HOST+'api/v1/countrys/'+country.id)
        }
    }
});