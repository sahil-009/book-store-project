<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book & Author Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen relative overflow-x-hidden">
    <!-- Background Pattern -->
    <div class="fixed inset-0 -z-10">
        <!-- Base gradient - softer tones -->
        <div class="absolute inset-0 bg-gradient-to-br from-stone-100 via-amber-50 to-orange-50"></div>
        
        <!-- Book pattern overlay -->
        <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23d97706&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <!-- Floating book icons - more subtle -->
        <div class="absolute top-20 left-10 text-6xl opacity-3 animate-float">📚</div>
        <div class="absolute top-40 right-20 text-5xl opacity-3 animate-float-delayed">📖</div>
        <div class="absolute bottom-32 left-1/4 text-7xl opacity-3 animate-float">✍️</div>
        <div class="absolute top-1/3 right-1/4 text-6xl opacity-3 animate-float-delayed">📝</div>
        <div class="absolute bottom-20 right-10 text-5xl opacity-3 animate-float">🖊️</div>
        
        <!-- Gradient overlay for depth -->
        <div class="absolute inset-0 bg-gradient-to-t from-white/40 via-transparent to-transparent"></div>
    </div>
    
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        .opacity-3 {
            opacity: 0.03;
        }
        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(-5deg); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float-delayed 8s ease-in-out infinite;
        }
    </style>
    
    
    <!-- Header -->
    <header style="background: linear-gradient(to right, #CB7115, #B86512, #CB7115);" class="shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="bg-white/15 backdrop-blur-sm p-3 rounded-2xl">
                        <span class="text-5xl">📚</span>
                    </div>
                    <div>
                        <h1 class="text-4xl font-black text-white drop-shadow-lg">Book Store</h1>
                        <p class="text-amber-100 mt-1 font-medium">Manage your authors and books with ease</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button onclick="openAuthorModal()" style="color: #CB7115; border-color: #CB7115;" class="bg-white hover:bg-orange-50 px-8 py-4 rounded-2xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 flex items-center gap-2 border">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Author
                    </button>
                    <button onclick="openBookModal()" style="background-color: #CB7115;" class="hover:opacity-90 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Book
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Authors Section -->
        <section class="mb-16">
            <div class="flex items-center gap-3 mb-8">
                <div style="background: linear-gradient(to bottom right, #CB7115, #B86512);" class="p-3 rounded-xl shadow-md">
                    <span class="text-3xl">👥</span>
                </div>
                <h2 class="text-3xl font-black text-gray-800">Authors</h2>
            </div>
            <div id="authors-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Authors will be loaded here -->
            </div>
        </section>

        <!-- Books Section -->
        <section>
            <div class="flex items-center gap-3 mb-8">
                <div style="background: linear-gradient(to bottom right, #CB7115, #B86512);" class="p-3 rounded-xl shadow-md">
                    <span class="text-3xl">📚</span>
                </div>
                <h2 class="text-3xl font-black text-gray-800">Books</h2>
            </div>
            <div id="books-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Books will be loaded here -->
            </div>
        </section>

    </main>

    <!-- Author Modal -->
    <div id="authorModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full transform transition-all animate-in">
            <div style="background: linear-gradient(to right, #CB7115, #B86512);" class="p-8 rounded-t-3xl">
                <h3 class="text-3xl font-black text-white drop-shadow-lg" id="authorModalTitle">Add Author</h3>
            </div>
            <form id="authorForm" class="p-8 space-y-5">
                <input type="hidden" id="authorId">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Name *</label>
                    <input type="text" id="authorName" required class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email *</label>
                    <input type="email" id="authorEmail" required class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Bio</label>
                    <textarea id="authorBio" rows="3" class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium"></textarea>
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="submit" style="background: linear-gradient(to right, #CB7115, #B86512);" class="flex-1 hover:opacity-90 text-white py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all">
                        Save Author
                    </button>
                    <button type="button" onclick="closeAuthorModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 py-4 rounded-xl font-bold transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Book Modal -->
    <div id="bookModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full transform transition-all">
            <div style="background: linear-gradient(to right, #CB7115, #B86512);" class="p-8 rounded-t-3xl">
                <h3 class="text-3xl font-black text-white drop-shadow-lg" id="bookModalTitle">Add Book</h3>
            </div>
            <form id="bookForm" class="p-8 space-y-5">
                <input type="hidden" id="bookId">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Title *</label>
                    <input type="text" id="bookTitle" required class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">ISBN *</label>
                    <input type="text" id="bookIsbn" required class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                    <textarea id="bookDescription" rows="3" class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Published Year *</label>
                    <input type="number" id="bookYear" required min="1000" max="2026" class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Author *</label>
                    <select id="bookAuthor" required class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-4 focus:ring-amber-300 focus:border-amber-500 transition-all font-medium">
                        <option value="">Select an author</option>
                    </select>
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="submit" style="background: linear-gradient(to right, #CB7115, #B86512);" class="flex-1 hover:opacity-90 text-white py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all">
                        Save Book
                    </button>
                    <button type="button" onclick="closeBookModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 py-4 rounded-xl font-bold transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const API_URL = 'http://127.0.0.1:8000/api';

        // Load data on page load
        document.addEventListener('DOMContentLoaded', () => {
            loadAuthors();
            loadBooks();
        });

        // Load Authors
        async function loadAuthors() {
            try {
                const response = await fetch(`${API_URL}/authors`);
                const authors = await response.json();
                const grid = document.getElementById('authors-grid');
                
                if (authors.length === 0) {
                    grid.innerHTML = '<div class="col-span-full text-center py-16"><div class="bg-white rounded-2xl p-12 shadow-lg border-2 border-dashed border-amber-300"><p class="text-gray-500 text-lg font-semibold mb-4">No authors yet</p><p class="text-gray-400">Click "Add Author" to create your first author!</p></div></div>';
                    return;
                }
                
                grid.innerHTML = authors.map(author => `
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-amber-100 hover:border-amber-300">
                        <div class="flex items-start justify-between mb-4">
                            <div style="background: linear-gradient(to bottom right, #CB7115, #B86512);" class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl shadow-lg">
                                👤
                            </div>
                            <div class="flex gap-2">
                                <button onclick="editAuthor(${author.id})" class="bg-amber-100 hover:bg-amber-200 text-amber-700 p-2 rounded-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button onclick="deleteAuthor(${author.id})" class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">${author.name}</h3>
                        <p class="text-amber-600 font-semibold text-sm mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            ${author.email}
                        </p>
                        ${author.bio ? `<p class="text-gray-600 text-sm mb-4 line-clamp-2">${author.bio}</p>` : ''}
                        <div class="flex items-center gap-2 bg-gradient-to-r from-amber-50 to-orange-50 px-4 py-2 rounded-xl border border-amber-200">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="text-amber-700 font-bold">${author.books_count} ${author.books_count === 1 ? 'book' : 'books'}</span>
                        </div>
                    </div>
                `).join('');
            } catch (error) {
                console.error('Error loading authors:', error);
            }
        }

        // Load Books
        async function loadBooks() {
            try {
                const response = await fetch(`${API_URL}/books`);
                const books = await response.json();
                const grid = document.getElementById('books-grid');
                
                if (books.length === 0) {
                    grid.innerHTML = '<div class="col-span-full text-center py-16"><div class="bg-white rounded-2xl p-12 shadow-lg border-2 border-dashed border-amber-300"><p class="text-gray-500 text-lg font-semibold mb-4">No books yet</p><p class="text-gray-400">Click "Add Book" to create your first book!</p></div></div>';
                    return;
                }
                
                grid.innerHTML = books.map(book => `
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-amber-100 hover:border-amber-300">
                        <div class="flex items-start justify-between mb-4">
                            <div style="background: linear-gradient(to bottom right, #CB7115, #B86512);" class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl shadow-lg">
                                📖
                            </div>
                            <div class="flex gap-2">
                                <button onclick="editBook(${book.id})" class="bg-amber-100 hover:bg-amber-200 text-amber-700 p-2 rounded-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button onclick="deleteBook(${book.id})" class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">${book.title}</h3>
                        <p class="text-amber-600 font-semibold text-sm mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            by ${book.author.name}
                        </p>
                        <p class="text-gray-500 text-xs font-mono mb-3 bg-gray-50 px-3 py-1 rounded-lg inline-block">ISBN: ${book.isbn}</p>
                        ${book.description ? `<p class="text-gray-600 text-sm mb-4 line-clamp-2">${book.description}</p>` : ''}
                        <div class="flex items-center gap-2 bg-gradient-to-r from-amber-50 to-orange-50 px-4 py-2 rounded-xl border border-amber-200">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-amber-700 font-bold">${book.published_year}</span>
                        </div>
                    </div>
                `).join('');
            } catch (error) {
                console.error('Error loading books:', error);
            }
        }

        // Author Modal Functions
        function openAuthorModal() {
            document.getElementById('authorModal').classList.remove('hidden');
            document.getElementById('authorModalTitle').textContent = 'Add Author';
            document.getElementById('authorForm').reset();
            document.getElementById('authorId').value = '';
        }

        function closeAuthorModal() {
            document.getElementById('authorModal').classList.add('hidden');
        }

        async function editAuthor(id) {
            try {
                const response = await fetch(`${API_URL}/authors/${id}`);
                const author = await response.json();
                
                document.getElementById('authorId').value = author.id;
                document.getElementById('authorName').value = author.name;
                document.getElementById('authorEmail').value = author.email;
                document.getElementById('authorBio').value = author.bio || '';
                document.getElementById('authorModalTitle').textContent = 'Edit Author';
                document.getElementById('authorModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error loading author:', error);
            }
        }

        async function deleteAuthor(id) {
            if (!confirm('Are you sure you want to delete this author? All their books will also be deleted.')) return;
            
            try {
                await fetch(`${API_URL}/authors/${id}`, { method: 'DELETE' });
                loadAuthors();
                loadBooks();
            } catch (error) {
                console.error('Error deleting author:', error);
            }
        }

        // Book Modal Functions
        async function openBookModal() {
            // Load authors for dropdown
            const response = await fetch(`${API_URL}/authors`);
            const authors = await response.json();
            const select = document.getElementById('bookAuthor');
            select.innerHTML = '<option value="">Select an author</option>' + 
                authors.map(a => `<option value="${a.id}">${a.name}</option>`).join('');
            
            document.getElementById('bookModal').classList.remove('hidden');
            document.getElementById('bookModalTitle').textContent = 'Add Book';
            document.getElementById('bookForm').reset();
            document.getElementById('bookId').value = '';
        }

        function closeBookModal() {
            document.getElementById('bookModal').classList.add('hidden');
        }

        async function editBook(id) {
            try {
                // Load authors for dropdown
                const authorsResponse = await fetch(`${API_URL}/authors`);
                const authors = await authorsResponse.json();
                const select = document.getElementById('bookAuthor');
                select.innerHTML = '<option value="">Select an author</option>' + 
                    authors.map(a => `<option value="${a.id}">${a.name}</option>`).join('');
                
                // Load book data
                const response = await fetch(`${API_URL}/books/${id}`);
                const book = await response.json();
                
                document.getElementById('bookId').value = book.id;
                document.getElementById('bookTitle').value = book.title;
                document.getElementById('bookIsbn').value = book.isbn;
                document.getElementById('bookDescription').value = book.description || '';
                document.getElementById('bookYear').value = book.published_year;
                document.getElementById('bookAuthor').value = book.author_id;
                document.getElementById('bookModalTitle').textContent = 'Edit Book';
                document.getElementById('bookModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error loading book:', error);
            }
        }

        async function deleteBook(id) {
            if (!confirm('Are you sure you want to delete this book?')) return;
            
            try {
                await fetch(`${API_URL}/books/${id}`, { method: 'DELETE' });
                loadBooks();
            } catch (error) {
                console.error('Error deleting book:', error);
            }
        }

        // Form Submissions
        document.getElementById('authorForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const id = document.getElementById('authorId').value;
            const data = {
                name: document.getElementById('authorName').value,
                email: document.getElementById('authorEmail').value,
                bio: document.getElementById('authorBio').value
            };
            
            try {
                const url = id ? `${API_URL}/authors/${id}` : `${API_URL}/authors`;
                const method = id ? 'PUT' : 'POST';
                
                await fetch(url, {
                    method,
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                
                closeAuthorModal();
                loadAuthors();
            } catch (error) {
                console.error('Error saving author:', error);
                alert('Error saving author. Please check the console.');
            }
        });

        document.getElementById('bookForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const id = document.getElementById('bookId').value;
            const data = {
                title: document.getElementById('bookTitle').value,
                isbn: document.getElementById('bookIsbn').value,
                description: document.getElementById('bookDescription').value,
                published_year: parseInt(document.getElementById('bookYear').value),
                author_id: parseInt(document.getElementById('bookAuthor').value)
            };
            
            try {
                const url = id ? `${API_URL}/books/${id}` : `${API_URL}/books`;
                const method = id ? 'PUT' : 'POST';
                
                await fetch(url, {
                    method,
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                
                closeBookModal();
                loadBooks();
            } catch (error) {
                console.error('Error saving book:', error);
                alert('Error saving book. Please check the console.');
            }
        });
    </script>

</body>
</html>
