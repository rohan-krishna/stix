@extends('master')

@section('content')
    @if(Auth::guest())
        <div class="container">
            <h3>Hi there!</h3>
        </div>
    @else
    
    <div class="container" ng-cloak>
        <h3>Stix</h3>
        <hr>
        <div layout="row" flex ng-controller="MainController" md-theme="myTheme">
            <md-sidenav 
                md-component-id="left" 
                md-whiteframe="4"
                md-is-locked-open="$mdMedia('gt-md')"
                class="md-sidenv-left">
                <md-toolbar class="md-primary">
                    <div class="md-toolbar-tools">
                        <h2>Notebooks</h2>
                        <span flex></span>
                        <md-menu>
                            <md-button class="md-icon-button" aria-label="More" ng-click="createNewNotebook()" md-menu-origin>
                                <i class="material-icons">add_circle</i>
                            </md-button>
                            <md-menu-content width="4">
                                <md-menu-item>
                                   <md-button ng-click="createNewNotebook()" class="">
                                        Create A New Notebook
                                    </md-button>
                                </md-menu-item>
                            </md-menu-content>
                        </md-menu>
                    </div>
                </md-toolbar>
                <md-content flex layout-padding>
                    <md-list>
                        <md-list-item flex ng-repeat="notebook in notebooks" ng-click="selectNotebook(notebook.slug)" ng-class="{ 'active' : activeNotebook.id == notebook.id }">
                            @{{ notebook.title }}
                            <span flex></span>
                            <md-button class="md-icon-button" ng-click="showDeleteDialog($event,notebook,$index)">
                                <i class="material-icons">delete_forever</i>
                            </md-button>
                        </md-list-item>
                    </md-list>
                </md-content>
            </md-sidenav>
            <md-content flex>
                <md-toolbar class="md-accent">
                    <h1 class="md-toolbar-tools">Notes</h1>
                </md-toolbar>
            </md-content>
            </div>
        </div>
    </div>
    

    @endif
@endsection