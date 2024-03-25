<!DOCTYPE html>
<html>
    <head>
        <title>
            Test ?
        </title>
        <meta charset="UTF-8">
    <title>Text Display</title>
    <style>
            body {
                text-align: center;
            }
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh; /* Use the full height of the viewport */
            }
        </style>
    <script>
    function displayText() {
        // Get the value from the textbox
        var text = document.getElementById('inputText').value;
        // Display the text in the div above
        document.getElementById('displayText').innerHTML = text;    
    }
</script>

<body style = "text-align:center;" >
<div class="container">

    <div id="displayText"></div> <!-- The text will appear here -->
    <input type="text" id="inputText" placeholder="Type something...">
    <button onclick="displayText()">Display Text</button>

    <?php
    echo '<a href="https://www.example.com" style="display:inline-block; padding:10px 20px; background-color:#007bff; color:white; text-align:center; text-decoration:none; border-radius:5px;">Go to Example Page</a>';
    ?>
</div>

</body>
</html>