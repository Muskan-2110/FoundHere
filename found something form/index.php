<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form</title>
</head>

<body>
    <header>
        <div>
                <img src="logo.png" alt="">
            <div class="text">Found<span>HERE</span>
            </div>
        </div>
    </header>
    <form action="config.php" method="post">
        <h1>Product Registration Form</h1>

        <hr />

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="FoundHERE" required minlength="2" maxlength="99"
                pattern="^[a-zA-Z][a-zA-Z\s]*$" title="Name should not contain any numbers or special characters." />
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="FoundHERE@example.com" required
                pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"
                title="A valid email is required." />
        </div>

        <div>
            <label for="date">Date Found</label>
            <input type="date" name="date" id="date" required />
        </div>

        <div>
            <label for="product">Select Document</label>
            <select id="product" name="product" required>
                <option disabled selected>Select</option>
                <option value="Aadhar Card">Aadhar Card</option>
                <option value="Voter ID Card">Voter ID Card</option>
                <option value="Pass Port">Pass Port</option>
                <option value="Driving Licence">Driving Licence</option>
                <option value="Marksheet">Marksheet</option>
                <option value="Certificate">Certificate</option>
                <option value="Identity Card">School/University Identity Card</option>
                <option value="Pan Card">Pan Card</option>

            </select>
        </div>

        <div>
            <label for="serial">Serial Number</label>
            <input type="text" name="s_no" id="serial" placeholder="Enter the unique code" required
                title="Please enter 16 digits containing only numbers and letters. Every 4 digits separated with dashes." />
        </div>


        <div>
            <input type="checkbox" name="terms" id="terms" checked required />
            <label for="terms">I agree to the Terms & Conditions</label>
        </div>

        <button id="submit" name="sub" type="submit">Submit</button>
    </form>
</body>
<!-- <script></script> -->
<script src="index.js"></script>

</html>