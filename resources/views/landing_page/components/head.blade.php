@php
    $pageTitles = [
        'login' => 'Login Page',
        'register' => 'Register Page',
        'forgetPassword' => 'Forget Password Page',
        'changePassword' => 'Change Password Page',
        'verified' => 'Terverifikasi',
    ];

    $currentUrl = request()->segment(1); // Ambil bagian pertama dari URL saat ini

    $title = $pageTitles[$currentUrl] ?? 'Halaman Utama'; // Gunakan judul default jika tidak ada yang cocok
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('landing_page') }}/img/logo.png" />
    <link href="{{ asset('landing_page') }}/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landing_page') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('landing_page') }}/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
@if (
    $currentUrl == 'verified' ||
        $currentUrl == 'login' ||
        $currentUrl == 'register' ||
        $currentUrl == 'forgetPassword' ||
        $currentUrl == 'changePassword' ||
        $currentUrl == 'daftarLomba')

    <body>
    @else

        <body style="background-color: #f2f2f2;">
@endif
