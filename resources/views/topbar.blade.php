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
			@else
			<h3>Stix</h3>
			<span flex></span>
			<md-button class="md-icon-button" href="{{ url('/login') }}">
				<i class="material-icons">lock_open</i>
				<md-tooltip md-direction="bottom">Login</md-tooltip>
			</md-button>
			<md-button class="md-icon-button" href="{{ url('/register') }}">
				<i class="material-icons">assignment_id</i>
				<md-tooltip md-direction="bottom">Register</md-tooltip>
			</md-button>
			@endif
		</div>
	</div>
</md-toolbar>
<span layout-padding></span>