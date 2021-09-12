<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>File upload</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
			
			form {
				 margin-top:5%;
				 width:70%; 
				 margin-left:15%; 
				 margin-right:15%;
				
			}
			h1	{
				text-align:center;
				margin-left:15%;
				margin-right:15%;
				color: #999999;
				font-family: arial, sans-serif;
				font-size: 26px;
				font-weight: bold;
				margin-top: 2%;
				margin-bottom: 1px;
			}
			
			strong {
					float: left;
					color: green;
			}
            .error {
                color: red;
            }
            .success {
                color: green;
            }
			
			#upload-button {
			  position: relative;
			  top: 150px;
			  font-family: calibri;
			  width: 150px;
			  padding: 10px;
			  -webkit-border-radius: 5px;
			  -moz-border-radius: 5px;
			  border: 1px dashed #BBB;
			  text-align: center;
			  background-color: #DDD;
			  cursor: pointer;
			}
			
			input[type=file]::file-selector-button {
				  border: 2px solid #6c5ce7;
				  padding: .2em .4em;
				  border-radius: .2em;
				  background-color: #a29bfe;
				  transition: 1s;
				}
				.title.m-b-md {
					border-style: dotted solid;
					border:2px dotted solid #000;
					float: right;
					width: 70%;
					margin-top: 5%;
					
				}

				input[type=file]::file-selector-button:hover {
				  background-color: #81ecec;
				  border: 2px solid #00cec9;
				}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                
				<h1> Upload Files </h1>
				<a href="/uploaded-file" style="float:right; margin-right:2%; display:inline-block"> Show Uploaded Files </a>
                <div class="title m-b-md">
					<strong id="file-upload-status"></strong>
					<form id="upload-image-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="document" class="form-control" required size="60">
                        <button id="upload-button" type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#upload-image-form').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $('#file-upload-status').text('');
                $.ajax({
                    type:'POST',
                    url: `/upload-file`,
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() { 
                      $("#upload-button").prop('disabled', true);
                    },
                    success: (response) => {
                        if (response) {
                            this.reset();
                            $('#file-upload-status').text(response);
                            $("#upload-button").prop('disabled', false);
                        }
                    }
                });
            });
        </script>
    </body>
</html>
