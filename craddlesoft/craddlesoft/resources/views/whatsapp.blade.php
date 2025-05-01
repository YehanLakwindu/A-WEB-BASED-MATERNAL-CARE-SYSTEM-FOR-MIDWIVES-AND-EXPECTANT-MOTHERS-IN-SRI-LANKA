<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send WhatsApp Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow card">
                    <div class="text-center text-white card-header bg-success">
                        <h4>Send WhatsApp Message</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('whatsapp.post') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Mother's Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Mother's Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Mother's Phone Number</label>
                                <input type="text" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="+94771234567" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message_type" class="form-label">Message Type</label>
                                <select name="message_type" id="message_type"
                                    class="form-select @error('message_type') is-invalid @enderror">
                                    <option value="">Select Message Type</option>
                                    <option value="home_visit"
                                        {{ old('message_type') == 'home_visit' ? 'selected' : '' }}>Home Visit</option>
                                    <option value="clinic_visit"
                                        {{ old('message_type') == 'clinic_visit' ? 'selected' : '' }}>Clinic Visit</option>
                                    <option value="vaccination_baby"
                                        {{ old('message_type') == 'vaccination_baby' ? 'selected' : '' }}>Vaccination
                                        (Baby)</option>
                                    <option value="vaccination_mother"
                                        {{ old('message_type') == 'vaccination_mother' ? 'selected' : '' }}>Vaccination
                                        (Mother)</option>
                                    <option value="triposha_distribution"
                                        {{ old('message_type') == 'triposha_distribution' ? 'selected' : '' }}>Triposha
                                        Distribution</option>
                                </select>
                                @error('message_type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                                @error('date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" name="time" id="time"
                                    class="form-control @error('time') is-invalid @enderror" value="{{ old('time') }}">
                                @error('time')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
