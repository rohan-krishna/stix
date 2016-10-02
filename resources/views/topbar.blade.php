<md-toolbar class="md-primary md-myTheme-theme">
	<div class="container">
		<div class="md-toolbar-tools">
			@if(Auth::check())
			<h3>Stix says, hello {{ Auth::user()->name }}!</h3>
			<span flex></span>
			<md-button href="{{ url('/logout') }}"
			    onclick="event.preventDefault();
			             document.getElementById('logout-form').submit();"
			    class="md-icon-button">
			    <i class="material-icons">no_encryption</i>
			    <md-tooltip md-direction="bottom">
		          Logout
		        </md-tooltip>
			</md-button>
			<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
			    {{ csrf_field() }}
			</form>
			@endif
		</div>
	</div>
</md-toolbar>
<span layout-padding></span>