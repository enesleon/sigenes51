'use strict';

/**
 * @ngdoc Controller
 * @name Enes.controller:registerAspirantController
 * @param suspensionFactory
 * @param $scope
 * @requires suspensionFactory
 * @description
 * # DeleteuserCtrl
 * Controller of the principalApp
 */
angular.module('Enes')
    .controller('SuspensionsController', function ($scope, suspensionFactory, Notification) {
        $scope.periods      = {};
        $scope.period_ids;
        $scope.userSusp     = {};
        $scope.suspen       = {};
        $scope.reason;
        $scope.viewNote     = false;
        $scope.textNote     = 0;
        $scope.btnprint     = false;
        $scope.btnapply     = true;
        $scope.btnfile      = false;
        $scope.validate;
        $scope.information;
        $scope.chance       = false;
        $scope.valsusp      = false;

        /**  
        *    funcion main que carga los datos 
        *    iniciales del controlador, llama funciones y carga 
        *    los datos en la vista. 
        */
        $scope.init = function(paramint){
            getPeriods();
            getDateSus();
            try{
                ver(paramint);
            }catch(err){
                
            }
            
        }

        var suspensionTime = function(){
            try{
                var date = new Date();
                var mes = (date.getMonth()+1) < 10 ? '0'+(date.getMonth()+1) : (date.getMonth()+1);
                var dia = (date.getDate() < 10 ? '0'+ date.getDate() : date.getDate());
                var fecha_actual = date.getFullYear() + '-' + mes + '-' + dia;
                if (fecha_actual >= $scope.periods[0].date_init && fecha_actual <= $scope.periods[0].date_end) {
                    $scope.btnapply = true;
                }else{
                    $scope.btnapply = false;
                    $scope.textNote = 1;
                    $scope.viewNote = true;
                    /*Notification.error({
                        message: '<u>El tiempo en el que se podia realizar la suspensión se ha terminado</u>',
                        title: '<b>Información</b>',
                        delay: 5000
                    });*/
                }
            }catch(err){
                $scope.btnapply = false;
                $scope.textNote = 1;
                $scope.viewNote = true;
            }            
        }

        //vuelve visible o no el panel del notas
        $scope.chanceView = function(){
            $scope.viewNote = !$scope.viewNote;
        }

        /**
        *   Carga la fecha actual al campo de dia 
        */
        var getDateSus = function(){
            var date = new Date();
            $scope.suspen.date_init = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();
        }

        /**
        *   Carga los periodos en el combo
        */
        var getPeriods = function(){
            suspensionFactory.getAllPeriod()
            .success(function(data){
                $scope.periods = data;
                angular.forEach(data, function(value, key){
                    $scope.periods[key].title = value.month_init + ' - ' + value.month_end + ' ' + value.year; 
                    $scope.periods[key].period_id = value.id;
                    $scope.periods[key].month_init = value.month_init;
                    $scope.periods[key].month_end = value.month_end;
                    $scope.periods[key].date_init = value.date_init;
                    $scope.periods[key].date_end = value.date_end;
                })
                suspensionTime();
            })
            .error(function(error){
                console.log(error);
            })
        }
        
        /**
        *   Trae la información del estudiante
        */
        var ver = function(intpa){
            suspensionFactory.getAllSusPartn(intpa)
            .success(function(data){
                $scope.userSusp.nombre = data.name + ' ' + data.firstlastname 
                        + ' ' + data.secondlastname;
                $scope.userSusp.account_number = data.student.account_number;
                $scope.userSusp.celphone = data.celphone;
                $scope.userSusp.student = data.student.id;
                $scope.userSusp.telephone = data.telephone;
                $scope.userSusp.email = data.email1;
                $scope.userSusp.career = data.student.career.name;
                $scope.validate = data.student.id;
                getValidator($scope.validate);
                if (data.student.active == 0) {
                    $scope.viewNote = false;
                    $scope.textNote = 0;
                        $scope.btnprint = false;
                        $scope.btnapply = false;
                        $scope.btnfile  = false;
                };
                 
            })
            .error(function(error){
                console.log(error);
            })  
        }
        $scope.verification = function(entity){
            updateSuspen(entity);
        }

        $scope.cancelveri = function(entity){
            initData(entity)
        }

        var getValidator = function(paramint){
            $scope.notificateTitle = "Estatus de solicitud.";
            $scope.elementText = "Su solitud actualmente se encuentra en un estado de borrador. \n" 
            + "Desea cambiar el estatus de esta a tramitado para continuar con su debido" + 
            " proceso?";
            try{
                suspensionFactory.getValidate(paramint)
                .success(function(data){
                    if(data.status_id == 1){
                        $scope.btnapply = false;
                        $scope.information = data;
                        Notification.info({
                            message: "Estimado alumno", 
                            templateUrl: "change_status.html", 
                            scope: $scope});
                    }else{
                        initData(data);
                    }
                    
                })
            }catch(err){
                console.log(err + ' error');
            }
        }

        /**
        *   Inicia los datos de la vista con la informacion de
        *   la suspencion en caso de que ubiera un registro
        */
        var initData = function(paramObject){
            $scope.reason = paramObject.reason;
            $scope.period_ids = paramObject.period_id;
            $scope.records = paramObject.evidence;
            $scope.suspen = paramObject;
            $scope.textNote = 0;
            if ($scope.suspen.status_id == 1) {
                $scope.btnapply = false;
            }
            if ($scope.suspen.status_id == 2) {
                $scope.btnapply = false;
                $scope.btnprint = true;
                $scope.btnfile  = true;
            };
            if($scope.suspen.evidence != null){
                $scope.viewNote = true;
                $scope.btnfile = false;
                $scope.btnprint = false;
            }
            
        }

        $scope.onLoad = function (e, reader, file, fileList, fileOjects, fileObj) {
            Notification.success({
                message: 'Imagen adjuntada correctamente.',
                delay: 10000});

        };

        $scope.updateevidence = function(){
            $scope.suspen.evidence = $scope.records.base64;
            updateSuspen($scope.suspen);

        }

        /**
        *   Actualiza el estatus de una suspención para
        *   continuar con el proceso. 
        */
        var updateSuspen = function(paramObject){
            paramObject.status_id = 2;
            suspensionFactory.update(paramObject)
            .success(function(data){
                if(paramObject.evidence == null){
                    Notification({
                        title: '<i class="fa fa-info-circle"></i> Information',
                        message: '<div aling="justify">Se a completado el proceso de solicitud, \nfavor de imprimir su pdf para la recoleccion de firmas, para que después pueda subir una imagen de estas y así seguir con el proceso.</div>', 
                        delay: 10000
                    });
                }else{
                    Notification({
                        title: '<i class="fa fa-info-circle"></i> Information',
                        message: '<div aling="justify">Se han subido las firmas de no adeudo correctamente</div>', 
                        delay: 5000
                    });
                }
                initData(paramObject);
            })
            .error(function(error){

                console.log(error);
            })
            
        }

        /**
        * Guarda la peticion de suspension en 
        * la tabla de suspenciones
        */
        $scope.save = function(period){
            $scope.suspen.reason = $scope.reason;
            $scope.suspen.period_id = $scope.period_ids;
            $scope.suspen.student_id = $scope.userSusp.student;
            $scope.suspen.status_id = 1;
            
            suspensionFactory.save($scope.suspen)
            .success(function(data){
                if(data){
                    Notification.success({
                        title: 'Success',
                        message: 'Registro efectuado.', 
                        delay: 5000
                    });
                    setTimeout('document.location.reload()',3000);
                }
            })
            .error(function(error){
                $scope.error = "";
                angular.forEach(error.errors,function(value){
                    $scope.error += value + "</br>";
                });
                Notification.error({
                    message: '<b>Error</b> </br>'+$scope.error,
                    title: '<u>Error al tramitar la suspensión</u>',
                    delay: 10000
                });
            })
        }
        

    });