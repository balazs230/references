<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Article</title>
    
   @include('shared.meta_header')

</head>

<body>

<!-- Navigation menu -->
@include('shared.navmenu')

<!-- Admin header -->
@include('shared.admin_header')

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Create Article</h5>
                                        </div>
                                        <div class="card-block">
                                        <form action="{{ route('articles.store') }}" method="POST">
                                            
                                            @method('POST')

                                            @csrf

                                                <div class="row mb-3">
                                                    <div class="col-sm-6 col-xl-9">
                                                        <div class="form-group">

                                                            <label>Categories</label>

                                                            @if (count($categories) > 0)
                                                               <select class="form-control" name="category_id">  
                                                                    @foreach ($categories as $category)
                                                                
                                                               <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                                                                                    
                                                                    @endforeach
                                                                </select>
                                                            @else
                                                                <input type="text" value="There is no category" name="category_id" class="form-control" readonly>
                                                            @endif

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-3">
                                                    <button {{ count($categories) ? null : 'disabled' }} class="btn btn-primary shadow-1 text-uppercase btn-block" style="margin-top: 28px;" type="submit">Save article</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Article Title</label>
                                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" >
                                                    @error('title')
                                                <small class="form-text" style="color: red;">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <br />
                                                
                                                <textarea name="content" id="tinymce-editor" class="form-control @error('content') is-invalid @enderror"></textarea>
                                                    @error('content')
                                                <small class="form-text" style="color: red;">{{ $message }}</small>
                                                    @enderror
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('shared.scripts')

    <!-- tinymce editor -->
    <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        // tinymce editor
        $(window).on('load', function() {
            tinymce.init({
                selector: '#tinymce-editor',
                height: 600,
                theme: 'modern',
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
                image_advtab: true
            });
        });
    </script>

</body>

</html>
