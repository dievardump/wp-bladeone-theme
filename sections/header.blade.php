@php do_action('get_header') @endphp
<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    @include('sections.menu')
  </div>
</header>
