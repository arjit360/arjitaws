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
			
			table, th, td {
				border: 1px solid black;
				text-align:center;
				padding:10px;
			}
			.table {
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

         </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                     <h1> Uploaded Files </h1>
						<a href="/" style="float:right; margin-right:2%; display:inline-block"> Back to Upload File </a>
					 <table class="table">
						<tr> <th>#</th> 
							 <th>Object URL</th>
						</tr>
						<?php $i = 0; ?>
                        @foreach ($names as $name)
                        <tr>
							<td> {{ $i }}</td>
							<td><a href='<?php echo $name ?>'>{{ $name }}<a></td>
							<?php $i++; ?>
						</tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <script>
        </script>
    </body>
</html>
