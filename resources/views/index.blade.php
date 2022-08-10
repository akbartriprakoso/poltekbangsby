@extends('layouts.main')
@section('content')

<!-- Default box -->
@foreach($posts as $problem)
@if ($problem->status === 1)
<div class="card">
  <div class="card-header">
    <h3 class="card-title"> <strong>{{ $problem->title }}</strong></h3> &nbsp;
    Ditulis Oleh: {{ $problem->penulis }}
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button> --}}
    </div>
  </div>
<div class="card-body">
<article>
  <table>
      <tr>
        <td>
          @if ($problem->video1 != null)
          <iframe class="col-md-12 lg-12" src="https://www.youtube.com/embed/{{ $problem->video1 }}"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
          @endif
        </td>
          {{-- <td style="padding: 10px">{!! $problem['video1'] !!}</td> --}}
          {{-- <td></td> --}}
          <td>
          {!! $problem->deskripsi !!}
          {{-- <td style="padding: 10px">By : <strong>{{ $problem['penulis'] }}</strong><br>{!! $problem['deskripsi'] !!}</td> --}}
          </td>
      </tr>
  </table>
</article>
</div>
<!-- /.card-body -->
<div class="card-footer">
  {{-- <a href="/problems/{{ $problem['slug'] }}">Read More...</a>  --}}
  <a href="/posts/detil/{{ $problem['slug'] }}">Read More...</a> 
</div>
<!-- /.card-footer-->
</div>
<!-- /.card -->
  
@endif

@endforeach
@endsection