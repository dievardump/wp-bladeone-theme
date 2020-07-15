{{--
  Template Name: Search Page
--}}
@extends('layouts.app')

@section('content')
  @include('partials.page-header', ['title' => __('Search results :', 'wp_bladeone_theme')])

  @if(have_posts())
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile
    {!! get_the_posts_navigation() !!}
  @else
  <div class="alert alert--info">
    {{ __('Sorry, no results were found.', 'wp_bladeone_theme') }}
  </div>
  {!! get_search_form(false) !!}
  @endif
@endsection
