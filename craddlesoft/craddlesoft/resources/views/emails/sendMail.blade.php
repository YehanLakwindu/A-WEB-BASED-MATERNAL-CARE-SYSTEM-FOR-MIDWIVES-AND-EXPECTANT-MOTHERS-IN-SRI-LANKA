<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #f0f4f8, #d9e7ff);
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 15px;
            border: none;
        }
        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-control, .form-select {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #0069d9;
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="shadow-lg card">
                    <div class="py-3 text-center text-white card-header bg-primary">
                        <h4 class="mb-0">Send Email</h4>
                    </div>
                    <div class="p-4 card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('mail.send') }}" method="POST">
                            @csrf
                            <!-- Recipient Email -->
                            <div class="mb-4">
                                <label for="recipient_email" class="form-label fw-bold">Recipient Email</label>
                                <input type="email" name="recipient_email" id="recipient_email" 
                                       class="form-control @error('recipient_email') is-invalid @enderror" 
                                       placeholder="example@domain.com" value="{{ old('recipient_email') }}">
                                @error('recipient_email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Message Type -->
                            <div class="mb-4">
                                <label for="message_type" class="form-label fw-bold">Message Type</label>
                                <select name="message_type" id="message_type" 
                                        class="form-select @error('message_type') is-invalid @enderror">
                                    <option value="" disabled selected>Select Message Type</option>
                                    <option value="home_visit" {{ old('message_type') == 'home_visit' ? 'selected' : '' }}>Home Visit</option>
                                    <option value="clinic_visit" {{ old('message_type') == 'clinic_visit' ? 'selected' : '' }}>Clinic Visit</option>
                                    <option value="vaccination_baby" {{ old('message_type') == 'vaccination_baby' ? 'selected' : '' }}>Vaccination (Baby)</option>
                                    <option value="vaccination_mother" {{ old('message_type') == 'vaccination_mother' ? 'selected' : '' }}>Vaccination (Mother)</option>
                                    <option value="triposha_distribution" {{ old('message_type') == 'triposha_distribution' ? 'selected' : '' }}>Triposha Distribution</option>
                                </select>
                                @error('message_type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Date Field -->
                            <div class="mb-4">
                                <label for="date" class="form-label fw-bold">Date</label>
                                <input type="date" name="date" id="date" 
                                       class="form-control @error('date') is-invalid @enderror" 
                                       value="{{ old('date') }}">
                                @error('date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Time Field -->
                            <div class="mb-4">
                                <label for="time" class="form-label fw-bold">Time</label>
                                <input type="time" name="time" id="time" 
                                       class="form-control @error('time') is-invalid @enderror" 
                                       value="{{ old('time') }}">
                                @error('time')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Custom Message -->
                            <div class="mb-4">
                                <label for="custom_message" class="form-label fw-bold">Custom Message (Optional)</label>
                                <textarea name="custom_message" id="custom_message" 
                                          rows="4" 
                                          class="form-control @error('custom_message') is-invalid @enderror"
                                          placeholder="Add any additional message here">{{ old('custom_message') }}</textarea>
                                @error('custom_message')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
