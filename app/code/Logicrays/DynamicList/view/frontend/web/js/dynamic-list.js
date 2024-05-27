define([
    'uiComponent',
    'ko',
    'Logicrays_DynamicList/js/shared-observables'
], function(Component, ko, sharedObservables) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Logicrays_DynamicList/dynamic-list',
            newItems: sharedObservables
        },
        initialize: function () {
            this._super();
            this.name = ko.observable('');
            this.email = ko.observable('');
            this.dob = ko.observable('');
            this.gender = ko.observable('');
            this.city = ko.observable('');
            this.languages = ko.observableArray([]);
            this.items = ko.observableArray([]);

            this.nameErrors = ko.observable('');
            this.emailErrors = ko.observable('');
            this.dobErrors = ko.observable('');
            this.genderErrors = ko.observable('');
            this.cityErrors = ko.observable('');
            this.languagesErrors = ko.observable('');

            this.availableCities = [
                'Select City',
                'Ahmedabad',
                'Surat',
                'Jaipur',
                'Jamnagar',
                'Bhavnagar'
            ];
            this.availableLanguages = ko.observableArray([
                {language: 'Hindi'},
                {language: 'Gujarati'},
                {language: 'Marathi'},
                {language: 'Bhojpuri'},
                {language: 'English'}
            ]);

            // Binding the methods to ensure correct 'this' context
            this.addItem = this.addItem.bind(this);
        },

        addItem: function () {
            if (this.isValidatedFields()) {
                var details = {
                    name: this.name(),
                    email: this.email(),
                    dob: this.dob(),
                    gender: this.gender(),
                    city: this.city(),
                    languages: this.languages()
                }
                if (details && this.isDuplicate(details)) {
                    this.items.push(details);
                    sharedObservables(this.items());
                    this.name('');
                    this.email('');
                    this.dob('');
                    this.gender('');
                    this.city(['Select City']);
                    this.languages([]);
                } else {
                    this.emailErrors("Email is already exists!");
                }
            }
        },

        validateEmail: function (email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },

        isValidatedFields: function () {
           let valid = true;

           this.nameErrors('');
           this.emailErrors('');
           this.dobErrors('');
           this.genderErrors('');
           this.cityErrors('');
           this.languagesErrors('');

            if (!this.name()) {
                this.nameErrors('Name field is required');
                valid = false;
            } else if (!this.email()) {
                this.emailErrors('Email is required');
                valid = false;
            } else if (!this.validateEmail(this.email())) {
                this.emailErrors('please enter valid email address');
                valid = false;
            } else if (!this.dob()) {
                this.dobErrors('Date of Birth is required');
                valid = false;
            } else if (new Date(this.dob()) > new Date ()) {
                this.dobErrors('Future date is not allowd');
                valid = false;
            } else if (!this.gender()) {
                this.genderErrors('Gender field is required');
                valid = false;
            } else if (!this.city() || this.city() == 'Select City') {
                this.cityErrors('City field is required');
                valid = false;
            } else if (this.languages().length == 0) {
                this.languagesErrors('At least one language must be selected.');
                valid = false;
            }

            return valid;

        },

        isDuplicate: function (details) {
            let index = this.items().findIndex(item => item.email === details.email);

            if (index !== -1) {
                return false;
            }
            return true;
        }
    });
});