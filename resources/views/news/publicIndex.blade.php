<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Lengkap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#2563eb',
                            800: '#1e40af',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Semua Berita Populer</h1>
            <div class="w-20 h-1 bg-primary-600 rounded-full"></div>
        </div>

        @forelse ($news as $item)
            <article class="mb-12 pb-12 border-b border-gray-200 last:border-0 last:mb-0 last:pb-0">
                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="md:w-1/3">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/300' }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-48 md:h-full object-cover rounded-lg">
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span>{{ $item->created_at->format('d F Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>Kategori: {{ $item->category ?? 'Umum' }}</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3 leading-tight hover:text-primary-600 transition-colors">
                            <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                        </h2>
                        <p class="text-gray-700 mb-4">{{ $item->excerpt ?? Str::limit($item->content, 200) }}</p>
                    </div>
                </div>
                <!-- Tombol Komentar -->
                <div class="mt-4">
                    <button onclick="toggleCommentForm({{ $item->id }}, '{{ $item->title }}')" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">Komentar</button>
                    <!-- Form Komentar (Awalnya Tersembunyi) -->
                    <div id="comment-form-{{ $item->id }}" class="hidden mt-4">
                        <input type="text" id="name-{{ $item->id }}" placeholder="Nama" class="w-full p-2 mb-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="class-{{ $item->id }}" placeholder="Kelas" class="w-full p-2 mb-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <textarea id="comment-{{ $item->id }}" placeholder="Tulis komentar..." class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
                        <button onclick="addComment({{ $item->id }}, '{{ $item->title }}')" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">Kirim Komentar</button>
                    </div>
                </div>
            </article>
        @empty
            <div class="py-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada berita saat ini</h3>
                <p class="mt-1 text-gray-500">Silakan kembali lagi nanti untuk melihat berita terbaru.</p>
            </div>
        @endforelse

        @if($news->count() > 0)
            <div class="mt-8">
                {{ $news->links() }}
            </div>
        @endif

        <!-- Tempat Menampilkan Semua Komentar -->
        <div id="all-comments" class="mt-8">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Komentar Pengunjung</h3>
            <div id="comments-list" class="space-y-3"></div>
        </div>
    </div>

    <!-- JavaScript untuk Menangani Komentar -->
    <script>
        // Load komentar dari localStorage saat halaman dimuat
        document.addEventListener('DOMContentLoaded', loadComments);

        // Fungsi untuk toggle form komentar
        function toggleCommentForm(newsId, newsTitle) {
            const form = document.getElementById(`comment-form-${newsId}`);
            form.classList.toggle('hidden');
        }

        // Fungsi untuk menambahkan komentar
        function addComment(newsId, newsTitle) {
            const name = document.getElementById(`name-${newsId}`).value;
            const kelas = document.getElementById(`class-${newsId}`).value;
            const comment = document.getElementById(`comment-${newsId}`).value;

            if (!name || !kelas || !comment) {
                alert("Harap isi semua field (Nama, Kelas, dan Komentar)!");
                return;
            }

            // Buat elemen komentar baru
            const commentDiv = document.createElement('div');
            commentDiv.classList.add('p-3', 'bg-gray-100', 'rounded-lg', 'relative');
            commentDiv.innerHTML = `
                <p><strong class="font-bold">Mengomentari Berita:</strong> <span class="text-gray-600">${newsTitle}</span></p>
                <p><strong class="font-bold">Nama:</strong> <span class="text-gray-600">${name}</span></p>
                <p><strong class="font-bold">Kelas:</strong> <span class="text-gray-600">${kelas}</span></p>
                <p class="text-gray-600">${comment}</p>
                <button onclick="deleteComment(this, '${newsTitle}', '${name}', '${kelas}', '${comment}')" class="absolute top-2 right-2 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
            `;

            // Tambahkan komentar ke daftar komentar global
            const commentsList = document.getElementById('comments-list');
            commentsList.appendChild(commentDiv);

            // Simpan komentar ke localStorage
            saveComment({ newsTitle, name, kelas, comment });

            // Kosongkan form dan sembunyikan
            document.getElementById(`name-${newsId}`).value = '';
            document.getElementById(`class-${newsId}`).value = '';
            document.getElementById(`comment-${newsId}`).value = '';
            document.getElementById(`comment-form-${newsId}`).classList.add('hidden');
        }

        // Fungsi untuk menghapus komentar
        function deleteComment(button, newsTitle, name, kelas, commentText) {
            const commentDiv = button.parentElement;
            const commentsList = document.getElementById('comments-list');
            commentsList.removeChild(commentDiv);

            // Perbarui localStorage dengan menghapus komentar yang sesuai
            let comments = JSON.parse(localStorage.getItem('comments') || '[]');
            const index = comments.findIndex(c => 
                c.newsTitle === newsTitle && 
                c.name === name && 
                c.kelas === kelas && 
                c.comment === commentText
            );
            if (index > -1) {
                comments.splice(index, 1);
                localStorage.setItem('comments', JSON.stringify(comments));
            }
        }

        // Fungsi untuk menyimpan komentar ke localStorage
        function saveComment(comment) {
            let comments = JSON.parse(localStorage.getItem('comments') || '[]');
            comments.push(comment);
            localStorage.setItem('comments', JSON.stringify(comments));
        }

        // Fungsi untuk memuat komentar dari localStorage
        function loadComments() {
            let comments = JSON.parse(localStorage.getItem('comments') || '[]');
            const commentsList = document.getElementById('comments-list');
            comments.forEach(comment => {
                const commentDiv = document.createElement('div');
                commentDiv.classList.add('p-3', 'bg-gray-100', 'rounded-lg', 'relative');
                commentDiv.innerHTML = `
                    <p><strong class="font-bold">Berita:</strong> <span class="text-gray-600">${comment.newsTitle}</span></p>
                    <p><strong class="font-bold">Nama:</strong> <span class="text-gray-600">${comment.name}</span></p>
                    <p><strong class="font-bold">Kelas:</strong> <span class="text-gray-600">${comment.kelas}</span></p>
                    <p class="text-gray-600">${comment.comment}</p>
                    <button onclick="deleteComment(this, '${comment.newsTitle}', '${comment.name}', '${comment.kelas}', '${comment.comment}')" class="absolute top-2 right-2 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                `;
                commentsList.appendChild(commentDiv);
            });
        }
    </script>
</body>
</html>