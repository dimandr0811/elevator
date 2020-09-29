<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Elevator</title>
</head>
<body>

<br>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h2><p class="text-center">Elevator</p></h2>
            <p class="text-center"> One floor = one second</p>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-2">
            <a href="index.php?f=1" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">1</a>
        </div>
        <div class="col-2">
            <a href="index.php?f=2" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">2</a>
        </div>
        <div class="col-2">
            <a href="index.php?f=3" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">3</a>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <a href="index.php?f=4" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">4</a>
        </div>
        <div class="col-2">
            <a href="index.php?f=5" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">5</a>
        </div>
        <div class="col-2">
            <a href="index.php?f=6" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">6</a>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <a href="index.php?f=7" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">7</a>
        </div>
        <div class="col-2">
            <a href="index.php?f=8" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">8</a>
        </div>
        <div class="col-2">
            <a href="index.php?f=9" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">9</a>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <a href="?stop=1" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Stop</a>
        </div>
        <div class="col-2">
            <a href="index.php?f=10" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">10</a>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" id="evacuation">Evacuation</a>
        </div>
    </div>
    </form>

    <div class="container">
        <div class="content_block" style="display: none;">
            <p>
                <h2>Contact Me</h2>
                <p><b>Name</b>: Andrushchenko Dmitriy</p>
                <p><b>Phone number</b>: +380933715423 (viber, telegram)</p>
                <p><b>Email</b>: dimandr@i.ua</p>
            </p>
        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $("#evacuation").click(function(){
            $('.content_block').slideToggle(300);
            return false;
        });
    });
</script>
</body>
</html>