<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a new step entry.</h1>

    <form action="/steps" method="POST">
        
        @csrf
        
        <div>
            <input type="number" name="stepTotal" id="stepTotal" placeholder="Total Steps">
        </div>

        <div>
            <input type="hidden" name="user_id" value="1">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Add Steps</button>
        </div>
    </form>
</body>
</html>