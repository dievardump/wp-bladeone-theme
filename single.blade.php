@extends('layouts.app')

@section('content')
  @if(have_posts())
    @while(have_posts()) @php the_post() @endphp
      @includeFirst([
        'partials.content-single-'.get_post_type().'-'.get_post_field('post_name', get_post()),
        'partials.content-single-'.get_post_type(),
        'partials.content-single'
      ])
    @endwhile
  @else
    <div class="alert alert--info">
      {{ __('Sorry, nothing to display', 'wp_bladeone_theme') }}
    </div>
  @endif
@endsection
