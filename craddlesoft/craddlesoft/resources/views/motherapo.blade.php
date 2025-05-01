<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment - CraddleSoft</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9fbfc;
        }

        .container {
            max-width: 600px;
        }

        .btn-primary {
            background-color: #4c6ef5;
            border-color: #4c6ef5;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3749a3;
            border-color: #3749a3;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }

        footer {
            background-color: #374151;
            color: #f3f4f6;
        }

        footer p {
            margin: 0;
        }

        .success-msg, .error-msg {
            display: none;
        }

        .success-msg.active, .error-msg.active {
            display: block;
        }
    </style>
</head>
<body>

    <!-- Appointment Form Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center text-primary">Create an Appointment</h2>
        <div class="p-4 bg-white shadow-sm card">
            <form id="appointmentForm">
                <div class="mb-3">
                    <label for="title" class="form-label">Appointment Details</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter details (e.g., Mother’s Name)" required>
                </div>
                <div class="mb-3">
                    <label for="start" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start" name="start" required>
                </div>
                <div class="mb-3">
                    <label for="end" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end" name="end" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Appointment</button>
            </form>

            <!-- Success/Failure Messages -->
            <div id="successMessage" class="mt-3 alert alert-success success-msg">
                Appointment created successfully!
            </div>
            <div id="errorMessage" class="mt-3 alert alert-danger error-msg">
                There was an error saving the appointment.
            </div>
        </div>
    </div>

    <!-- Redirect to Calendar Section -->
    @role('admin')
    <div class="d-flex justify-content-center">
        <a href="{{ route('fullcalendar') }}" class="px-4 py-2 shadow-sm btn btn-outline-primary rounded-pill">
            <i class="bi bi-calendar3"></i> View Appointments Calendar
        </a>
    </div>
    @endrole


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Auto-set end date to match start date
        $('#start').on('change', function () {
            $('#end').val($(this).val());
        });

        // Handle Form Submission
        $('#appointmentForm').on('submit', function (e) {
            e.preventDefault();

            const title = $('#title').val();
            const start = $('#start').val();
            const end = $('#end').val();

            if (start !== end) {
                $('#errorMessage').addClass('active').text('End date must match start date.');
                return;
            }

            // Clear error message
            $('#errorMessage').removeClass('active');

            // Simulate AJAX request
            $.ajax({
                url: "{{ url('/events') }}",
                type: "POST",
                data: {
                    title,
                    start,
                    end,
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    $('#successMessage').addClass('active').text("Appointment created successfully!");
                    $('#appointmentForm')[0].reset();
                },
                error: function () {
                    $('#errorMessage').addClass('active').text('There was an error saving the appointment.');
                }
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
