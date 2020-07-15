<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('sections.head')
  <body @php body_class() @endphp>
    @include('sections.header')
    <div class="wrap container" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @includeWhen(WP_BLADEONE_THEME_DISPLAY_SIDEBAR === true, 'sections.sidebar')
      </div>
    </div>
    @include('sections.footer')
    @php wp_footer() @endphp
  </body>
</html>
