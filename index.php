<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Crossword Test</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>

    <div class="container">
        <form id="theForm">
            <input type="date" value="<?= date('Y-m-d') ?>" name="date">
            <button type="submit">Submit</button>
        </form>
        <hr />
        <button type="button" id="allData">Get all historical data</button>
    </div>

    <div class="container" id="result">
        <h2>Today's Mini Crossword records</h2>
        <?php
            include 'mokup.php';
            $json = MiniCrossword::getJsonData(date('Y-m-d'));
            print '<pre>' . json_encode($json, JSON_PRETTY_PRINT) . '</pre>';
        ?>
    </div>

    <script>
        const allDataBtn = document.getElementById('allData');
        allDataBtn.addEventListener('click', getAllData);

        function getAllData(event)
        {
            event.preventDefault();

            result.innerHTML = 'Loading...';
            var dateValue = 'all';

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open('POST', 'api.php');
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.send('date=' + dateValue);
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200)
                {
                    result.innerHTML = this.responseText;
                }
            }
        }

        const form = document.getElementById('theForm');
        const result = document.getElementById('result');
        form.addEventListener('submit', logSubmit);

        function logSubmit(event)
        {
            event.preventDefault();

            result.innerHTML = 'Loading...';
            var dateValue = event.target['date'].value;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open('POST', 'api.php');
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.send('date=' + dateValue);
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200)
                {
                    result.innerHTML = this.responseText;
                }
            }
        }
    </script>

</body>
</html>
