@extends('layouts.main')
@section('content')
    <!-- Notifikasi menggunakan flash session data -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @method('PUT')
    

    <h1>{{ $posts['title'] }}</h1>

    @if ($posts->pdf != null)
    <div class="col col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 row-eq-height float-left">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">PDF</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i> </button> {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove"> <i class="fas fa-times"></i> </button> --}}
                </div>
            </div>
            <div class="card-body col-lg-12 col-md-12 col-12 "> {{-- <article> <table> <tr> --}} {{-- <td> --}}
                {{-- <p><iframe src="/uploads/{{ $posts->pdf }}" frameborder="0" width="100%"></iframe></p> --}}
                {{-- <p><iframe id="fred" style="border:0px solid #666CCC" title="PDF in an i-Frame" src="https://drive.google.com/file/d/1O1V1vInwvmWDZ1yO-ZOel3pn-4nixTfc/preview" frameborder="0" scrolling="auto" class="col col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " height="640px"></iframe></p> --}}
                <p><iframe id="fred" style="border:0px solid #666CCC" title="PDF in an i-Frame" src="/uploads/{{ $posts->pdf }}" frameborder="0" scrolling="auto" class="col col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " height="640px"></iframe></p>
                {{-- <p><embed name="plugin" type="application/pdf"
                    width="100%" height="100%" 
                    src="/uploads/{{ $posts->pdf }}" /></p> --}}
                {{-- {!! $posts['pdf'] !!} --}}
                {{-- </td> --}}
                {{-- <td style="padding: 3%"> --}}

                {{-- audio --}}
                {{-- </td>
  </tr>
</table>
</article> --}}
            </div>
            <!-- /.card -->
        </div>
    </div>{{--  --}}
    @endif
    
    @if ($posts->sound1||$posts->sound2||$posts->sound3)
    <div class="col col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4  float-left">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Rekaman Suara</h3>
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
                            @if ($posts->sound1 != null)
                                <p>Rekaman Suara 1</p>
                                <audio controls class="col-md-6">
                                    <source src="/uploads/sound/{{ $posts->sound1 }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @endif
                        </tr>
                        <tr>
                            @if ($posts->sound2 != null)
                                <p>Rekaman Suara 2</p>
                                <audio controls class="col-md-6">
                                    <source src="/uploads/sound/{{ $posts['sound2'] }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @endif
                        </tr>
                        <tr>
                            @if ($posts->sound3 != null)
                                <p>Rekaman Suara 3</p>
                                <audio controls class="col-md-6">
                                    <source src="/uploads/sound/{{ $posts['sound3'] }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @endif
                        </tr>
                    </table>
                </article>
            </div>
            <!-- /.card -->
        </div>
    </div>
    @endif
    

    <div class="card col-sm  float-left">
        <div class="card-header">
            <h3 class="card-title">Body</h3>
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
                        <td style="padding: 10px">By : <strong>{{ $posts['penulis'] }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="col col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            {!! $posts['content'] !!}
                        </td>
                    </tr>
                </table>
            </article>
        </div>
    </div>

    @if ($posts->vide01||$posts->video2||$posts->video3 != null)
    <div class="card col col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 row-eq-height  float-left">
        <div class="card-header">
            <h3 class="card-title">Video</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
      <i class="fas fa-times"></i>
    </button> --}}
            </div>
        </div>
        
        <div class="card-body col-lg-12 col-md-12 col-12">
            <article>
                <table>
                    <tr>
                        <td>
                            @if ($posts->video1 != null)
                                <iframe class="card-body col-sm-12 col-lg-12 col-md-12 col-12" height="315"
                                    src="https://www.youtube.com/embed/{{ $posts->video1 }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            @endif
                        </td>
                        <td>
                            @if ($posts->video2 != null)
                                <iframe class="card-body col-sm-12 col-lg-12 col-md-12 col-12" height="315"
                                    src="https://www.youtube.com/embed/{!! $posts['video2'] !!}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            @endif
                        </td>
                        <td>
                            @if ($posts->video3 != null)
                                <iframe class="card-body col-sm-12 col-lg-12 col-md-12 col-12" height="315"
                                    src="https://www.youtube.com/embed/{!! $posts['video3'] !!}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            @endif
                        </td>

                    </tr>
                </table>
            </article>
        </div>
        <!-- /.card -->
    </div>
        @endif

        <div class="card-body">
            <div class="card-footer float-left">
                <a href="/">Back to Beranda</a>
            </div>
            <!-- /.card-footer-->
        </div>

    
    <!-- /.card-body -->
@endsection
