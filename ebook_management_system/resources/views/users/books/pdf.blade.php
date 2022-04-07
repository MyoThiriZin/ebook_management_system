<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $book->file }}</title>
</head>

<body>
  <embed src="{{ asset('pdf_files/' . $book->file ) }}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="630px" />
</body>

</html>