<nav class="nav-primary">
	@if (has_nav_menu('main-menu'))
		{!! wp_nav_menu(['theme_location' => 'main-menu', 'menu_class' => 'nav']) !!}
	@endif
</nav>