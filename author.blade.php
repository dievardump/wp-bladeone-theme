@extends('layouts.app')

@section('content')
  <div class="page__header">
    @if(have_posts())
			@php the_post() @endphp
			<h1>{{ __('Author Archives for ', 'wp_bladeone_theme') }} {{ get_the_author() }}</h1>
			@if(get_the_author_meta('description' ))
				{{ get_avatar( get_the_author_meta( 'user_email' ) ) }}
				<h2>{{ __( 'About ', 'wp_bladeone_theme' ) }} {{ get_the_author() }}</h2>
				{{ wpautop( get_the_author_meta( 'description' ) ) }}
			@endif

			@php rewind_posts() @endphp
		@endif
  </div>

  @if(have_posts())
    @while(have_posts()) @php the_post() @endphp
			@include('partials.content')
		@endwhile
    {!! get_the_posts_navigation() !!}
	@else
		<div class="alert alert--info">
			{{ __('Sorry, nothing to display', 'wp_bladeone_theme') }}
		</div>
	@endif
@endsection

