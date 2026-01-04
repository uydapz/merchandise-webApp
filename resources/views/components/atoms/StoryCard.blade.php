<style>
    .blog-span {
            font-size: 12px;
        }

        .card-custom {
            border-radius: 20px !important;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-custom:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2) !important;
        }

        .card-custom img {
            border-bottom: 5px solid #071952 !important;
        }

        .card-header-custom {
            background-color: #071952 !important;
            color: #fff !important;
            font-size: 1.25rem;
            font-weight: bold;
            text-align: center;
            padding: 1rem;
        }

        .card-body-custom {
            padding: 1.5rem;
            text-align: center;
        }

        .card-footer-custom {
            background-color: #f8f9fa !important;
            text-align: center;
            padding: 1rem;
        }

        .btn-custom {
            background-color: #071952 !important;
            color: #fff !important;
            border: none;
            transition: background-color 0.2s;
        }

        .btn-custom:hover {
            background-color: #071952 !important;
        }

        .card-meta {
            font-size: 0.9rem;
            color: #666 !important;
            margin-bottom: 1rem;
        }

        .card-meta span {
            margin-right: 1rem;
        }

        .card-meta .author {
            font-weight: bold;
        }

        .card-meta .date,
        .card-meta .comments {
            font-style: italic;
        }
</style>
<div class="card card-custom mb-4">
    <div class="card-header card-header-custom" style="text-transform: uppercase;">
        {{ $marsyi->title }}
    </div>
    <div class="card-body card-body-custom">
        <img src="{{ url('/storage/story/' . $marsyi->image) }}" alt="Gambar Artikel"
            class="img-fluid mb-3">
        <div class="card-meta">
            <span class="author blog-span"><i class="fa fa-feather"></i> {{ $marsyi->user->username }}</span></a>
            <span class="date blog-span"><i class="fa fa-calendar-days"></i> {{ \Carbon\Carbon::parse($marsyi->published_at)->format('M d, Y') }}</span>
            <br>
        </div>
        <p class="card-text">{{ $marsyi->excerpt }}</p>
    </div>
    <div class="card-footer card-footer-custom">
        <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#story-{{ $marsyi->slug }}">
            Gaskuy!
          </button>
    </div>
</div>