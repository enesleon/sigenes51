angular.module('Enes')
    .factory('suspensionFactory', function (HOST, $http) {
        return{
            getAllPeriod : function(){
                return $http.get(HOST + 'api/v1/susperiod')
            },
            getAllSusPartn : function(user_id){
                return $http.get(HOST + 'api/v1/suspartn/' + user_id)
            },
            getValidate : function(student_id){
                console.log(student_id);
                return $http.get(HOST + 'api/v1/suspen/' + student_id)
            },
            getAllSuspensions : function(){
                return $http.get(HOST+'api/v1/suspen')
            },
            save : function(suspen){
                return $http.post(HOST+'api/v1/suspen', suspen)
            },
            update : function(suspen){
                return $http.put(HOST+'api/v1/suspen', suspen)
            },
            delete : function(user){
                return $http.delete(HOST+'api/v1/suspen/' + user.id)
            }
        }
    });