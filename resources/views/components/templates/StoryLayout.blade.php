<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            padding: 0.5rem;
            color: #222;
            background-color: #ececec;
            font-family: "Montserrat", sans-serif;
        }

        nav.navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #fff;
            padding: 0.5rem 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            border-radius: 12px;
        }

        nav.navbar.highlight {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
        }

        .nav-link {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .wrapper {
            width: 90%;
            padding: 2rem 0;
            margin: auto;
            line-height: 1.6;
        }

        .content img {
            width: 100%;
            object-fit: cover;
            border-radius: 0.3rem;
        }

        .content:nth-child(even) {
            flex-direction: row-reverse;
        }

        @media (max-width: 767px) {
            .content {
                flex-direction: column !important;
            }
        }
    </style>
</head>

<body>
    {{ $slot }}
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    const pageTop = document.getElementById('page-top')
    const nav = document.querySelector('nav')
    const navHighlightClass = 'highlight'

    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
            nav.classList.remove(navHighlightClass)
        } else {
            nav.classList.add(navHighlightClass)
        }
    })

    window.onload = () => {
        observer.observe(pageTop)
    }
</script>
</body>

</html>
