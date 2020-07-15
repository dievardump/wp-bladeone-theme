@extends('layouts.app')

@section('content')
  <div class="page__header">
    <h1>{!! __('Latest posts', 'wp_bladeone_theme') !!}</h1>
  </div>

  @if (have_posts())
    @while (have_posts()) before the_post @php the_post() @endphp
      @includeFirst(['partials.content-'.get_post_type(), 'partials.content'])
    @endwhile
    {!! get_the_posts_navigation() !!}
  @else
    <div class="alert alert--info">
      {{ __('Sorry, nothing to display', 'wp_bladeone_theme') }}
    </div>
  @endif
@endsection