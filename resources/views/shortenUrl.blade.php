<!DOCTYPE html>
<html>
<head>
    <title>Create URL Shortener</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 50px;
        }
        form {
            margin-bottom: 30px;
        }
        table {
            background-color: #fff;
            box-shadow: 0px 0px 10px #ccc;
        }
        th {
            font-weight: bold;
            text-align: center;
        }
        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create URL Shortener</h1>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('generate.shorten.url.post') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="url" name="url" class="form-control" placeholder="Enter URL">
                            </div>
                           
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary">Generate Shorten Url</button>
                            </div>


                        </form>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Shortened URLs</h5>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                 <div class="table-responsive">
                    <table class="table table-bordered">
                             <thead>
                                 <tr>
                
                                    <th>Short URL</th>
                                     
                                 </tr>
                            </thead>
                        <tbody>
                             @if($shortUrls->count() > 0)
                                 <tr>
            
                                  <td><a href="{{ route('shorten.url', $shortUrls->last()->code) }}" target="_blank">{{ route('shorten.url', $shortUrls->last()->code) }}</a></td>
                               
                                 </tr>
                            @endif
                        </tbody>

                    </table>
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
         
        const urlInput = document.getElementById('url');
        const shortUrlCell = document.querySelector('table td');

         
        if (shortUrlCell) {
            urlInput.value = shortUrlCell.textContent;
        }
    </script>
</body>
</html>
