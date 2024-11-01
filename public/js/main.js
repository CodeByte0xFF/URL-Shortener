$(document).ready(function() {
    $('#urlForm').on('submit', function(e) {
        e.preventDefault();
        let url = $('#urlInput').val();

        $.ajax({
            url: '/api/api.php',
            type: 'POST',
            data: JSON.stringify({ url: url }),
            contentType: 'application/json',
            success: function(response) {
                if (response.short_url) {
                    $('#result').html(`
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="text-dark me-2 mb-0">
                                URL: <a href="${response.short_url}" target="_blank" class="short-url-link custom-font">${window.location.origin}/${response.short_url}</a>
                            </p>
                            <button type="button" class="btn btn-outline-dark btn-lg copy-btn ms-2" onclick="copyToClipboard('${response.short_url}')">
                                <i class="bi bi-clipboard2-fill"></i>
                            </button>
                        </div>
                    `);
                } else {
                    showNotification(response.error, "danger");
                }
            },
            error: function(xhr) {
                $('#result').html(`<p class="text-danger">Ошибка: ${xhr.responseText || 'Произошла ошибка'}</p>`);
            }
        });
    });
});

function copyToClipboard(shortCode) {
    const fullUrl = `${window.location.origin}/${shortCode}`;

    navigator.clipboard.writeText(fullUrl).then(() => {
        showNotification("Ссылка скопирована!", "success");
    }).catch((error) => {
        showNotification("Ошибка копирования!", "danger");
    });
}

function showNotification(message, type) {
    let toast = $(`
        <div class="toast-notification">
            ${message}
        </div>
    `);

    $('body').append(toast);

    setTimeout(() => toast.addClass('show'), 100);

    setTimeout(() => {
        toast.removeClass('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

