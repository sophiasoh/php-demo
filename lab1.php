<!DOCTYPE html>
<html>
<head>
    <title>Lab 1 - My Favorite Fruits</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 60px auto;
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            margin: 8px 0;
            font-weight: 500;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #888;
            box-shadow: 0 0 4px rgba(0,0,0,0.1);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #444;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #222;
        }

        h3 {
            margin-top: 20px;
            color: #333;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin: 5px 0;
            color: #444;
        }

        .favorite {
            margin-top: 10px;
            padding: 10px;
            background: #eef1f4;
            border-left: 4px solid #444;
            border-radius: 5px;
        }
        .arrow-btn {
    position: fixed;
    top: 20px;
    width: 45px;
    height: 45px;
    background: rgba(50, 50, 50, 0.85);
    backdrop-filter: blur(6px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
    z-index: 1000;
}


.arrow-btn.left {
    left: 20px;
}

.arrow-btn.right {
    right: 20px;
}


.arrow {
    color: #fff;
    font-size: 20px;
    transition: transform 0.3s ease;
}


.arrow-btn:hover {
    transform: translateY(-3px) scale(1.05);
    background: rgba(30, 30, 30, 0.95);
}


.arrow-btn.left:hover .arrow {
    transform: translateX(-4px);
}

.arrow-btn.right:hover .arrow {
    transform: translateX(4px);
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-4px); }
    100% { transform: translateY(0px); }
}

.arrow-btn {
    animation: float 3s ease-in-out infinite;
}
    </style>
</head>
<body>
    <a href="index.php" class="arrow-btn left">
    <span class="arrow">&#10094;</span>
</a>

<a href="lab2.php" class="arrow-btn right">
    <span class="arrow">&#10095;</span>
</a>

    <h1>My Favorite Fruits</h1>

<form method="post">
  <p>FRUIT 1: <input type="text" name="fruit1" fruit="Fruit 1"></p> <br>
  <p>FRUIT 2: <input type="text" name="fruit2" fruit="Fruit 2"></p><br>
  <p>FRUIT 3: <input type="text" name="fruit3" fruit="Fruit 3"></p><br>
  <p>FRUIT 4: <input type="text" name="fruit4" fruit="Fruit 4"></p><br>
  <p>FRUIT 5: <input type="text" name="fruit5" fruit="Fruit 5"></p><br><br>
    
    <button type="submit">SAVE MY FRUITS</button>
</form>

    <?php
       if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fruits = [ 
        $_POST["fruit1"],
        $_POST["fruit2"],
        $_POST["fruit3"],
        $_POST["fruit4"],
        $_POST["fruit5"]
    ];

   echo "<h3>YOUR FAVORITE FRUITS:</h3>";
echo "<ul>";

foreach ($fruits as $fruit) {
    echo "<li>" . $fruit . "</li>";
}
       
echo "</ul>";
    echo "<h3>MY FAVORITE FRUIT IS: " . $fruits[0] . "</h3>";
}
    ?>

</body>
</html>