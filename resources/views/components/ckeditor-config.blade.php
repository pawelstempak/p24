<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/translations/pl.js"></script> -->
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
        <script>
                ClassicEditor
                        .create( document.querySelector( '#editor1' ), {
                            ckfinder:{
                                uploadUrl: '{{ route('upload').'?_token='.csrf_token() }}'
                            },
                            language: 'pl'
                        } )
                        .then( editor => {
                                console.log( editor );
                        } )
                        .catch( error => {
                                console.error( error );
                        } );

                        ClassicEditor
                        .create( document.querySelector( '#editor2' ), {
                            ckfinder:{
                                uploadUrl: '{{ route('upload').'?_token='.csrf_token() }}'
                            },
                            language: 'pl'
                        } )
                        .then( editor => {
                                console.log( editor );
                        } )
                        .catch( error => {
                                console.error( error );
                        } );                        
        </script>   