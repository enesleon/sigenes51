'use strict';
/**
 * @ngdoc controller
 * @name Enes.controller: CountrysController
 * @param $scope
 * @requires
 * @methodOf ng.controller:Enes
 * @description
 * My Description rules
 */

angular.module('Enes')
    .controller('CountrysController', function ($scope,countryFactory, Notification) {
        $scope.country = [];
        $scope.countrys = [];

        $scope.availableSearchParams = [
            {key: "code", name: "Código", placeholder: "Código .."},
            {key: "name", name: "Nombre", placeholder: "Nombre .."},
        ];

        countryFactory.getAllCountry()
            .success(function (data) {
                $scope.countrys = data;
            })
            .error(function (error) {
                Notification.error(
                    {
                        message: '<b>Error!</b> Problemas de conexión',
                        title: '<b>Error</b>',
                        delay: 5000
                    });
            });

        $scope.save = function(country){
            countryFactory.save(country)
                .success(function(data){
                    Notification.success({message: 'País '+ country.name +' creado correctamente.', delay: 5000});
                })
                .error(function(error){
                    Notification.error(
                        {message: '<b>Error</b> <s>notificación</s>',
                            title: '<u>Error al crear el País</u>',
                            delay: 5000});
                })
        }

        $scope.editCountry = function (country) {
            countryFactory.update(country)
                .success(function (data) {
                    $('#edit').modal('hide');
                    Notification.success({
                        message: 'Socio ' + country.name + ' actualizado correctamente.',
                        delay: 5000
                    });
                })
                .error(function (error) {
                    Notification.error(
                        {
                            message: '<b>Error</b> <s>notificación</s>',
                            title: '<u>Error al actualizar el País</u>',
                            delay: 5000
                        });
                })
        }

        $scope.deleteCountry = function (country) {
            countryFactory.delete(country)
                .success(function (data) {
                    $('#delete').modal('hide');
                    Notification.success({
                        message: 'País ' + country.name + ' eliminado correctamente.',
                        delay: 5000
                    });
                })
                .error(function (error) {
                    Notification.error(
                        {
                            message: '<b>Error</b> <s>notificación</s>',
                            title: '<u>Error al eliminar el País</u>',
                            delay: 5000
                        });
                })
        }

        $scope.editCountryModal = function (country) {
            $scope.country = country;
            $scope.edit = true;
            $('#edit').modal('show');
        }

        $scope.showCountry = function (country) {
            $scope.country = country;
            $('#show').modal('show');
        }

        $scope.deleteCountryModal = function (country) {
            $scope.country = country;
            $('#delete').modal('show');
        }
    });
