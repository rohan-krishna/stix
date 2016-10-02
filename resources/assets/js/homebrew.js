var angular = require('angular');
require('angular-aria');
require('angular-animate');
require('angular-material');
require('angular-resource');

import { MainController } from './controllers/MainController';
import { TestService } from './services/TestService';
import { NotebooksFactory } from './factories/NotebooksFactory';

var app = angular.module('stix',['ngMaterial','ngResource']);

app.config(function($mdThemingProvider) {
	$mdThemingProvider.theme('myTheme')
		.primaryPalette('blue')
		.accentPalette('pink');
});

app.service('TestService',TestService);
app.factory('NotebooksFactory',NotebooksFactory);
app.controller('MainController',MainController);