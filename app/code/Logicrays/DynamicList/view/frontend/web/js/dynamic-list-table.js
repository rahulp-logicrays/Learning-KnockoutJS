define([
    'uiComponent',
    'ko',
    'jquery',
    'Logicrays_DynamicList/js/shared-observables',
    'Logicrays_DynamicList/js/dynamic-list'
], function(Component, ko, $, sharedObservablesss, dynamicList) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Logicrays_DynamicList/dynamic-list-table',
        },

        initialize: function () {
            this._super();
            this.details = sharedObservablesss;
            this.removeItem = this.removeItem.bind(this);
            this.details.subscribe(this.saveDataToServer.bind(this));
        },

        removeItem: function (item) {
            this.details.remove(item);
            this.saveDataToServer();
        },

        saveDataToServer: function () {
            $.ajax({
                url: 'http://127.0.0.1/magento246/pub/dynamiclist/index/save',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(this.details()),
                success: function (response) {
                    console.log(response.message);
                },
                error: function (error) {
                    console.error('Error saving data:', error);
                }
            });
        }
    });
});