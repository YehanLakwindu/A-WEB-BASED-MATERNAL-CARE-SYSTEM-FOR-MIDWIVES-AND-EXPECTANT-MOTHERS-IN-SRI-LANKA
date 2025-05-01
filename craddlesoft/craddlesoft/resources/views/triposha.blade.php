<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Triposh Calculation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            padding: 30px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        select, input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result, .message {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #e9f7fc;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Doctor's Triposh Calculation</h2>

        <!-- Mother Count Input -->
        <label for="mother_count">Enter Total Number of Mothers</label>
        <input type="number" id="mother_count" placeholder="Enter total number of mothers" />

        <!-- Triposh Count per Mother Input -->
        <label for="triposh_per_mother">Enter Number of Triposhes per Mother</label>
        <input type="number" id="triposh_per_mother" placeholder="Enter triposhes required per mother" />

        <!-- Calculate Button -->
        <button id="calculateBtn">Calculate Triposh Count</button>

        <!-- Display Results -->
        <div id="results" class="result" style="display:none;">
            <p><strong>Total Number of Mothers:</strong> <span id="motherCountDisplay"></span></p>
            <p><strong>Total Triposh Operations Needed:</strong> <span id="triposhCountDisplay"></span></p>
        </div>

        <!-- Request Message for Government -->
        <div id="message" class="message" style="display:none;">
            <h3>Request Message for Government</h3>
            <p><strong>Dear Government Officials,</strong></p>
            <p>We request assistance in processing the following number of mothers for health-related operations:</p>
            <p><strong>Total Mothers:</strong> <span id="motherCountMessage"></span></p>
            <p><strong>Total Triposh Operations:</strong> <span id="triposhCountMessage"></span></p>
            <p>We kindly request your support in the smooth processing of these operations.</p>
            <p><strong>Best regards,<br/>[Your Hospital Name]</strong></p>
        </div>
    </div>

    <script>
        document.getElementById('calculateBtn').addEventListener('click', function() {
            // Get values from the form
            var motherCount = parseInt(document.getElementById('mother_count').value);
            var triposhPerMother = parseInt(document.getElementById('triposh_per_mother').value);
            
            if (!motherCount || motherCount <= 0 || !triposhPerMother || triposhPerMother <= 0) {
                alert("Please enter valid values for both mother count and triposh count per mother!");
                return;
            }

            // Calculate total triposh operations
            var totalTriposhOperations = motherCount * triposhPerMother;

            // Show results
            document.getElementById('motherCountDisplay').innerText = motherCount;
            document.getElementById('triposhCountDisplay').innerText = totalTriposhOperations;

            document.getElementById('results').style.display = 'block';

            // Prepare government message
            document.getElementById('motherCountMessage').innerText = motherCount;
            document.getElementById('triposhCountMessage').innerText = totalTriposhOperations;

            document.getElementById('message').style.display = 'block';
        });
    </script>

</body>
</html>
