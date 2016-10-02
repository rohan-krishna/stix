function MainController($scope,$mdSidenav,$mdDialog,NotebooksFactory) {

	var vm = $scope;
	
	vm.message = "Hello World!";

	vm.notebooks = [];

	vm.selectedNotebook = {};

	vm.activeNotebook = {};

	vm.notebooks = NotebooksFactory.query();

	vm.selectNotebook = function(slug) {
		vm.selectedNotebook = NotebooksFactory.get({ slug: slug });
		vm.activeNotebook = vm.selectedNotebook;
		console.log(vm.selectedNotebook);
	}

	vm.openLeftMenu = function() {
		$mdSidenav('left').toggle();
	};

	vm.showDeleteDialog = function(e,notebook,index) {
		$mdDialog.show({
			controller : DeleteDialogController,
			locals: { notebook: notebook, notebooks: $scope.notebooks, index: index },
			template: 
				`<md-dialog>
					<md-toolbar>
						<div class="md-toolbar-tools">
						    <h2>Confirm Deletion</h2>
						    <span flex></span>
				            <md-button class="md-icon-button" ng-click="close()">
				              <i class="material-icons">close</i>
				            </md-button>
						</div>
					</md-toolbar>
					<md-content>
						<div class="layout" layout-padding layout="column">
							<p flex>Are you sure you wanna delete this notebook?</p>
							<div flex>
								<md-button class="md-primary md-raised" ng-click="deleteNotebook()">Yes</md-button>
								<md-button class="md-accent md-raised" ng-click="close()">No</md-button>
							</div>
						</div>
					</md-content>
				</md-dialog>
				`,
			parent: angular.element(document.body),
			targetEvent: e,
			clickOutsideToClose: false
		});
	};

	function DeleteDialogController($scope,$mdDialog,NotebooksFactory,notebook,notebooks,index)
	{
		var notebook = NotebooksFactory.get({ slug: notebook.slug });

		$scope.close = function() {
			$mdDialog.cancel();
		}

		$scope.deleteNotebook = function() {
			notebook.$delete({slug: notebook.slug},function(response) {
				if(response != 'error')
				{
					notebooks.splice(index,1);
					notebooks = NotebooksFactory.query();
					$scope.close();
				}
			});
		}
		console.log(notebook);
	}

	

	vm.createNewNotebook = function(event) {
		$mdDialog.show({
			controller: NewNotebookDialogController,
			template: `
				<md-dialog flex="40">
					<md-toolbar>
						<div class="md-toolbar-tools">
						    <h2>Create A New Notebook</h2>
						    <span flex></span>
				            <md-button class="md-icon-button" ng-click="close()">
				              <i class="material-icons">close</i>
				            </md-button>
						</div>
					</md-toolbar>
					<md-content>
						<div class="layout" layout-padding>
							<form flex ng-submit="submitCreateForm()">
								<md-input-container class="md-block">
									<label>Title</label>
									<input ng-model="formData.title">
								</md-input-container>
								<md-button type="submit" class="md-primary md-raised">Create New Notebook</md-button>
							</form>
						</div>
						
					</md-content>
				</md-dialog>
			`,
			parent: angular.element(document.body),
			targetEvent: event,
			locals: { notebooks: $scope.notebooks },
			clickOutsideToClose:false
		});
	}


	function NewNotebookDialogController($scope,$mdDialog,NotebooksFactory,notebooks) {
		// vm.notebooks = NotebooksFactory.query();
		
		$scope.submitCreateForm = function() {
			$scope.notebook = new NotebooksFactory();
			$scope.notebook.title = $scope.formData.title;
			$scope.notebook._token = Laravel.csrfToken;
			$scope.notebook.$save(function(response) {
				notebooks.push(response);
				notebooks = NotebooksFactory.query();
				if(response != 'error') {
					$scope.close();
				}
			});
		}

		$scope.close = function() {
			$mdDialog.cancel();
		}
	}

	$scope.submitCreateForm = function() {
		vm.formData = {};

		return alert(vm.formData);
	}

	vm.openNotebookNav = function($mdOpenMenu, ev) {
		$mdOpenMenu(ev);
	};
}

export { MainController } 