<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <title>Experience Form Input</title>
</head>

<body>
    <div class="formbold-main-wrapper">
        <h1>Experiences</h1>
        <div class="formbold-form-wrapper">
            <form method="POST" action="{{ route('submit') }}" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="formbold-input-flex">
                    <div>
                        <input type="text" name="title" id="title" placeholder="PBKK" class="formbold-form-input">
                        <label for="title" class="formbold-form-label">Title</label>
                        @error('title')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <select name="employment_type" id="employment_type" class="formbold-form-input">
                            <option value="Contract">Contract</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Internship">Internship</option>
                        </select>
                        <label for="employment_type" class="formbold-form-label">Employment Type</label>
                        @error('employment_type')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <input type="text" name="company_name" id="company_name" placeholder="ITS" class="formbold-form-input">
                        <label for="company_name" class="formbold-form-label">Company Name</label>
                        @error('company_name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="location" id="location" placeholder="Surabaya" class="formbold-form-input">
                        <label for="location" class="formbold-form-label">Location</label>
                        @error('location')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <select name="location_type" id="location_type" class="formbold-form-input">
                            <option value="On-site">On-site</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Remote">Remote</option>
                        </select>
                        <label for="location_type" class="formbold-form-label">Location Type</label>
                        @error('location_type')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="formbold-textarea">
                        <textarea name="description" id="description" placeholder="A project ..." class="formbold-form-input"></textarea>
                        <label for="description" class="formbold-form-label">Description</label>
                        @error('description')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <input type="date" name="start_date" id="start_date" class="formbold-form-input">
                        <label for="start_date" class="formbold-form-label">Start Date</label>
                        @error('start_date')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="date" name="end_date" id="end_date" class="formbold-form-input">
                        <label for="end_date" class="formbold-form-label">End Date</label>
                        @error('end_date')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-file">
                    <div class="formbold-filename-wrapper">
                        <input type="file" name="documentation" id="documentation" class="formbold-form-input">
                        @error('documentation')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <input type="number" name="rating" id="rating" class="formbold-form-input" step="0.01">
                        <label for="rating" class="formbold-form-label">Rating</label>
                        @error('rating')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="formbold-btn">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>