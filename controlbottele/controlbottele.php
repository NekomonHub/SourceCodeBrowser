<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🤖 Dark Messenger - Telegram Bot</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --main-bg: #0a0a0a;
            --card-bg: #111111;
            --accent-red: #ff0038;
            --accent-blue: #0088cc;
            --accent-green: #00cc88;
            --accent-purple: #8800cc;
            --text-primary: #ffffff;
            --text-secondary: #cccccc;
            --border-color: #333333;
            --success: #00ff88;
            --error: #ff3860;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', 'Monaco', monospace;
        }

        body {
            background: var(--main-bg);
            color: var(--text-primary);
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(255, 0, 56, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(0, 136, 204, 0.1) 0%, transparent 50%);
            overflow-x: hidden;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-red), transparent);
        }

        .logo {
            font-size: 3rem;
            margin-bottom: 10px;
            text-shadow: 0 0 20px var(--accent-red);
            animation: glow 2s ease-in-out infinite alternate;
        }

        .title {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--accent-red);
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-red), var(--accent-purple), var(--accent-blue));
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-secondary);
            font-weight: bold;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: rgba(0, 0, 0, 0.3);
            color: var(--text-primary);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--accent-red);
            box-shadow: 0 0 0 3px rgba(255, 0, 56, 0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn {
            background: linear-gradient(135deg, var(--accent-red), var(--accent-purple));
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            padding: 15px;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 0, 56, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .message-type-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .message-type-btn {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .message-type-btn:hover {
            border-color: var(--accent-red);
            transform: translateY(-3px);
        }

        .message-type-btn.active {
            border-color: var(--accent-red);
            background: rgba(255, 0, 56, 0.1);
            box-shadow: 0 0 15px rgba(255, 0, 56, 0.3);
        }

        .message-type-btn i {
            font-size: 24px;
            margin-bottom: 10px;
            display: block;
        }

        .result {
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
            display: none;
        }

        .success {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid var(--success);
            color: var(--success);
        }

        .error {
            background: rgba(255, 56, 96, 0.1);
            border: 1px solid var(--error);
            color: var(--error);
        }

        .hidden {
            display: none;
        }

        .terminal {
            background: #000;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 15px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            color: var(--success);
            height: 200px;
            overflow-y: auto;
            margin-top: 20px;
        }

        .terminal-line {
            margin-bottom: 5px;
        }

        .terminal-prompt {
            color: var(--accent-red);
        }

        .file-preview {
            margin-top: 10px;
            max-width: 200px;
            max-height: 200px;
            display: none;
            border-radius: 6px;
            border: 1px solid var(--border-color);
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: var(--text-secondary);
            font-size: 0.9rem;
            border-top: 1px solid var(--border-color);
        }

        .help-section {
            margin-top: 20px;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            border-left: 3px solid var(--accent-blue);
        }

        .test-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .test-btn {
            padding: 8px 15px;
            background: rgba(0, 136, 204, 0.2);
            border: 1px solid var(--accent-blue);
            border-radius: 4px;
            color: var(--accent-blue);
            cursor: pointer;
            font-size: 12px;
        }

        .test-btn:hover {
            background: rgba(0, 136, 204, 0.3);
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 10px var(--accent-red);
            }
            to {
                text-shadow: 0 0 20px var(--accent-red), 0 0 30px var(--accent-red);
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .title {
                font-size: 1.5rem;
            }
            
            .message-type-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🤖</div>
            <h1 class="title">DARK MESSENGER</h1>
            <p class="subtitle">Telegram Bot Control Panel</p>
        </div>

        <div class="card">
            <h2><i class="fas fa-cogs"></i> Konfigurasi Bot</h2>
            <div class="form-group">
                <label for="botToken"><i class="fas fa-key"></i> Bot Token</label>
                <input type="password" id="botToken" placeholder="Masukkan token bot Telegram Anda">
                <small style="color: var(--text-secondary);">Dapatkan dari @BotFather di Telegram</small>
            </div>
            
            <div class="test-buttons">
                <button class="test-btn" id="testTokenBtn">
                    <i class="fas fa-check"></i> Test Token
                </button>
                <button class="test-btn" id="viewTokenBtn">
                    <i class="fas fa-eye"></i> Lihat Token
                </button>
            </div>

            <div class="form-group">
                <label for="chatId"><i class="fas fa-user-secret"></i> Target Chat ID</label>
                <input type="text" id="chatId" placeholder="Masukkan Chat ID target">
                <small style="color: var(--text-secondary);">Gunakan @userinfobot untuk mendapatkan Chat ID</small>
            </div>

            <div class="help-section">
                <h3><i class="fas fa-question-circle"></i> Cara Menggunakan:</h3>
                <p>1. Buat bot di @BotFather dan dapatkan token</p>
                <p>2. Add bot ke chat/group target</p>
                <p>3. Kirim pesan <code>/start</code> ke bot untuk mengaktifkannya</p>
                <p>4. Dapatkan Chat ID menggunakan @userinfobot</p>
                <p>5. Masukkan token dan Chat ID di atas</p>
            </div>
        </div>

        <div class="card">
            <h2><i class="fas fa-paper-plane"></i> Jenis Pesan</h2>
            <div class="message-type-grid">
                <div class="message-type-btn active" data-type="text">
                    <i class="fas fa-font"></i>
                    <span>Teks</span>
                </div>
                <div class="message-type-btn" data-type="image">
                    <i class="fas fa-image"></i>
                    <span>Gambar</span>
                </div>
                <div class="message-type-btn" data-type="file">
                    <i class="fas fa-file"></i>
                    <span>File</span>
                </div>
                <div class="message-type-btn" data-type="sticker">
                    <i class="fas fa-smile"></i>
                    <span>Sticker</span>
                </div>
            </div>

            <div id="textContent" class="message-content">
                <div class="form-group">
                    <label for="messageText"><i class="fas fa-comment"></i> Pesan Teks</label>
                    <textarea id="messageText" placeholder="Tulis pesan yang ingin dikirim...">Hello! This is a test message from Dark Messenger 🤖</textarea>
                </div>
            </div>

            <div id="imageContent" class="message-content hidden">
                <div class="form-group">
                    <label for="imageUrl"><i class="fas fa-link"></i> URL Gambar</label>
                    <input type="text" id="imageUrl" placeholder="https://example.com/image.jpg" value="https://via.placeholder.com/500x300/0088cc/ffffff?text=Test+Image">
                    <small>Gunakan URL gambar yang dapat diakses publik</small>
                </div>
                <div class="form-group">
                    <label for="imageCaption"><i class="fas fa-comment"></i> Keterangan Gambar (opsional)</label>
                    <textarea id="imageCaption" placeholder="Keterangan untuk gambar...">Ini adalah gambar test dari Dark Messenger</textarea>
                </div>
                <img id="imagePreview" class="file-preview" src="" alt="Preview Gambar">
            </div>

            <div id="fileContent" class="message-content hidden">
                <div class="form-group">
                    <label for="fileUrl"><i class="fas fa-link"></i> URL File</label>
                    <input type="text" id="fileUrl" placeholder="https://example.com/file.pdf" value="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf">
                    <small>Gunakan URL file yang dapat diakses publik</small>
                </div>
                <div class="form-group">
                    <label for="fileCaption"><i class="fas fa-comment"></i> Keterangan File (opsional)</label>
                    <textarea id="fileCaption" placeholder="Keterangan untuk file...">Ini adalah file test dari Dark Messenger</textarea>
                </div>
            </div>

            <div id="stickerContent" class="message-content hidden">
                <div class="form-group">
                    <label for="stickerId"><i class="fas fa-sticky-note"></i> Sticker ID</label>
                    <input type="text" id="stickerId" placeholder="Masukkan ID sticker (contoh: CAACAgIAAxkBAAIB...)">
                    <small>Gunakan @idstickerbot untuk mendapatkan ID sticker</small>
                </div>
            </div>

            <button id="sendButton" class="btn">
                <i class="fas fa-paper-plane"></i> KIRIM PESAN
            </button>

            <div id="result" class="result"></div>

            <div class="terminal">
                <div class="terminal-line"><span class="terminal-prompt">$</span> Sistem siap...</div>
                <div class="terminal-line"><span class="terminal-prompt">$</span> Masukkan token bot dan chat ID</div>
                <div class="terminal-line"><span class="terminal-prompt">$</span> Klik "Test Token" untuk memverifikasi</div>
            </div>
        </div>

        <div class="card">
            <h2><i class="fas fa-bug"></i> Troubleshooting Error "Bad Request"</h2>
            <div class="help-section">
                <h3><i class="fas fa-exclamation-triangle"></i> Penyebab "Bad Request":</h3>
                <p>1. <strong>Chat ID salah</strong> - Pastikan format angka benar</p>
                <p>2. <strong>Bot belum di-add</strong> - Bot harus diadd ke chat terlebih dahulu</p>
                <p>3. <strong>Sticker ID invalid</strong> - Gunakan @idstickerbot untuk ID yang valid</p>
                <p>4. <strong>URL tidak valid</strong> - Pastikan URL gambar/file dapat diakses</p>
                <p>5. <strong>Pesan terlalu panjang</strong> - Telegram membatasi 4096 karakter</p>
                
                <h3 style="margin-top: 15px;"><i class="fas fa-wrench"></i> Solusi:</h3>
                <p>1. Gunakan @userinfobot untuk mendapatkan Chat ID yang benar</p>
                <p>2. Pastikan bot sudah di-add ke chat/group target</p>
                <p>3. Test dengan mengirim pesan teks sederhana terlebih dahulu</p>
                <p>4. Gunakan URL yang benar-benar dapat diakses publik</p>
                <p>5. Untuk sticker, pastikan ID-nya valid</p>
            </div>
        </div>

        <div class="footer">
            <p>⚠️ Gunakan dengan bijak. Penulis tidak bertanggung jawab atas penyalahgunaan tool ini.</p>
            <p>© 2024 Dark Messenger - Telegram Bot Interface</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const messageTypeBtns = document.querySelectorAll('.message-type-btn');
            const messageContents = document.querySelectorAll('.message-content');
            const sendButton = document.getElementById('sendButton');
            const resultDiv = document.getElementById('result');
            const terminal = document.querySelector('.terminal');
            const imageUrlInput = document.getElementById('imageUrl');
            const imagePreview = document.getElementById('imagePreview');
            const botTokenInput = document.getElementById('botToken');
            const chatIdInput = document.getElementById('chatId');
            const testTokenBtn = document.getElementById('testTokenBtn');
            const viewTokenBtn = document.getElementById('viewTokenBtn');

            // Set active message type
            let activeMessageType = 'text';

            // Toggle token visibility
            viewTokenBtn.addEventListener('click', function() {
                botTokenInput.type = botTokenInput.type === 'password' ? 'text' : 'password';
                viewTokenBtn.innerHTML = botTokenInput.type === 'password' ? 
                    '<i class="fas fa-eye"></i> Lihat Token' : 
                    '<i class="fas fa-eye-slash"></i> Sembunyikan';
            });

            // Test token connection
            testTokenBtn.addEventListener('click', async function() {
                const botToken = botTokenInput.value.trim();
                
                if (!botToken) {
                    showResult('❌ Token bot tidak boleh kosong', 'error');
                    return;
                }
                
                testTokenBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Testing...';
                testTokenBtn.disabled = true;
                
                addToTerminal(`Testing token: ${botToken}`);
                
                try {
                    const response = await fetch(`https://api.telegram.org/bot${botToken}/getMe`);
                    const data = await response.json();
                    
                    if (data.ok) {
                        showResult(`✅ Token valid! Bot: ${data.result.first_name} (@${data.result.username})`, 'success');
                        addToTerminal(`SUCCESS: Token valid - ${data.result.first_name} (@${data.result.username})`);
                    } else {
                        showResult(`❌ Token tidak valid: ${data.description || 'Unknown error'}`, 'error');
                        addToTerminal(`ERROR: ${data.description || 'Token tidak valid'}`);
                    }
                } catch (error) {
                    showResult('❌ Gagal terhubung ke server Telegram', 'error');
                    addToTerminal(`ERROR: ${error.message}`);
                } finally {
                    testTokenBtn.innerHTML = '<i class="fas fa-check"></i> Test Token';
                    testTokenBtn.disabled = false;
                }
            });

            messageTypeBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const type = this.getAttribute('data-type');
                    
                    // Update active button
                    messageTypeBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update active content
                    messageContents.forEach(content => content.classList.add('hidden'));
                    document.getElementById(`${type}Content`).classList.remove('hidden');
                    
                    activeMessageType = type;
                    addToTerminal(`Jenis pesan diubah ke: ${type}`);
                });
            });

            // Image preview
            imageUrlInput.addEventListener('blur', function() {
                if (this.value) {
                    imagePreview.src = this.value;
                    imagePreview.style.display = 'block';
                } else {
                    imagePreview.style.display = 'none';
                }
            });

            // Send message
            sendButton.addEventListener('click', async function() {
                const botToken = botTokenInput.value.trim();
                const chatId = chatIdInput.value.trim();
                
                // Validation
                if (!botToken) {
                    showResult('❌ Token bot tidak boleh kosong', 'error');
                    addToTerminal('ERROR: Token bot kosong');
                    return;
                }
                
                if (!chatId) {
                    showResult('❌ Chat ID tidak boleh kosong', 'error');
                    addToTerminal('ERROR: Chat ID kosong');
                    return;
                }
                
                // Validate chat ID format
                if (!/^-?\d+$/.test(chatId)) {
                    showResult('❌ Chat ID harus berupa angka (bisa negatif untuk groups)', 'error');
                    addToTerminal('ERROR: Format Chat ID tidak valid');
                    return;
                }
                
                // Test bot connection first
                addToTerminal('Testing koneksi bot...');
                sendButton.disabled = true;
                sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> TESTING...';
                
                try {
                    const response = await fetch(`https://api.telegram.org/bot${botToken}/getMe`);
                    const botInfo = await response.json();
                    
                    if (!botInfo.ok) {
                        throw new Error(botInfo.description || 'Token tidak valid');
                    }
                    
                    addToTerminal(`SUCCESS: Terhubung ke bot @${botInfo.result.username} (${botInfo.result.first_name})`);
                    
                    // Get message content based on type
                    let method, params;
                    
                    switch (activeMessageType) {
                        case 'text':
                            const messageText = document.getElementById('messageText').value.trim();
                            if (!messageText) {
                                throw new Error('Pesan teks tidak boleh kosong');
                            }
                            if (messageText.length > 4096) {
                                throw new Error('Pesan teks terlalu panjang (maksimal 4096 karakter)');
                            }
                            method = 'sendMessage';
                            params = { text: messageText };
                            break;
                            
                        case 'image':
                            const imageUrl = document.getElementById('imageUrl').value.trim();
                            const imageCaption = document.getElementById('imageCaption').value.trim();
                            if (!imageUrl) {
                                throw new Error('URL gambar tidak boleh kosong');
                            }
                            if (!isValidUrl(imageUrl)) {
                                throw new Error('URL gambar tidak valid');
                            }
                            method = 'sendPhoto';
                            params = { photo: imageUrl };
                            if (imageCaption) {
                                params.caption = imageCaption;
                            }
                            break;
                            
                        case 'file':
                            const fileUrl = document.getElementById('fileUrl').value.trim();
                            const fileCaption = document.getElementById('fileCaption').value.trim();
                            if (!fileUrl) {
                                throw new Error('URL file tidak boleh kosong');
                            }
                            if (!isValidUrl(fileUrl)) {
                                throw new Error('URL file tidak valid');
                            }
                            method = 'sendDocument';
                            params = { document: fileUrl };
                            if (fileCaption) {
                                params.caption = fileCaption;
                            }
                            break;
                            
                        case 'sticker':
                            const stickerId = document.getElementById('stickerId').value.trim();
                            if (!stickerId) {
                                throw new Error('Sticker ID tidak boleh kosong');
                            }
                            method = 'sendSticker';
                            params = { sticker: stickerId };
                            break;
                            
                        default:
                            throw new Error('Jenis pesan tidak dikenali');
                    }
                    
                    // Send the message
                    addToTerminal(`Mengirim ${activeMessageType} ke ${chatId}...`);
                    sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> MENGIRIM...';
                    
                    const result = await sendTelegramMessage(botToken, chatId, method, params);
                    
                    if (result.ok) {
                        showResult('✅ Pesan berhasil dikirim!', 'success');
                        addToTerminal('SUCCESS: Pesan terkirim');
                    } else {
                        // Handle specific Telegram API errors
                        let errorMessage = 'Gagal mengirim pesan';
                        if (result.description) {
                            if (result.description.includes('chat not found')) {
                                errorMessage = 'Bot belum di-add ke chat ini atau Chat ID salah';
                            } else if (result.description.includes('wrong file identifier')) {
                                errorMessage = 'Sticker ID tidak valid';
                            } else if (result.description.includes('failed to get HTTP URL content')) {
                                errorMessage = 'URL tidak dapat diakses atau tidak valid';
                            } else {
                                errorMessage = result.description;
                            }
                        }
                        throw new Error(errorMessage);
                    }
                    
                } catch (error) {
                    showResult(`❌ ${error.message}`, 'error');
                    addToTerminal(`ERROR: ${error.message}`);
                } finally {
                    sendButton.disabled = false;
                    sendButton.innerHTML = '<i class="fas fa-paper-plane"></i> KIRIM PESAN';
                }
            });

            // Telegram API function
            async function sendTelegramMessage(botToken, chatId, method, params) {
                const url = `https://api.telegram.org/bot${botToken}/${method}`;
                
                // Create URL parameters
                const urlParams = new URLSearchParams();
                urlParams.append('chat_id', chatId);
                
                // Add all params to URL
                for (const key in params) {
                    if (params[key] !== undefined && params[key] !== null && params[key] !== '') {
                        urlParams.append(key, params[key]);
                    }
                }
                
                // Send request
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: urlParams
                });
                
                return await response.json();
            }

            // Helper functions
            function showResult(message, type) {
                resultDiv.textContent = message;
                resultDiv.className = `result ${type}`;
                resultDiv.style.display = 'block';
                
                // Auto hide after 5 seconds
                setTimeout(() => {
                    resultDiv.style.display = 'none';
                }, 5000);
            }

            function addToTerminal(message) {
                const line = document.createElement('div');
                line.className = 'terminal-line';
                line.innerHTML = `<span class="terminal-prompt">$</span> ${message}`;
                terminal.appendChild(line);
                terminal.scrollTop = terminal.scrollHeight;
            }

            function isValidUrl(string) {
                try {
                    new URL(string);
                    return true;
                } catch (_) {
                    return false;
                }
            }

            // Initialize
            addToTerminal('Dark Messenger initialized');
            addToTerminal('Masukkan token bot dan chat ID');
            addToTerminal('Klik "Test Token" untuk memverifikasi');
        });
    </script>
</body>
</html>