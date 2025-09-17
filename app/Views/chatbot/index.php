<?= view('layout/header', ['title' => 'Chatbot FAQ']) ?>
<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>
      <div class="container-fluid container-p-y">

        <h4 class="font-weight-bold mb-3">Chatbot FAQ</h4>

        <!-- Chatbot Card -->
        <div class="card shadow-sm">
          <div class="card-body">

            <!-- Chatbox -->
            <div id="chatbox" 
                 style="height:350px; overflow-y:auto; border:1px solid #e0e0e0; padding:15px; border-radius:8px; background:#fafafa;">
              <div class="text-muted text-center">Mulai bertanya, bot akan menjawab pertanyaan umum Anda...</div>
            </div>

            <!-- Input form -->
            <form id="chat-form" class="mt-3">
              <div class="input-group">
                <input type="text" id="message" name="message" class="form-control" placeholder="Tulis pertanyaan..." autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-paper-plane"></i> Kirim
                  </button>
                </div>
              </div>
            </form>

          </div>
        </div>

        <!-- Kontak Admin -->
        <div class="card mt-4 shadow-sm">
          <div class="card-body">
            <h5 class="mb-3"><i class="fas fa-headset"></i> Bantuan Lebih Lanjut</h5>
            <p><i class="fas fa-user-shield"></i> Admin: <strong>0812-3456-7890</strong></p>
            <p><i class="fas fa-envelope"></i> Email: <strong>admin@depotair.com</strong></p>
            <p><i class="fas fa-map-marker-alt"></i> Alamat: <strong>Jl. Raya Air No.123, Bandung</strong></p>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?= view('layout/footer') ?>

<script>
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let message = document.getElementById('message').value.trim();
    if (!message) return;

    let chatbox = document.getElementById('chatbox');
    chatbox.innerHTML += `<div class="mb-2"><b>Anda:</b> ${message}</div>`;

    fetch("<?= base_url('chatbot/ask') ?>", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "message=" + encodeURIComponent(message)
    })
    .then(res => res.json())
    .then(data => {
        chatbox.innerHTML += `<div class="mb-2"><b>Bot:</b> ${data.reply}</div>`;
        chatbox.scrollTop = chatbox.scrollHeight;
    });

    document.getElementById('message').value = "";
});
</script>
