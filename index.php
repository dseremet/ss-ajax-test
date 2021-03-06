<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SS Test</title>
    <link rel="stylesheet" href="css/boostrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DŠ</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Parser <span class="sr-only">(current)</span></a></li>
                <li><a target="_blank" href="http://allrecipes.com/recipe/39455/marinated-tuna-steak/">Tuna Steak</a></li>
                <li><a target="_blank" href="http://allrecipes.com/recipes/475/meat-and-poultry/beef/steaks/">Beef Steak</a></li>
                <li><a target="_blank" href="https://en.wikipedia.org/wiki/Sushi">Sushi</a></li>
                <li><a target="_blank" href="https://en.wikipedia.org/wiki/Sarma_(food)">Sarma</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="content">
    <div id="form">
        <form action="" id="string-form" autocomplete="off">
            <div class="col-sm-6 col-sm-offset-3">
                <label for="text">String</label>
                <input type="text" class="form-control" id="text" name="text" placeholder="Enter string">
                <span class="label label-danger" id="error" style="display: none;">Error</span>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <button class="btn btn-primary" id="submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <br>
    <div id="loader" style="display: none;">
        <div id="loader_1" class="loader"></div>
        <div id="loader_2" class="loader"></div>
        <div id="loader_3" class="loader"></div>
        <div id="loader_4" class="loader"></div>
        <div id="loader_5" class="loader"></div>
        <div id="loader_6" class="loader"></div>
        <div id="loader_7" class="loader"></div>
        <div id="loader_8" class="loader"></div>
    </div>

    <div id="message" class="col-sm-6 col-sm-offset-3" style="display: none;">
        <table class="table table-striped">
            <tr>
                <td>Name:</td>
                <td class="r_name"></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td class="r_phone"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td class="r_email"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td class="r_address"></td>
            </tr>
        </table>

    </div>
</div>
<footer class="fixed-bottom">
    <span class="pull-left">Parse Test</span>
    <span class="pull-right">Damir Šeremet</span>
</footer>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>
</html>