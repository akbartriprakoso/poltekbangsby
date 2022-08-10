@extends('layouts.main')
    @section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

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

                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required>

                                <!-- error message untuk title -->
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Publish Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" selected>Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea
                                    name="content" id="content"
                                    class="form-control @error('content') is-invalid @enderror"
                                    rows="5"
                                    required>{{ old('content') }}</textarea>

                                <!-- error message untuk content -->
                                @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input type="text" name="penulis"
                                class="form-control @error('penulis') is-invalid @enderror"
                                value="{{ old('penulis') }}">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi"
                                class="form-control"
                                value="{{ old('deskripsi') }}">
                            </div>

                            <div class="form-group">
                                <label for="pdf">Upload PDF</label>
                                <input type="file" name="pdf" id="pdf" placeholder="File Upload" class="btn-sm btn-danger">
                            </div>

                            <div class="form-group">
                                <label for="sound1">Upload Sound</label>
                                <input type="file" name="sound1" id="sound1" placeholder="File Upload" class="btn-sm btn-danger">
                            </div>

                            <div class="form-group">
                                <label for="sound2">Upload Sound</label>
                                <input type="file" name="sound2" id="sound2" placeholder="File Upload" class="btn-sm btn-danger">
                            </div>

                            <div class="form-group">
                                <label for="sound3">Upload Sound</label>
                                <input type="file" name="sound3" id="sound3" placeholder="File Upload" class="btn-sm btn-danger">
                            </div>

                            <h2>Upload Link Video</h2>
                            <div class="form-group">
                                <label for="video1">https://www.youtube.com/watch?v=<u>IYswY0Jgup4</u> copy link youtube yg garis bawah seperti contoh ini</label>
                                <input placeholder="IYswY0Jgup4" type="text" name="video1"
                                class="form-control @error('video1') is-invalid @enderror"
                                value="{{ old('video1') }}">
                            </div>

                            <div class="form-group">
                                <input placeholder="IYswY0Jgup4" type="text" name="video2"
                                class="form-control @error('video2') is-invalid @enderror"
                                value="{{ old('video2') }}">
                            </div>

                            <div class="form-group">
                                <input placeholder="IYswY0Jgup4" type="text" name="video3"
                                class="form-control @error('video3') is-invalid @enderror"
                                value="{{ old('video3') }}">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('post.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
{{-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
</body>

</html> --}}