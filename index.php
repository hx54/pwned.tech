
<!DOCTYPE html>
<html>
<head>
    <title>pwned.tech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <center>
        <h1>pwned.tech</h1>
        <h3 style="color: orange;">Join our discord!</h3>
        <h3><a href="https://discord.gg/EJqkueU" style="color: red;">discord.gg/EJqkueU</a> | Contact: hx54#6067</h3>
        <form action="search.php" method="post">
            <h4>Input targets username</h4>
            <input type="text" name="target" placeholder="username">

            <h4>Enter your auth key</h4>
            <input type="text" name="key" placeholder="key" <?php if(isset($_COOKIE["key"])) { echo "value=$_COOKIE[key]";}?>>
            <br>
            <button type="submit">Search</button>
        </form>
        <?php if(isset($_GET['error'])){?>
            <p><?php echo $_GET['error'];?></p>
        <?php }?>
    </center>
</div>
</body>
</html>
